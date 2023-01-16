<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request, Customer $customer){
        $teste = $customer->find(1);
        echo $teste->email;
        #
    }

    public function update(int $id){
        $customer = Customer::find($id);
        $customer->update(['email' => 'joao.abreu@iesde.com.br']);
    }
}
