<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustodianController extends Controller
{
    public function dashboard()
    {
        return view('custodian.dashboard');
    }
}
