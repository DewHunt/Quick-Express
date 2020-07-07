<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPanelInformation extends Model
{
	protected $table = "tbl_admin_panel_information";

    protected $fillable = [
    	'website_name','prefix_title','website_title','logo_one','logo_one_width','logo_one_height','logo_two','logo_two_width','logo_two_height','fav_icon','fav_icon_width','fav_icon_height','developed_by','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
