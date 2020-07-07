<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DeliveryMan extends Authenticatable
{	use Notifiable;
	protected $table = "tbl_delivery_men";

    protected $fillable = [
    	'user_id','user_role_id','name','image','phone','email','nid','address','driving_licence','bike_registration_no','area_id','status','token','verification_code','password','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
