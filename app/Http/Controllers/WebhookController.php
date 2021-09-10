<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class WebhookController extends Controller
{

    private function getReservationDetail($reservationId) {
        $response = Http::acceptJson()->withToken('TkNqej2CkRjWsuAPWs15OkW4OpKIViM961Ffa4Ym6fds30C9IFckhWPYTVW9QOQ7')->get('https://reenio.cz/cs/api/v1/admin/reservation/detail/' . $reservationId);
        Log::info(print_r($response->json(), true));
        return $response->json();
    }
    public function test(Request $request) {
        var_dump($this->getReservationDetail('3323722'));
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
