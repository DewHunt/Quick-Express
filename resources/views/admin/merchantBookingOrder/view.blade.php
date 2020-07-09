@extends('admin.layouts.masterView')

@section('card_body')
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                	<th width="120px">Headiing</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                </tr>
            </thead>
            <tbody>
            	<tr>
            		<td style="font-weight: bold;">Name</td>
            		<td>{{ $bookedOrder->sender_name }}</td>
            		<td>{{ $bookedOrder->receiver_name }}</td>
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
            		<td style="font-weight: bold;">Courier Type</td>
            		<td>{{ $bookedOrder->courierTypeName }}</td>
            		<td rowspan="2">
            			<span style="font-weight: bold;">Total Delivery Charge:</span> {{ $bookedOrder->delivery_charge }} Taka
            			<br>
            			@php
            				$inWords = \App\HelperClass::numberToWords($bookedOrder->deliveryCharge);
            			@endphp
            			<span style="font-weight: bold;">In Words:</span> {{ $inWords }} Taka Only
            		</td>
            	</tr>

            	<tr>
            		<td style="font-weight: bold;">Delivery Type</td>
            		<td>{{ $bookedOrder->deliveryTypeName }}</td>
            	</tr>
            </tbody>
        </table>
    </div>	
@endsection