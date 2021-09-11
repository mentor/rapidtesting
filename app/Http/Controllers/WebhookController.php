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
    const API_KEY = 'TkNqej2CkRjWsuAPWs15OkW4OpKIViM961Ffa4Ym6fds30C9IFckhWPYTVW9QOQ7';
    const API_HOST = 'https://reenio.cz/sk/api/v1/admin';

    public function created(Request $request)
    {

        // webhook synchronization request
        if (!$request->input()) {
            $this->response();
        }

        // get reservation data
        $reservationId = $request->input('reservationId');
        $reservation = $this->getReservationDetail($reservationId);

        // get customer data
        $customerId = $request->input('customerId');
        $customer = $this->getCustomerDetail($customerId);

        // check if API calls returned HTTP 200
        if (!$reservation->ok() || !$customer->ok()) {
            Log::error('Invalid response from REENIO API when retrieving reservation/customer details!');
            $this->response();
        }

       // try {
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
            $payload['pinrc'] = $this->getPlainValueFromCustomField($reservation->json('detail.customForms.0.fields'), 'QTQMVKQT');
            $payload['pinid'] = $this->getPlainValueFromCustomField($reservation->json('detail.customForms.0.fields'), 'JRHRFPDB');
            $payload['symptoms'] = $this->getGeneratedValueFromCustomField($reservation->json('detail.customForms.0.fields'), 'EAENGFYD', Test::SYMPTOMS_SELECT);
            //Log::info(print_r($reservation->json('detail.customForms.0.fields'), true));
            //Log::info($this->getPlainValueFromCustomField($reservation->json('detail.customForms.0.fields'), 'DXCWCJIL'));
            $payload['dob'] = Carbon::createFromFormat('d.m.Y', $this->getPlainValueFromCustomField($reservation->json('detail.customForms.0.fields'), 'DXCWCJIL'))->toDateString();
            //$payload['dob'] = Carbon::createFromFormat('d.m.Y', '02.12.1984')->toDateString();
            $payload['start'] = $reservation->json('detail.start');
            $payload['end'] = $reservation->json('detail.end');
            $payload['status'] = $reservation->json('detail.state');

            Log::info(print_r($payload, true));

            Test::create($payload);


//        } catch (\Exception $e) {
//            Log::error($e->getMessage());
//        }

        // return happy response back!
        $this->response();
    }

    /*
     *  '0'  => 'Created',
        '1'  => 'Ended',
        '2'  => 'Finished',
        '3'  => 'Confirmed',
        '4'  => 'Started',
        '5'  => 'Registered',
        '6'  => 'Unpaid',
        '7'  => 'Paid',
        '8'  => 'Withdrawn',
        '9'  => 'Cancelled',
        '10' => 'No Show',
        '11' => 'Not Arrived',
     */

    public function status(Request $request) {
        // webhook synchronization request
        if (!$request->input()) {
            $this->response();
        }

        // get reservation data
        $reservationId = $request->input('reservationId');
        $triggerType = $request->input('triggerType');

        Test::whereFirst('reservation_id_ref', $reservationId)->update(['status' => $triggerType]);

        $this->response();
    }

    private function getReservationDetail($reservationId)
    {
        return Http::acceptJson()->withToken(self::API_KEY)->get(self::API_HOST . '/reservation/detail/' . $reservationId);
    }

    private function getCustomerDetail($customerId)
    {
        return Http::acceptJson()->withToken(self::API_KEY)->get(self::API_HOST . '/customer/detail/' . $customerId);
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

    private function getPlainValueFromCustomField($fields, string $key)
    {
        foreach ($fields as $field) {
            if ($field['key'] == $key) {
                return $field['value'];
            }
        }
        return '';
    }

    private function getGeneratedValueFromCustomField($fields, string $key, array $mapper)
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
