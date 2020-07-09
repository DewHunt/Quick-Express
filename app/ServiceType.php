<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
	protected $table = "tbl_service_types";

    protected $fillable = [
    	'name','description','status','order_by','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
