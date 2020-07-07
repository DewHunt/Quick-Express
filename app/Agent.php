<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
	protected $table = "tbl_agents";

    protected $fillable = [
    	'user_id','user_role_id','name','district','phone','email','nid','address','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
