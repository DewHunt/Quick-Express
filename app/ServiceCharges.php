<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCharges extends Model
{
	protected $table = "tbl_service_charges";

    protected $fillable = [
    	'location_name','charge_name','charge','order_by','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
