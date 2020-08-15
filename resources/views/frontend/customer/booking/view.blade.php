@extends('frontend.customer.index') 

@section('customer_content')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm booking_info">
                <tbody>
                    <thead>
                        <tr>
                            <th colspan="6" class="text-center">Booking Information</th>
                        </tr>
                    </thead>
                    <tr>
                        <th class="head_name">Booking Date</th>
                        <td>{{ date('d-m-Y', strtotime(@$bookedOrder->date)) }}</td>
                        <th class="head_name">Order No</th>
                        <td>{{ $bookedOrder->order_no }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Sender Name</th>
                        <td>{{ $bookedOrder->sender_name }}</td>
                        <th class="head_name">Receiver Name</th>
                        <td>{{ $bookedOrder->receiver_name }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Sender Phone Number</th>
                        <td>{{ $bookedOrder->sender_phone }}</td>
                        <th class="head_name">Receiver Phone Number</th>
                        <td>{{ $bookedOrder->receiver_phone }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Sender Zone</th>
                        <td>{{ $sender_zone->zone_name }}</td>
                        <th class="head_name">Receiver Zone</th>
                        <td>{{ $receiver_zone->zone_name }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Sender Address</th>
                        <td>{{ $bookedOrder->sender_address }}</td>
                        <th class="head_name">Receiver Address</th>
                        <td>{{ $bookedOrder->receiver_address }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Service Type</th>
                        <td>{{$service_type->name}}</td>
                        <th class="head_name">Delivery Type</th>
                        <td>{{$delivery_type->name}}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Quantity/Kg/Litre</th>
                        <td>{{ $bookedOrder->uom }}</td>
                        <th class="head_name">Delivery Charge</th>
                        <td>{{ $bookedOrder->delivery_charge }}</td>
                    </tr>


                </tbody>
            </table>
        </div>
        <br>
        <h4 style="text-align: center;border-bottom: 1px solid #cecdcd;padding-bottom: 10px;">
            Order Followup
        </h4>
        <div class="table-responsive">
            <table class="table table-bordered table-sm booking_info">
                <tbody>
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">Delivery Process</th>
                            {{-- <th class="text-center">User</th> --}}
                            <th class="text-center">Date / Time</th>
                            <th class="text-center delivery_status">Status</th>
                        </tr>
                    </thead>
                    <tr>
                        <th class="head_name">Doc / Percel Collection</th>
                        <td>{{$collectionMan->name}}</td>
                        {{-- <td></td> --}}
                        <td>{{Date('d-m-Y'),strtotime($bookedOrder->created_at)}} / {{Date('H:i a'),strtotime($bookedOrder->created_at)}}</td>
                        <td class="text-center">
                            @if($bookedOrder->collection_status == 0)
                                <span class="pending">Pending</span>
                            @else
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Host Agent</th>
                        <td>{{$sender_zone->zone_name}}</td>
                        {{-- <td></td> --}}
                        <td>{{Date('d-m-Y'),strtotime($bookedOrder->created_at)}} / {{Date('H:i a'),strtotime($bookedOrder->created_at)}}</td>
                        <td class="text-center">
                            @if($bookedOrder->sender_goods_receieve_status == 0)
                                <span class="pending">Pending</span>
                            @else
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Host Warehouse</th>
                        <td>{{$host_ware_house->name}}</td>
                        {{-- <td></td> --}}
                        <td>{{Date('d-m-Y'),strtotime($bookedOrder->created_at)}} / {{Date('H:i a'),strtotime($bookedOrder->created_at)}}</td>
                        <td class="text-center">
                            @if($bookedOrder->host_warehouse_goods_receieve_status == 0)
                                <span class="pending">Pending</span>
                            @else
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Delivery Warehouse</th>
                        <td>{{$delivery_ware_house->name}}</td>
                        {{-- <td></td> --}}
                        <td>{{Date('d-m-Y'),strtotime($bookedOrder->created_at)}} / {{Date('H:i a'),strtotime($bookedOrder->created_at)}}</td>
                        <td class="text-center">
                            @if($bookedOrder->destination_warehouse_goods_receieve_status == 0)
                                <span class="pending">Pending</span>
                            @else
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Delivery Agent</th>
                        <td>{{$receiver_zone->zone_name}}</td>
                        {{-- <td></td> --}}
                        <td>{{Date('d-m-Y'),strtotime($bookedOrder->created_at)}} / {{Date('H:i a'),strtotime($bookedOrder->created_at)}}</td>
                        <td class="text-center">
                            @if($bookedOrder->receiver_goods_receieve_status == 0)
                                <span class="pending">Pending</span>
                            @else
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Delivery Man</th>
                        <td>{{@$deliveryMan->name}}</td>
                        {{-- <td></td> --}}
                        <td>{{Date('d-m-Y'),strtotime($bookedOrder->created_at)}} / {{Date('H:i a'),strtotime($bookedOrder->created_at)}}</td>
                        <td class="text-center">
                            @if($bookedOrder->delivery_status == 0)
                                <span class="pending">Pending</span>
                            @else
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Goods delivery</th>
                        <td>
                            @if($bookedOrder->delivery_status == 0)
                                <span class="pending">Processing</span>
                            @else
                                <span class="done">Complete</span>
                            @endif
                        </td>
                        {{-- <td></td> --}}
                        <td>{{Date('d-m-Y'),strtotime($bookedOrder->created_at)}} / {{Date('H:i a'),strtotime($bookedOrder->created_at)}}</td>
                        <td class="text-center">
                            @if($bookedOrder->delivery_status == 0)
                                <span class="pending">Processing</span>
                            @else
                                <span class="done">Complete</span>
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection