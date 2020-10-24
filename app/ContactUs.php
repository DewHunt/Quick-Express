<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
	protected $table = "tbl_contact_us";

    protected $fillable = [
    	'name','contact_person','phone_one','phone_two','phone_three','phone_four','email_one','email_two','email_three','email_four','address','order_by','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
