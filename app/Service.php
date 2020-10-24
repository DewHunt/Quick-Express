<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $table = "tbl_services";

    protected $fillable = [
    	'name','description','status','order_by','weighing_scale','upto','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
