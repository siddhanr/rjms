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

class AddressController extends Controller
{
    public function getAddresses()
    {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $addresses = Address::all();
            return response()->json($addresses);
        }
    }

    public function getAddressFromSuburb(Request $request)
    {
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $addresses = Address::where('area', '=', $request->area)
                         ->get();
            return response()->json($addresses);
        }
    }

    public function getSuburbs(){
        if(Auth::guest()){
            return Redirect::to('auth/login');
        }else {
            $suburbs = Address::select('area')->groupBy('area')->get();
            return response()->json($suburbs);
        }
        
    }

}
