<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
	protected $table = "tbl_warehouses";

    protected $fillable = [
    	'user_id','user_role_id','name','contact_person','phone','email','address','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
