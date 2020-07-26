<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryManPayment extends Model
{
	protected $table = "tbl_delivery_man_payments";

    protected $fillable = [
    	'date','delivery_man_id','total_charge_amount','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
