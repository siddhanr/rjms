<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\Address;

class Job extends Model
{
	protected $table = 'job';

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }
    public function address()
    {
    	return $this->belongsTo('App\Address');
    }
}
