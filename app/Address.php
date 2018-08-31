<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\Job;

class Address extends Model
{
    //
    protected $table = 'address';

    public function jobs()
    {
    	return $this.hasMany('App\Job');
    }
}
