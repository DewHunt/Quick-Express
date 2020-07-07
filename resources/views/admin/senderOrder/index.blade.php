@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="custom-card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="custom-card-title">{{ $title }}</h4></div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @php
                    $sl = 0;
                @endphp

                <table id="dataTable" class="table table-bordered table-striped" width="100%" name="areaTable">
                    <thead>
                        <tr style="background: #00c292; text-align: center;">
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="20px">SL</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="80px">Date</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="80px">Order No</th>
                            <th style="font-weight: bold; vertical-align: middle;" colspan="3">Sender</th>
                            <th style="font-weight: bold; vertical-align: middle;" colspan="3">Receiver</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="100px">Delivery Type</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="50px">Charge</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="60px">Goods Receieve</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="70px">Action</th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th width="60px">Phone</th>
                            <th>Address</th>
                            <th>Name</th>
                            <th width="60px">Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody id="">
                    	@php
                    		$sl = 1;
                    	@endphp
                        @foreach ($senderOrders as $senderOrder)
                    		<tr class="row_{{ $senderOrder->id }}">
                    			<td>{{ $sl++ }}</td>
                    			<td>{{ date('d-m-Y', strtotime($senderOrder->date)) }}</td>
                                <td>{{ $senderOrder->order_no }}</td>
                                <td>{{ $senderOrder->sender_name }}</td>
                                <td>{{ $senderOrder->sender_phone }}</td>
                                <td>{{ $senderOrder->sender_address }}</td>
                                <td>{{ $senderOrder->receiver_name }}</td>
                                <td>{{ $senderOrder->receiver_phone }}</td>
                                <td>{{ $senderOrder->receiver_address }}</td>
                                <td>{{ $senderOrder->deliveryTypeName }}</td>
                    			<td>{{ $senderOrder->delivery_charge }}</td>
                    			<td>
                                    @if ($senderOrder->deliveryTypeId == 1 || $senderOrder->deliveryTypeId == 2)
                                        @if (empty($senderOrder->collection_man_id))
                                            Assign Collection Man
                                        @else
                                            @if ($senderOrder->collection_status == 1)
                                                <span class="switchery-demo m-b-30" onclick="statusChange({{ $senderOrder->id }})">
                                                    <input type="checkbox" {{ $senderOrder->sender_goods_receieve_status == 1 ? 'checked' : '' }} class="js-switch" data-color="#00c292" data-switchery="true" style="display: none;">
                                                </span>
                                            @else
                                                Wait For Collection
                                            @endif
                                        @endif
                                    @else
                                        <span class="switchery-demo m-b-30" onclick="statusChange({{ $senderOrder->id }})">
                                            <input type="checkbox" {{ $senderOrder->sender_goods_receieve_status == 1 ? 'checked' : '' }} class="js-switch" data-color="#00c292" data-switchery="true" style="display: none;">
                                        </span>
                                    @endif
                    			</td>
                    			<td>
                                    @php
                                        echo \App\Link::action($senderOrder->id);
                                    @endphp
                                </td>
                    		</tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>                
        //ajax status change code
        function statusChange(bookedOrderId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('senderOrder.goodsReceiveStatus') }}",
                data: {bookedOrderId:bookedOrderId},
                success: function(response) {
                    swal({
                        title: "<small class='text-success'>Success!</small>", 
                        type: "success",
                        text: "Goods Receive Successfully!",
                        timer: 1000,
                        html: true,
                    });
                },
                error: function(response) {
                    error = "Failed.";
                    swal({
                        title: "<small class='text-danger'>Error!</small>", 
                        type: "error",
                        text: error,
                        timer: 2000,
                        html: true,
                    });
                }
            });
        }
    </script>
@endsection