<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Address;
use App\Job;
use Auth;
use Redirect;

class CustomerController extends Controller
{
    public function getCustomers()
    {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $customers = Customer::all();
            return response()->json($customers);
        }
        
    }
}
