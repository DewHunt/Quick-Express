<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryType extends Model
{
	protected $table = "tbl_delivery_types";

    protected $fillable = [
    	'name','charge','description','status','order_by','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
