<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Service;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class WebhookController extends Controller
{
    const REENIO_API_KEY = 'TkNqej2CkRjWsuAPWs15OkW4OpKIViM961Ffa4Ym6fds30C9IFckhWPYTVW9QOQ7';
    const REENIO_API_HOST = 'https://reenio.cz/sk/api/v1/admin';

    const REENIO_RESERVATION_STATUSES = [
        0  => 'created',
        1  => 'ended',
        2  => 'finished',
        3  => 'confirmed',
        4  => 'started',
        5  => 'registered',
        6  => 'unpaid',
        7  => 'paid',
        8  => 'withdrawn',
        9  => 'cancelled',
        10 => 'noshow',
        11 => 'notarrived',
    ];

    public function created(Request $request)
    {

        Log::info('Reservation CREATED webhook: INIT');

        // webhook synchronization request
        if (!$request->input()) {
            Log::info('Reservation CREATED webhook: SYNC');
            $this->response();
        }

        Log::info('Reservation CREATED webhook: phase 0', $request->input());
        // get reservation data
        $reservationId = $request->input('reservationId');
        $reservation = $this->getReservationDetail($reservationId);
        Log::info('Reservation CREATED webhook: phase 1 - reservation API call', compact('reservation'));

        // get customer data
        $customerId = $request->input('customerId');
        $customer = $this->getCustomerDetail($customerId);
        Log::info('Reservation CREATED webhook: phase 2 - customer API call', compact('customer'));

        // check if API calls returned HTTP 200
        if (!$reservation->ok() || !$customer->ok()) {
            Log::error('Invalid response from REENIO API when retrieving reservation/customer details!');
            $this->response();
        }

        Log::info('Reservation CREATED webhook: phase 3 - data extraction');
        try {
            // build payload to store into database
            $payload = [];

            // map customer data
            $payload['firstname'] = $customer->json('detail.firstName');
            $payload['lastname'] = $customer->json('detail.lastName');
            $payload['email'] = $customer->json('detail.email');
            $payload['phone'] = $customer->json('detail.phoneNumber');
            $payload['street'] = $customer->json('detail.address.street');
            $payload['city'] = $customer->json('detail.address.city');
            $payload['postal'] = $customer->json('detail.address.zipCode');
            $payload['country'] = $customer->json('detail.address.country');

            // map reservation data
            $payload['reservation_id_ref'] = $reservationId;
            $payload['code_ref'] = $reservation->json('detail.code');
            $payload['service_id'] = $this->lookupServiceByServiceId($reservation->json('detail.serviceId'));
            $payload['centre_id'] = $this->lookupCentreByPlaceId($reservation->json('detail.placeId'));
            $payload['pinrc'] = $this->getPlainValue($reservation->json('detail.customForms.0.fields'), 'QTQMVKQT') ?: null;
            $payload['pinid'] = $this->getPlainValue($reservation->json('detail.customForms.0.fields'), 'JRHRFPDB');
            $payload['symptoms'] = $this->getGeneratedValue($reservation->json('detail.customForms.0.fields'), 'EAENGFYD', Test::SYMPTOMS_SELECT);
            $payload['insurance_company'] = $this->getPlainValue($reservation->json('detail.customForms.0.fields'), 'KJEKPWCB') ?: null;

            $payload['dob'] = Carbon::createFromFormat('d.m.Y', $this->getPlainValue(
                $reservation->json('detail.customForms.0.fields'),
                'DXCWCJIL'
            ))->toDateString();

            $payload['start'] = Carbon::parse($reservation->json('detail.start'))
                ->tz('Europe/Bratislava')
                ->format('Y-m-d H:i:s');

            $payload['end'] = Carbon::parse($reservation->json('detail.end'))
                ->tz('Europe/Bratislava')
                ->format('Y-m-d H:i:s');

            $payload['status'] = self::REENIO_RESERVATION_STATUSES[$reservation->json('detail.state')];

            Log::info('Reservation CREATED webhook: phase 4 - data push', compact('payload'));


            $test = Test::create($payload);

            Log::info('Reservation CREATED webhook: phase 5 - DONE', ['id' => $test->id]);

        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
        }

        // return happy response back!
        $this->response();
    }


    public function status(Request $request) {

        Log::info('Reservation UPDATED webhook: INIT');

        // webhook synchronization request
        if (!$request->input()) {
            Log::info('Reservation UPDATED webhook: SYNC');
            $this->response();
        }

        Log::info('Reservation UPDATED webhook: phase 0', $request->input());
        try {
            // get reservation data
            $reservationId = $request->input('reservationId');
            $triggerType = $request->input('triggerType');

            $test = Test::firstWhere('reservation_id_ref', $reservationId);

            // RETRY once if Test was not found
            if (!$test) {
                Log::info('Reservation UPDATED webhook: phase 1 - Test NOT FOUND! Retrying in 2 seconds');
                sleep(2);
                $test = Test::firstWhere('reservation_id_ref', $reservationId);
                if (!$test) {
                    Log::error('Reservation UPDATED webhook: phase 2 - Test NOT FOUND!');
                } else {
                    Log::info('Reservation UPDATED webhook: phase 3 - Test FOUND!', $test->toArray());
                    $newStatus = self::REENIO_RESERVATION_STATUSES[$triggerType];
                    $test->update([
                        'status' => $newStatus
                    ]);
                    Log::info('Reservation UPDATED webhook: phase 4 - Test UPDATED!', [$newStatus]);
                }
            } else {
                // Test was found, updating
                Log::info('Reservation UPDATED webhook: phase 3 - Test FOUND!', $test->toArray());
                $newStatus = self::REENIO_RESERVATION_STATUSES[$triggerType];
                $test->update([
                    'status' => $newStatus
                ]);
                Log::info('Reservation UPDATED webhook: phase 4 - Test UPDATED!', [$newStatus]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
        }

        $this->response();
    }

    private function getReservationDetail($reservationId)
    {
        return Http::acceptJson()->withToken(self::REENIO_API_KEY)->get(self::REENIO_API_HOST . '/reservation/detail/' . $reservationId);
    }

    private function getCustomerDetail($customerId)
    {
        return Http::acceptJson()->withToken(self::REENIO_API_KEY)->get(self::REENIO_API_HOST . '/customer/detail/' . $customerId);
    }

    private function lookupCentreByPlaceId($placeId)
    {
        // retrieve centre.id by matching centre.placeId with $placeId
        $centre = Centre::firstWhere('place_id_ref', $placeId);
        return $centre->id;
    }

    private function lookupServiceByServiceId($serviceId)
    {
        // retrieve service.id by matching service.serviceId with $serviceId
        $service = Service::firstWhere('service_id_ref', $serviceId);
        return $service->id;
    }

    private function getPlainValue($fields, string $key)
    {
        foreach ($fields as $field) {
            if ($field['key'] == $key) {
                return $field['value'];
            }
        }
        return '';
    }

    private function getGeneratedValue($fields, string $key, array $mapper)
    {
        foreach ($fields as $field) {
            if ($field['key'] == $key) {
                return $field['valueKey'];
            }
        }
        return '';
    }


    private function response()
    {
        echo 'REENIO';
        exit;
    }



}
