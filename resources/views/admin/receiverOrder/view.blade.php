@extends('admin.layouts.masterView')

@section('card_body')
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                	<th width="120px">Headiing</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>

            <tbody>
            	<tr>
            		<td style="font-weight: bold;">Name</td>
            		<td>{{ $bookedOrder->sender_name }}</td>
            		<td>{{ $bookedOrder->receiver_name }}</td>
            		<td rowspan="8" style="text-align: center;">
                        @if (empty($bookedOrder->delivery_man_id))
                            @if ($bookedOrder->deliveryTypeId == 1 || $bookedOrder->deliveryTypeId == 4)
                                @if ($bookedOrder->delivery_status == 1)
                                    <h5><span class="badge badge-success">Goods Delivered<br>Without Verification</span></h5>
                                @else
                                    @if ($bookedOrder->receiver_goods_receieve_status == 1)
                                        <a class="btn btn-outline-info btn-md" href="{{ route('receiverOrder.assignDeliveryMan',$bookedOrder->id) }}">
                                            Assign Delivery Man
                                        </a>
                                    @else
                                        <form class="form-horizontal" action="{{ route('receiverOrder.goodsReceiveStatus') }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="bookedOrderId" value="{{ $bookedOrder->id }}">
                                            <input type="hidden" name="returnView" value="1">
                                            <button class="btn btn-outline-info btn-md">Received Goods At First</button> 
                                        </form>                               
                                    @endif
                                @endif
                            @endif
                        @endif
            		</td>
            	</tr>

            	<tr>
            		<td style="font-weight: bold;">Phone</td>
            		<td>{{ $bookedOrder->sender_phone }}</td>
            		<td>{{ $bookedOrder->receiver_phone }}</td>
            	</tr>

            	<tr>
            		<td style="font-weight: bold;">Zone</td>
            		<td>{{ $senderInfo->zone_name }}</td>
            		<td>{{ $receiverInfo->zone_name }}</td>
            	</tr>

            	<tr>
            		<td style="font-weight: bold;">Address</td>
            		<td>{{ $bookedOrder->sender_address }}</td>
            		<td>{{ $bookedOrder->receiver_address }}</td>
            	</tr>

                <tr>
                    <td style="font-weight: bold;">Service Name</td>
                    <td>{{ $bookedOrder->serviceName }}</td>
                    <td rowspan="3" style="vertical-align: middle;">
                        <span style="font-weight: bold;">Total Delivery Charge:</span> {{ $bookedOrder->delivery_charge }} Taka
                        @if ($bookedOrder->cod == 'Yes')
                            <span style="color: red;">(Cash On Delivery)</span>
                        @endif
                        <br>
                        @php
                            $inWords = \App\HelperClass::numberToWords($bookedOrder->delivery_charge);
                        @endphp
                        <span style="font-weight: bold;">In Words:</span> {{ $inWords }} Taka Only
                    </td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Service Type</td>
                    <td>{{ $bookedOrder->serviceTypeName }}</td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Delivery Type</td>
                    <td>{{ $bookedOrder->deliveryTypeName }}</td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Remarks</td>
                    <td colspan="2" style="text-align: justify;">{{ $bookedOrder->remarks }}</td>
                </tr>
            </tbody>
        </table>

        @if (!empty($bookedOrder->delivery_man_id))
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                    	<th colspan="2">Delivery Man Information</th>
                    	<th width="100px">Image</th>
                    </tr>
                </thead>

                <tbody>
                	<tr>
                		<td style="font-weight: bold;" width="100px">Name</td>
                		<td>{{ $bookedOrder->deliveryManName }}</td>
                		<td rowspan="4"><img src="{{ asset($bookedOrder->deliveryManImage) }}" width="100px" height="100px"></td>
                	</tr>

                	<tr>
                		<td style="font-weight: bold;" width="100px">Phone</td>
                		<td>{{ $bookedOrder->deliveryManPhone }}</td>
                	</tr>

                	<tr>
                		<td style="font-weight: bold;" width="100px">Address</td>
                		<td>{{ $bookedOrder->deliveryManAddress }}</td>
                	</tr>
                </tbody>
            </table>
        @endif
    </div>	
@endsection