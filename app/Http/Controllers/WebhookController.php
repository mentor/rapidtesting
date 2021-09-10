<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class WebhookController extends Controller
{
    const API_KEY = 'TkNqej2CkRjWsuAPWs15OkW4OpKIViM961Ffa4Ym6fds30C9IFckhWPYTVW9QOQ7';
    const API_HOST = 'https://reenio.cz/cs/api/v1/admin';

    private function getReservationDetail($reservationId)
    {
        $response = Http::acceptJson()->withToken(self::API_KEY)->get(self::API_HOST . '/reservation/detail/' . $reservationId);
        Log::info(print_r($response->json(), true));
        return $response;
    }

    private function getCustomerDetail($customerId)
    {
        $response = Http::acceptJson()->withToken(self::API_KEY)->get(self::API_HOST . '/customer/detail/' . $customerId);
        Log::info(print_r($response->json(), true));
        return $response;
    }

    public function test(Request $request) {
        $reservation = $this->getReservationDetail('3323722');
        $place = $this->getCustomerDetail($reservation->json()['detail']['customer']['id']);
        var_dump($reservation);
        echo "\n\n";
        var_dump($place);
        exit;
    }
    public function index(Request $request) {
        $reservationId = $request->input('reservationId');


        Log::info(print_r($request->all(), true));
        Log::info(print_r($request->input(), true));
        Log::info($reservationId);
        echo 'REENIO';
        exit;
    }


}
