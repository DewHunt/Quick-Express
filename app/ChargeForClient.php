<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeForClient extends Model
{
	protected $table = "tbl_charge_for_clients";

    protected $fillable = [
    	'service_type_id','service_id','name','charge','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
