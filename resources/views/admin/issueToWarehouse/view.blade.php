@extends('admin.layouts.masterView')

@section('custom_css')
    <style type="text/css">
        .button-margin{
            margin-bottom: 8px;
        }
    </style>
@endsection

@section('card_body')
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                	<th width="120px">Heading</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>

            <tbody>
            	<tr>
            		<td style="font-weight: bold;">Type</td>
            		<td>{{ $bookedOrder->sender_zone_type }}</td>
            		<td>{{ $bookedOrder->receiver_zone_type }}</td>
            		<td rowspan="8" style="text-align: center;">
                        <div class="button-margin">
                            @if (empty($bookedOrder->destination_warehouse_id))
                                <a class="btn btn-outline-info btn-sm" href="{{ route('issueToWarehouse.issueToWarehouse',$bookedOrder->id) }}">
                                    Issue To Warehouse
                                </a>
                            @endif
                        </div>
            		</td>
            	</tr>

            	<tr>
            		<td style="font-weight: bold;">Name</td>
            		<td>{{ $senderInfo->zone_name }}</td>
            		<td>{{ $receiverInfo->zone_name }}</td>
            	</tr>

                <tr>
                    <td style="font-weight: bold;">Phone</td>
                    <td>{{ $senderInfo->zone_phone }}</td>
                    <td>{{ $receiverInfo->zone_phone }}</td>
                </tr>

            	<tr>
            		<td style="font-weight: bold;">Address</td>
            		<td>{{ $senderInfo->zone_address }}</td>
            		<td>{{ $receiverInfo->zone_address }}</td>
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

        @if (!empty($bookedOrder->destination_warehouse_id))
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="2">Destination Warehouse Information</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td style="font-weight: bold;" width="120px">Name</td>
                        <td>{{ $bookedOrder->destinationWarehouseName }}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold;" width="120px">Contact Person</td>
                        <td>{{ $bookedOrder->destinationWarehouseContactPerson }}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold;" width="120px">Phone</td>
                        <td>{{ $bookedOrder->destinationWarehousePhone }}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold;" width="120px">Address</td>
                        <td>{{ $bookedOrder->destinationWarehouseAddress }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
@endsection