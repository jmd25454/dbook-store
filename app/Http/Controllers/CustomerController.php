<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __invoke(Request $request){
        dd('Customer');
    }
}
