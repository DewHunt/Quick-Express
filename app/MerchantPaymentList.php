<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantPaymentList extends Model
{
	protected $table = "tbl_merchant_payment_lists";

    protected $fillable = [
    	'merchant_payment_id','booking_order_id','order_no','bill_amount','recieve_amount','return_charge','service_charge','balance','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
