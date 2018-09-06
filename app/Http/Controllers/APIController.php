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

class APIController extends Controller
{
    public function getUnarchivedJobs()
    {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $jobs = Job::with('customer', 'address')
                    ->where('archived', '!=', 1)
                    ->get();
            return response()->json($jobs);
        }
    }

    public function getAllJobs() {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $jobs = Job::with('customer', 'address')->get();
            return response()->json($jobs);
        }
    } 

    public function getJob() {
        $id = request()->id;
        $job = Job::where('id', '=', $id)
               ->with('customer', 'address')
               ->get();
        return response()->json($job);
    }

    public function getCustomers()
    {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $customers = Customer::all();
            return response()->json($customers);
        }
        
    }

    public function getAddresses()
    {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $addresses = Address::all();
            return response()->json($addresses);
        }
    }


}
