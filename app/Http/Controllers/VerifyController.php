<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VerifyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $code_ref)
    {
        $payload = Test::firstWhere('code_ref', $code_ref);
        if (!$payload) {
            abort(404);
        }
        $qrcode = base64_encode(QrCode::format('png')->size(200)->generate(route('verify', $code_ref)));
        $pdf = PDF::loadView('verify', compact('payload', 'qrcode'));

        return $pdf->download($code_ref . '.pdf');
        return view('verify', compact('payload', 'qrcode'));
    }
}
