<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingOrder extends Model
{
	protected $table = "tbl_booking_orders";

    protected $fillable = [
    	'order_no','date','delivery_date','booked_type','sender_id','sender_hub_id','sender_area_id','sender_name','sender_phone','sender_zone_type','sender_zone_id','sender_address','receiver_hub_id','receiver_area_id','receiver_name','receiver_phone','receiver_zone_type','receiver_zone_id','receiver_address','remarks','courier_type_id','delivery_type_id','charge_name','delivery_charge_unit','delivery_charge_unit_per_uom','uom','delivery_charge','recieve_amount','cod','cod_amount','cod_charge_percentage','cod_charge','delivery_duration_id','collection_man_id','collection_payment','collection_status','collection_payment_status','sender_goods_receieve_status','host_warehouse_id','host_warehouse_goods_receieve_status','destination_warehouse_id','destination_warehouse_goods_receieve_status','receiver_issue_status','receiver_goods_receieve_status','delivery_man_id','delivery_payment','delivery_status','delivery_payment_status','payment_status','merchant_payment_status','return_status','return_date','return_to_client_status','reschedule_status','reschedule_date','delivery_man_payment_status','order_status','order_status_remarks','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
