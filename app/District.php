<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "tbl_districts";

    protected $fillable = [
        'english_name','bangla_name','status','created_by','updated_at'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
