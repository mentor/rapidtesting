<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function index(Request $request) {
        $reservationId = $request->input('reservationId');
        Log::info(print_r($request->all(), true));
        Log::info(print_r($request->input(), true));
        Log::info($reservationId);
        echo 'REENIO';
        exit;
    }
}
