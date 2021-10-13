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
        $test = Test::firstWhere('code_ref', $code_ref);
        if (!$test || !$test->isTested()) {
            abort(404);
        }

        $isPinRC = !empty($test->pinrc);

        if ($request->isMethod('post')) {

            if ($test->pinrc) {
                $validationArray = [
                    'pinrc' => [
                        'bail',
                        'required',
                        function ($attribute, $value, $fail) use ($test) {
                            if (trim(str_replace('/','', $value)) !== trim(str_replace('/','', $test->pinrc))) {
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
                        function ($attribute, $value, $fail) use ($test) {
                            if (strtolower(trim($value)) !== strtolower(trim($test->pinid))) {
                                $fail('Heslo nie je platné, skontrolujte prosím jeho správnosť');
                            }
                        },
                    ],
                ];
            }

            $request->validate($validationArray);

            return $this->certificate($test, $code_ref);
        }

        return view('verify', compact('code_ref', 'isPinRC'));
    }

    private function certificate($test, $code_ref) {
        $qrcode = base64_encode(QrCode::format('png')->size(200)->generate(route('verify', $code_ref)));
        $pdf = PDF::loadView('certificate', compact('test', 'qrcode'));

        return $pdf->stream($code_ref . '.pdf');
    }
}
