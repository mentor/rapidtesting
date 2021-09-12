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
    public function verify(Request $request, $code_ref)
    {
        $payload = Test::firstWhere('code_ref', $code_ref);
        if (!$payload || !$payload->isTested()) {
            abort(404);
        }

        $isPinRC = !empty($payload->pinrc);

        if ($request->isMethod('post')) {

            if ($payload->pinrc) {
                $validationArray = [
                    'pinrc' => [
                        'bail',
                        'required',
                        function ($attribute, $value, $fail) use ($payload) {
                            if (trim($value) !== trim(str_replace('/','', $payload->pinrc))) {
                                $fail('Rodné číslo nie je platné, skontrolujte prosím jeho správnosť');
                            }
                        },
                    ],
                ];
            } else {
                $validationArray = [
                    'pinid' => [
                        'bail',
                        'required',
                        function ($attribute, $value, $fail) use ($payload) {
                            if (strtolower(trim($value)) !== strtolower(trim($payload->pinid))) {
                                $fail('Heslo nie je platné, skontrolujte prosím jeho správnosť');
                            }
                        },
                    ],
                ];
            }

            $request->validate($validationArray);

            return $this->certificate($payload, $code_ref);
        }

        return view('verify', compact('code_ref', 'isPinRC'));
    }

    private function certificate($payload, $code_ref) {
        $qrcode = base64_encode(QrCode::format('png')->size(200)->generate(route('verify', $code_ref)));
        $pdf = PDF::loadView('certificate', compact('payload', 'qrcode'));

        return $pdf->download($code_ref . '.pdf');
    }
}
