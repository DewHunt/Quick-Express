<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Marchant extends Authenticatable
{	use Notifiable;
	protected $table = "tbl_marchants";

    protected $fillable = [
    	'user_id','user_role_id','name','contact_person_name','contact_person_phone','contact_person_email','trade_licence_no','cod_charge_percentage','return_charge_status','reschedule_charge_status','address','area','password','token','verification_code','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
