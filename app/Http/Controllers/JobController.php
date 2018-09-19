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

class JobController extends Controller
{
    public function getUnarchivedJobs()
    {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $jobs = Job::with('customer', 'address')
                    ->where('status', '!=', 'ARCHIVED')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->get();
            return response()->json($jobs);
        }
    }

    public function getArchivedJobs()
    {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $jobs = Job::with('customer', 'address')
                    ->where('status', '=', 'ARCHIVED')
                    ->get();
            return response()->json($jobs);
        }
    }

    public function getAllJobs() 
    {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $jobs = Job::with('customer', 'address')->get();
            return response()->json($jobs);
        }
    } 

    public function getJob() 
    {
        $id = request()->id;
        $job = Job::where('id', '=', $id)
               ->with('customer', 'address')
               ->get();
        return response()->json($job);
    }
    
    public function createJob(Request $request)
    {
        //Check & save customer if not exists (make this a function?)
        $customer = new Customer;
        $customer->name = $request->custName;
        $customer->email = $request->custEmail;
        $customer->phone_number = $request->custPhone;
        $customerCheck = Customer::where('name', '=', $customer->name)
                         ->where('email', '=', $customer->email)
                         ->where('phone_number', '=', $customer->phone_number)
                         ->get();
        if (sizeof($customerCheck) == 0)
        {
            $customer->save();
            $customer_id = $customer->id;
        }
        else
        {
            $customer_id = $customerCheck->first()->id;
        }

        //check & save address if not exists (make this a function?)
        $address = new Address;
        $address->area = $request->jobSuburb;
        $address->address = $request->jobAddress;
        $addressCheck = Address::where('area', '=', $address->area)
                        ->where('address', '=', $address->address)
                        ->get();
        if (sizeof($addressCheck) == 0)
        {
            $address->save();
            $address_id = $address->id;
        }
        else
        {
            $address_id = $addressCheck->first()->id;
        }

        //save job
        $job = new Job;
        $job->customer_id = $customer_id;
        $job->address_id = $address_id;
        $job->status = $request->jobStatus;
        $job->job_type = $request->jobType;
        $job->roof_type = $request->roofType;
        $job->job_area = $request->jobArea;
        $job->price = $request->jobPrice;
        $job->notes = $request->jobDescription;
        $job->save();
        return response()->json('Job Added');
    }

    public function updateJob(Request $request)
    {
        $job = Job::where('id', '=', $request->jobId)
               ->first();

        //update customer
        $customer = Customer::where('id', '=', $job->customer->id)
                    ->first();
        $customer->name = $request->custNameEdit;
        $customer->phone_number = $request->custPhoneEdit;
        $customer->email = $request->custEmailEdit;
        $customer->save();
        
        //update address
        $address = Address::where('id', '=', $job->address->id)
                   ->first();
        $address->area = $request->jobSuburbEdit;
        $address->address = $request->jobAddressEdit;
        $address->save();

        //update job
        $job->status = $request->jobStatusEdit;
        $job->job_type = $request->jobTypeEdit;
        $job->roof_type = $request->roofTypeEdit;
        $job->job_area = $request->jobAreaEdit;
        $job->price = $request->jobPriceEdit;
        $job->notes = $request->jobDescriptionEdit;
        $job->save();
        
        return response()->json('Entry Updated');
    }
}
