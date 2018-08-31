<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Address;
use App\Job;

class Customer extends Model
{
    //
    protected $table = 'customer';

    public function jobs()
    {
    	return $this.hasMany('App\Job');
    }
}
