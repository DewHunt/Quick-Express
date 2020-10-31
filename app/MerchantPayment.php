<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantPayment extends Model
{
	protected $table = "tbl_merchant_payment";

    protected $fillable = [
    	'date','merchant_id','total_bill_amount','total_recieve_amount','total_return_charge','total_service_charge','total_balance','deposit_type','remarks','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
