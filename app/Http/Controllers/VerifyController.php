<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

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

        return view('verify', ['payload' => $payload]);
    }
}
