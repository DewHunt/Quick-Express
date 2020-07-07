<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingOrder extends Model
{
	protected $table = "tbl_booking_orders";

    protected $fillable = [
    	'order_no','date','booked_type','sender_id','sender_name','sender_phone','sender_zone_type','sender_zone_id','sender_address','receiver_name','receiver_phone','receiver_zone_type','receiver_zone_id','receiver_address','courier_type_id','courier_unit_price','delivery_type_id','delivery_unit_price','uom','delivery_charge','collection_man_id','collection_status','sender_goods_receieve_status','host_warehouse_id','host_warehouse_goods_receieve_status','destination_warehouse_id','destination_warehouse_goods_receieve_status','receiver_issue_status','receiver_goods_receieve_status','delivery_man_id','delivery_status','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
