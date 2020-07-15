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
                    <td style="font-weight: bold;">Name</td>
                    <td>{{ $bookedOrder->sender_name }}</td>
                    <td>{{ $bookedOrder->receiver_name }}</td>
                    <td rowspan="8" style="text-align: center;">
                        <div class="button-margin">
                            @if (empty($bookedOrder->collection_man_id))
                                @if ($bookedOrder->deliveryTypeId == 1 || $bookedOrder->deliveryTypeId == 2)
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('senderOrder.assignCollectionMan',$bookedOrder->id) }}">
                                        Assign Collection Man
                                    </a>
                                @endif
                            @endif
                        </div>

                        <div class="button-margin">
                            @if ($bookedOrder->deliveryTypeId == 3 || $bookedOrder->deliveryTypeId == 4)
                                @if (empty($bookedOrder->host_warehouse_id) && $bookedOrder->sender_goods_receieve_status == 1)
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('senderOrder.transferToHostWarehouse',$bookedOrder->id) }}">
                                        Transfer To Host Warehouse
                                    </a>
                                @endif
                            @else
                                @if (!empty($bookedOrder->collection_man_id) && empty($bookedOrder->host_warehouse_id) && $bookedOrder->collection_status == 1 && $bookedOrder->sender_goods_receieve_status == 1)
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('senderOrder.transferToHostWarehouse',$bookedOrder->id) }}">
                                        Transfer To Host Warehouse
                                    </a>
                                @endif
                            @endif
                        </div>
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

        @if (!empty($bookedOrder->collection_man_id))
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="2">Collection Man Information</th>
                        <th width="100px">Image</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td style="font-weight: bold;" width="100px">Name</td>
                        <td>{{ $bookedOrder->collectionManName }}</td>
                        <td rowspan="4"><img src="{{ asset($bookedOrder->collectionManImage) }}" width="100px" height="100px"></td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold;" width="100px">Phone</td>
                        <td>{{ $bookedOrder->collectionManPhone }}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold;" width="100px">Address</td>
                        <td>{{ $bookedOrder->collectionManAddress }}</td>
                    </tr>
                </tbody>
            </table>
        @endif

        @if (!empty($bookedOrder->host_warehouse_id))
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="2">Host Warehouse Information</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td style="font-weight: bold;" width="120px">Name</td>
                        <td>{{ $bookedOrder->hostWarehouseName }}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold;" width="120px">Contact Person</td>
                        <td>{{ $bookedOrder->hostWarehouseContactPerson }}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold;" width="120px">Phone</td>
                        <td>{{ $bookedOrder->hostWarehousePhone }}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold;" width="120px">Address</td>
                        <td>{{ $bookedOrder->hostWarehouseAddress }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
@endsection