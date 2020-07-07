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
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="85px">Order No</th>
                            <th style="font-weight: bold; vertical-align: middle;" colspan="3">Receiver</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="100px">Delivery Type</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="50px">Charge</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="60px">Goods Receieve</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="60px">Delivery Status</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="70px">Action</th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th width="60px">Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody id="">
                    	@php
                    		$sl = 1;
                    	@endphp
                        @foreach ($receiverOrders as $receiverOrder)
                    		<tr class="row_{{ $receiverOrder->id }}">
                    			<td>{{ $sl++ }}</td>
                    			<td>{{ date('d-m-Y', strtotime($receiverOrder->date)) }}</td>
                                <td>{{ $receiverOrder->order_no }}</td>
                                <td>{{ $receiverOrder->receiver_name }}</td>
                                <td>{{ $receiverOrder->receiver_phone }}</td>
                                <td>{{ $receiverOrder->receiver_address }}</td>
                                <td>{{ $receiverOrder->deliveryTypeName }}</td>
                    			<td>{{ $receiverOrder->delivery_charge }}</td>
                                <td style="vertical-align: middle; text-align: center;">
                                    @if ($receiverOrder->deliveryTypeId == 1 || $receiverOrder->deliveryTypeId == 4)
                                        @if (empty($receiverOrder->delivery_man_id))
                                            <span class="switchery-demo m-b-30" onclick="goodsReceiveStatus({{ $receiverOrder->id }})">
                                                <input type="checkbox" {{ $receiverOrder->receiver_goods_receieve_status == 1 ? 'checked' : '' }} class="js-switch" data-color="#00c292" data-switchery="true" style="display: none;">
                                            </span>
                                        @else
                                            <h5><span class="badge badge-success">Delivery<br>Man<br>Assigned</span></h5>
                                        @endif
                                    @else
                                        @if ($receiverOrder->delivery_status == 1)
                                            <h5><span class="badge badge-success">Delivered<br>Without<br>Verification</span></h5>
                                        @else
                                            <span class="switchery-demo m-b-30" onclick="goodsReceiveStatus({{ $receiverOrder->id }})">
                                                <input type="checkbox" {{ $receiverOrder->receiver_goods_receieve_status == 1 ? 'checked' : '' }} class="js-switch" data-color="#00c292" data-switchery="true" style="display: none;">
                                            </span>
                                        @endif
                                    @endif
                                </td>

                    			<td style="vertical-align: middle; text-align: center;">
                                    @if ($receiverOrder->receiver_goods_receieve_status == 0)
                                        <h5><span class="badge badge-success">Recieve<br>Goods<br>At First</span></h5>
                                    @else
                                        @if ($receiverOrder->deliveryTypeId == 1 || $receiverOrder->deliveryTypeId == 4)
                                            @if (empty($receiverOrder->delivery_man_id))
                                                <h5><span class="badge badge-success">Assign<br>Delivery<br>Man</span></h5>
                                            @else
                                                @if ($receiverOrder->delivery_status == 1)
                                                    <h5><span class="badge badge-success">Delivered<br>Without<br>Verification</span></h5>
                                                @else
                                                    <h5><span class="badge badge-success">Wait For<br>Delivery</span></h5>
                                                @endif
                                            @endif
                                        @else
                                            @if ($receiverOrder->delivery_status == 1)
                                                <h5><span class="badge badge-success">Delivered Without<br>Verification</span></h5>
                                            @else
                                                <span class="switchery-demo m-b-30" onclick="goodsDeliveryStatus({{ $receiverOrder->id }})">
                                                    <input type="checkbox" {{ $receiverOrder->delivery_status == 1 ? 'checked' : '' }} class="js-switch" data-color="#00c292" data-switchery="true" style="display: none;">
                                                </span>
                                            @endif
                                        @endif
                                    @endif
                    			</td>
                    			<td>
                                    @php
                                        echo \App\Link::action($receiverOrder->id);
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
        function goodsReceiveStatus(bookedOrderId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('receiverOrder.goodsReceiveStatus') }}",
                data: {bookedOrderId:bookedOrderId},
                success: function(response) {
                    swal({
                        title: "<small class='text-success'>Success!</small>", 
                        type: "success",
                        text: "Goods Received Successfully!",
                        timer: 1000,
                        html: true,
                    });
                    setTimeout(function(){  // wait for 1 secs(2)
                        location.reload(true); // then reload the page.(3)
                    }, 1000)
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

        function goodsDeliveryStatus(bookedOrderId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('receiverOrder.goodsDeliveryStatus') }}",
                data: {bookedOrderId:bookedOrderId},
                success: function(response) {
                    swal({
                        title: "<small class='text-success'>Success!</small>", 
                        type: "success",
                        text: "Goods Delivered Successfully!",
                        timer: 1000,
                        html: true,
                    });
                    setTimeout(function(){  // wait for 1 secs(2)
                        location.reload(true); // then reload the page.(3)
                    }, 1000)
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