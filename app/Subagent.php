<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subagent extends Model
{
	protected $table = "tbl_subagents";

    protected $fillable = [
    	'user_id','user_role_id','agent_id','name','contact_person','phone','email','nid','address','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
