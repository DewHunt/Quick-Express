<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryManPaymentList extends Model
{
	protected $table = "tbl_delivery_man_payment_lists";

    protected $fillable = [
    	'delivery_man_payment_id','booking_order_id','order_no','order_type','charge','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
