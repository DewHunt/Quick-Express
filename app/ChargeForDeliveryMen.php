<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeForDeliveryMen extends Model
{
	protected $table = "tbl_charge_for_delivery_men";

    protected $fillable = [
    	'service_id','service_type_name','name','charge','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
