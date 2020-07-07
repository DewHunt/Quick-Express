<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteInformation extends Model
{
	protected $table = "tbl_website_information";

    protected $fillable = [
    	'website_name','prefix_title','website_title','logo_one','logo_two','fav_icon','developed_by','meta_title','meta_keyword','meta_description','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
