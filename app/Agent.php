<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
	protected $table = "tbl_agents";

    protected $fillable = [
    	'user_id','user_role_id','hub_id','name','contact_person','district','phone','email','nid','supporting_warehouse','address','area','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
