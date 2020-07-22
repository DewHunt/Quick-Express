<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCollectionList extends Model
{
	protected $table = "tbl_payment_collection_lists";

    protected $fillable = [
    	'payment_collection_id','booking_order_id','order_no','cod_amount','delivery_charge','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
