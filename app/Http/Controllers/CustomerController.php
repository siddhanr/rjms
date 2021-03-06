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

    public function getCustomer(Request $request)
    {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }
        else {
            $customer = Customer::where('id', '=', $request->id)
                        ->first();
            return response()->json($customer);
        }
    }

    public function createCustomer(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->cCustName;
        $customer->email = $request->cCustEmail;
        $customer->phone_number = $request->cCustPhone;
        $customerCheck = Customer::where('name', '=', $customer->name)
                         ->where('email', '=', $customer->email)
                         ->where('phone_number', '=', $customer->phone_number)
                         ->get();
        if (sizeof($customerCheck) == 0)
        {
            $customer->save();
            return response()->json('Customer Added');
        }
        else
        {
            return response()->json('Customer Already Exist');
        }
    }

    public function updateCustomer(Request $request)
    {
        $customer = Customer::where('id', '=', $request->cCustId)
                    ->first();
        $customer->name = $request->cCustNameEdit;
        $customer->phone_number = $request->cCustPhoneEdit;
        $customer->email = $request->cCustEmailEdit;
        $customer->save();
        return response()->json('Customer Updated');
    }

    public function deleteCustomer(Request $request)
    {
        $customer = Customer::where('id', '=', $request->cCustId)
                    ->first();
        $customer->delete();
        return response()->json('Customer Deleted');
    }

}
