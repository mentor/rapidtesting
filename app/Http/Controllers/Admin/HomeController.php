<?php

namespace App\Http\Controllers\Admin;

class HomeController
{
    public function index()
    {
        return redirect('admin/tests');
        //return view('home');
    }
}
