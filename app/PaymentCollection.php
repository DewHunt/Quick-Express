<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCollection extends Model
{
	protected $table = "tbl_payment_collections";

    protected $fillable = [
    	'date','client_type','client_id','total_cod_amount','total_delivery_charge_amount','balance','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
