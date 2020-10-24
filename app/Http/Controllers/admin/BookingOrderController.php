<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\Agent;
use App\Subagent;
use App\Warehouse;
use App\Service;
use App\ServiceType;
use App\Client;
use App\Marchant;
use App\Admin;
use App\UserRoles;
use App\ChargeForClient;
use App\ChargeForMerchant;
use App\ChargeForDeliveryMen;
use App\DeliveryType;
use App\WebsiteInformation;
use App\AreaSetup;

use DB;

class BookingOrderController extends Controller
{
    public function index()
    {
        $title = "Booking Order Setup";

        $bookingOrders = BookingOrder::select('tbl_booking_orders.*','tbl_service_types.name as deliveryTypeName')
            ->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
            ->orderBy('id','desc')
            ->get();

        return view('admin.bookingOrder.index')->with(compact('title','bookingOrders'));
    }

    public function add()
    {
        $title = "Add Booking Order";
        $formLink = "bookingOrder.save";
        $buttonName = "Save";

        $services = Service::orderBy('name','asc')->get();
        $serviceTypes = ServiceType::where('status',1)->orderBy('name','asc')->get();
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();
        $areas = AreaSetup::orderBy('name','asc')->get();

        $zones = DB::table('view_zones')->select('view_zones.*')->orderBy('view_zones.zone_type')->get();

        $toDayDate = date("Y-m-d");
        $orderPrefix = "QE-".date('ymd')."-";

        $maxOrderNo = BookingOrder::where('date',$toDayDate)->max('order_no');

        if ($maxOrderNo)
        {
            $maxOrderNo = substr($maxOrderNo, strlen($orderPrefix));
            $orderNo = $orderPrefix.str_pad($maxOrderNo + 1, 5, '0', STR_PAD_LEFT);
        }
        else
        {
            $orderNo = $orderPrefix."00001";
        }

        // echo $orderNo; exit();

        return view('admin.bookingOrder.add')->with(compact('title','formLink','buttonName','services','serviceTypes','zones','orderNo','deliveryTypes','areas'));
    }

    public function save(Request $request)
    {
        // dd($request->all());

        if ($request->bookingDate)
        {
            $bookingDate = date('Y-m-d',strtotime($request->bookingDate));
        }
        else
        {
            $bookingDate = "";
        }

        if ($request->deliveryDate)
        {
            $deliveryDate = date('Y-m-d',strtotime($request->deliveryDate));
        }
        else
        {
            $bookingDate = "";
        }

        if ($request->cod == "Yes")
        {
            $codAmount = $request->codAmount;
        }
        else
        {
            $codAmount = 0;
        }

        if ($request->clientId)
        {
            $senderId = $request->clientId;
        }
        else
        {
            if ($request->senderType == "Client")
            {            
                $client = Client::create([
                    'user_role_id' => 4,
                    'name' => $request->senderName,
                    'phone' => $request->senderPhoneNumber,
                    'address' => $request->address,
                    'password' => bcrypt('123456'),
                    'created_by' => $this->userId,
                ]);
            }
            else
            {
                $user = Admin::create( [           
                    'role' => 12,     
                    'name' => $request->senderName,
                    'phone' => $request->senderPhoneNumber,
                    'password' => bcrypt('123456'),                      
                ]);

                $client = Marchant::create([
                    'user_id' => $user->id,
                    'user_role_id' => 12,
                    'name' => $request->senderName,
                    'contact_person_phone' => $request->senderPhoneNumber,
                    'address' => $request->address,
                    'created_by' => $this->userId,
                ]);
            }

            $senderId = $client->id;
        }        

        $bookingOrder = BookingOrder::create([
            'order_no' => $request->orderNo,
            'date' => $bookingDate,
            'delivery_date' => $deliveryDate,
            'booked_type' => $request->senderType,
            'sender_id' => $senderId,
            'sender_hub_id' => $request->senderHubId,
            'sender_area_id' => $request->senderArea,
            'sender_name' => $request->senderName,
            'sender_phone' => $request->senderPhoneNumber,
            'sender_zone_type' => $request->senderZoneType,
            'sender_zone_id' => $request->senderZoneId,
            'sender_address' => $request->senderAddress,
            'receiver_hub_id' => $request->receiverHubId,
            'receiver_area_id' => $request->receiverArea,
            'receiver_name' => $request->receiverName,
            'receiver_phone' => $request->receiverPhoneNumber,
            'receiver_zone_type' => $request->receiverZoneType,
            'receiver_zone_id' => $request->receiverZoneId,
            'receiver_address' => $request->receiverAddress,
            'remarks' => $request->remarks,
            'courier_type_id' => $request->serviceId,
            'delivery_type_id' => $request->serviceTypeId,
            'charge_name' => $request->chargeName,
            'delivery_charge_unit' => $request->deliveryChargeUnit,
            'delivery_charge_unit_per_uom' => $request->deliveryChargeUnitPerUom,
            'uom' => $request->uom,
            'cod' => $request->cod,
            'cod_amount' => $codAmount,
            'cod_charge_percentage' => $request->codChargePercentage,
            'cod_charge' => $request->codCharge,
            'delivery_charge' => $request->deliveryCharge,
            'delivery_duration_id' => $request->deliveryTypeId,
            'collection_payment' => $request->collectionPayment,
            'delivery_payment' => $request->deliveryPayment,
            'created_by' => $this->userId,
        ]);

        // return redirect(route('bookingOrder.index'))->with('msg','Order Booked Successfully');
        return redirect(route('bookingOrder.view',$bookingOrder->id))->with('msg','Order Booked Successfully');
    }

    public function edit($bookedOrderId)
    {
        $title = "Edit Booked Order";
        $formLink = "bookingOrder.update";
        $buttonName = "Update";

        $services = Service::orderBy('name','asc')->get();
        $serviceTypes = ServiceType::orderBy('name','asc')->get();
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();
        $areas = AreaSetup::orderBy('name','asc')->get();

        $zones = DB::table('view_zones')->select('view_zones.*')->orderBy('view_zones.zone_type')->get();

        $toDayDate = date("Y-m-d");
        $orderPrefix = "QE-".date('ymd')."-";

        $maxOrderNo = BookingOrder::where('date',$toDayDate)->max('order_no');

        if ($maxOrderNo)
        {
            $maxOrderNo = substr($maxOrderNo, strlen($orderPrefix));
            $orderNo = $orderPrefix.str_pad($maxOrderNo + 1, 5, '0', STR_PAD_LEFT);
        }
        else
        {
            $orderNo = $orderPrefix."00001";
        }

        $bookedOrder = BookingOrder::where('id',$bookedOrderId)->first();

        return view('admin.bookingOrder.edit')->with(compact('title','formLink','buttonName','bookedOrder','services','serviceTypes','zones','orderNo','deliveryTypes','areas'));
    }

    public function update(Request $request)
    {
        // dd($request->all());

        if ($request->bookingDate)
        {
            $bookingDate = date('Y-m-d',strtotime($request->bookingDate));
        }
        else
        {
            $bookingDate = "";
        }

        if ($request->deliveryDate)
        {
            $deliveryDate = date('Y-m-d',strtotime($request->deliveryDate));
        }
        else
        {
            $bookingDate = "";
        }

        if ($request->cod == "Yes")
        {
            $codAmount = $request->codAmount;
        }
        else
        {
            $codAmount = 0;
        }

        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        $bookedOrder->update([
            'order_no' => $request->orderNo,
            'date' => $bookingDate,
            'delivery_date' => $deliveryDate,
            'booked_type' => $request->senderType,
            'sender_id' => $request->clientId,
            'sender_hub_id' => $request->senderHubId,
            'sender_area_id' => $request->senderArea,
            'sender_name' => $request->senderName,
            'sender_phone' => $request->senderPhoneNumber,
            'sender_zone_type' => $request->senderZoneType,
            'sender_zone_id' => $request->senderZoneId,
            'sender_address' => $request->senderAddress,
            'receiver_hub_id' => $request->receiverHubId,
            'receiver_area_id' => $request->receiverArea,
            'receiver_name' => $request->receiverName,
            'receiver_phone' => $request->receiverPhoneNumber,
            'receiver_zone_type' => $request->receiverZoneType,
            'receiver_zone_id' => $request->receiverZoneId,
            'receiver_address' => $request->receiverAddress,
            'remarks' => $request->remarks,
            'courier_type_id' => $request->serviceId,
            'delivery_type_id' => $request->serviceTypeId,
            'charge_name' => $request->chargeName,
            'delivery_charge_unit' => $request->deliveryChargeUnit,
            'delivery_charge_unit_per_uom' => $request->deliveryChargeUnitPerUom,
            'uom' => $request->uom,
            'cod' => $request->cod,
            'cod_amount' => $codAmount,
            'cod_charge_percentage' => $request->codChargePercentage,
            'cod_charge' => $request->codCharge,
            'delivery_charge' => $request->deliveryCharge,
            'delivery_duration_id' => $request->deliveryTypeId,
            'collection_payment' => $request->collectionPayment,
            'delivery_payment' => $request->deliveryPayment,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('bookingOrder.index'))->with('msg','Booked Order Updated Successfully');
    }

    public function view($bookedOrderId)
    {

        $bookedOrder = BookingOrder::select('tbl_booking_orders.*','tbl_services.name as serviceName','tbl_service_types.name as serviceTypeName','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_services','tbl_services.id','=','tbl_booking_orders.courier_type_id')
            ->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_duration_id')
            ->where('tbl_booking_orders.id',$bookedOrderId)
            ->orderBy('id','desc')
            ->first();

        $senderAreaInfo = AreaSetup::where('id',$bookedOrder->sender_area_id)->first();
        $receiverAreaInfo = AreaSetup::where('id',$bookedOrder->receiver_area_id)->first();

        $senderInfo = DB::table('view_zones')
            ->select('view_zones.*')
            ->where('zone_type',$bookedOrder->sender_zone_type)
            ->where('zone_id',$bookedOrder->sender_zone_id)
            ->first();

        $receiverInfo = DB::table('view_zones')
            ->select('view_zones.*')
            ->where('zone_type',$bookedOrder->receiver_zone_type)
            ->where('zone_id',$bookedOrder->receiver_zone_id)
            ->first();

        $companyInformation = WebsiteInformation::first();

        // dd($receiverInfo);
        $title = "POS_Order - ".$bookedOrder->order_no;

        return view('admin.bookingOrder.view')->with(compact('title','bookedOrder','senderInfo','receiverInfo','companyInformation','senderAreaInfo','receiverAreaInfo'));
    }

    public function getAgentInfo(Request $request)
    {
        $area = AreaSetup::where('id',$request->areaId)->first();

        $agent = Agent::where('hub_id',$area->hub_id)->first();

        // $agent = Agent::whereRaw('FIND_IN_SET(?,area)',[$areaId])->first();

        if ($agent)
        {
            $zoneId = $agent->id;
            $zoneType = "Agent";
            $hubId = $area->hub_id;
        }
        else
        {
            $zoneId = "";
            $zoneType = "";
            $hubId = '';
        }
        
        if($request->ajax())
        {
            return response()->json([
                'zoneId' => $zoneId,
                'zoneType'=> $zoneType,
                'hubId' => $hubId
            ]);
        }
    }

    public function getClientInfo(Request $request)
    {
        $senderPhoneNumber = $request->senderPhoneNumber;

        $clientInfo = DB::table('view_clients')
            ->select('view_clients.*')
            ->where('clientPhone',$senderPhoneNumber)
            // ->where('clientPhone','like','%'.$senderPhoneNumber.'%')
            ->first();

        // dd($clientInfo);

        if ($clientInfo)
        {
            $area = AreaSetup::where('id',$clientInfo->clientAreaId)->first();

            $agent = Agent::where('hub_id',$area->hub_id)->first();
            
            // dd($area);
            $senderName = $clientInfo->clientName;
            $senderAddress = $clientInfo->clientAddress;
            $clientId = $clientInfo->clientId;
            $clientType = $clientInfo->clientType;
            $clientUserRoleId = $clientInfo->clientUserRoleId;
            $senderHubId = $clientInfo->clientHubId;
            $senderAreaId = $clientInfo->clientAreaId;
            $senderCodChargePercentage = $clientInfo->clientCodChargePercentage;
            $senderParcelReturnable = @$clientInfo->clientParcelReturnable;
            $zoneId = $agent->id;
            $zoneType = "Agent";
        }
        else
        {
            $senderName = "";
            $senderAddress = "";
            $clientId = "";
            $clientType = "";
            $clientUserRoleId = "";
            $senderHubId = "";
            $senderAreaId = "";
            $senderCodChargePercentage = "1";
            $senderParcelReturnable = "0";
            $zoneId = "";
            $zoneType = "";
        }
        
        if($request->ajax())
        {
            return response()->json([
                'senderName' => $senderName,
                'senderAddress'=> $senderAddress,
                'clientId'=> $clientId,
                'clientType'=> $clientType,
                'clientUserRoleId'=> $clientUserRoleId,
                'senderHubId'=> $senderHubId,
                'senderAreaId'=> $senderAreaId,
                'senderCodChargePercentage'=> $senderCodChargePercentage,
                'senderParcelReturnable'=> $senderParcelReturnable,
                'zoneId' => $zoneId,
                'zoneType'=> $zoneType,
            ]);
        }
    }

    public function getReceiverInfo(Request $request)
    {
        $receiverInfo = BookingOrder::select('tbl_booking_orders.*')
            ->where('tbl_booking_orders.receiver_phone',$request->receiverPhoneNumber)
            ->orderBy('tbl_booking_orders.id','desc')
            ->first();

        if ($receiverInfo)
        {
            $area = AreaSetup::where('id',$receiverInfo->receiver_area_id)->first();

            $agent = Agent::where('hub_id',$area->hub_id)->first();
            $receiverName = $receiverInfo->receiver_name;
            $receiverAddress = $receiverInfo->receiver_address;
            $receiverHubId = $receiverInfo->receiver_hub_id;
            $receiverAreaId = $receiverInfo->receiver_area_id;
            $zoneId = $agent->id;
            $zoneType = "Agent";
        }
        else
        {
            $receiverName = "";
            $receiverAddress = "";
            $receiverHubId = "";
            $receiverAreaId = "";
            $zoneId = "";
            $zoneType = "";
        }
        
        if($request->ajax())
        {
            return response()->json([
                'receiverName' => $receiverName,
                'receiverAddress'=> $receiverAddress,
                'receiverHubId' =>$receiverHubId,
                'receiverAreaId' =>$receiverAreaId,
                'zoneId' => $zoneId,
                'zoneType'=> $zoneType,
            ]);
        }
    }

    public function getServiceInfo(Request $request)
    {
        $serviceInfo = Service::where('id',$request->serviceTypeId)->first();
        
        if($request->ajax())
        {
            return response()->json([
                'serviceInfo'=>$serviceInfo,
            ]);
        }
    }

    public function getChargeInfo(Request $request)
    {
        if ($request->senderType == 'Merchant' && $request->clientId != '')
        {
            $charge = ChargeForMerchant::where('merchant_id',$request->clientId)
                ->where('service_type_id',$request->serviceTypeId)
                ->where('service_id',$request->serviceId)
                ->first();
        }
        else
        {
            $charge = ChargeForClient::where('service_type_id',$request->serviceTypeId)
                ->where('service_id',$request->serviceId)
                ->first();
        }

        // dd($charge);

        if ($request->serviceId)
        {
            $paymentForCollection = ChargeForDeliveryMen::where('service_type_name','Collect')->where('service_id',$request->serviceId)->first();
            $paymentForDelivery = ChargeForDeliveryMen::where('service_type_name','Delivery')->where('service_id',$request->serviceId)->first();

            // dd($paymentForDelivery);

            if ($paymentForCollection)
            {
                $collectionPayment = $paymentForCollection->charge;
            }
            else
            {
                $collectionPayment = 0;
            }

            if ($paymentForDelivery)
            {
                $deliveryPayment = $paymentForDelivery->charge;
            }
            else
            {
                $deliveryPayment = 0;
            }
        }
        else
        {
            $collectionPayment = 0;
            $deliveryPayment = 0;
        }

        if ($charge)
        {
            $chargeName = $charge->name;
            $charges = $charge->charge;
            $chargePerUom = $charge->charge_per_uom;
        }
        else
        {
            $chargeName = "";
            $charges = "";
            $chargePerUom = "";
        }        
        
        if($request->ajax())
        {
            return response()->json([
                'chargeName'=>$chargeName,
                'charge'=>$charges,
                'chargePerUom'=>$chargePerUom,
                'collectionPayment'=>$collectionPayment,
                'deliveryPayment'=>$deliveryPayment,
            ]);
        }
    }

    public function delete(Request $request)
    {
        BookingOrder::where('id',$request->bookingOrderId)->delete();
    }

    public function status(Request $request)
    {
        $bookingOrder = BookingOrder::find($request->bookingOrderId);

        if ($bookingOrder->status == 1)
        {
            $bookingOrder->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $bookingOrder->update( [               
                'status' => 1                
            ]);
        }
    }
}
