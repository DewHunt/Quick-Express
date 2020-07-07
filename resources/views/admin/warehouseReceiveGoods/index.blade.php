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
                            <th style="font-weight: bold; vertical-align: middle;" colspan="4">Sender</th>
                            <th style="font-weight: bold; vertical-align: middle;" colspan="4">Receiver</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="50px">Charge</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="60px">Goods Receieve</th>
                            <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="70px">Action</th>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <th>Name</th>
                            <th width="60px">Phone</th>
                            <th>Address</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th width="60px">Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody id="">
                    	@php
                    		$sl = 1;
                    	@endphp
                        @foreach ($allReceivedGoods as $receivedGoods)
                    		<tr class="row_{{ $receivedGoods->id }}">
                    			<td>{{ $sl++ }}</td>
                    			<td>{{ date('d-m-Y', strtotime($receivedGoods->date)) }}</td>
                                <td>{{ $receivedGoods->order_no }}</td>

                                <td>{{ $receivedGoods->sender_zone_type }}</td>
                                @php
                                    $senderInfo = DB::table('view_zones')->select('view_zones.*')->where('zone_id',$receivedGoods->sender_zone_id)->first();
                                @endphp
                                <td>{{ $senderInfo->zone_name }}</td>
                                <td>{{ $senderInfo->zone_phone }}</td>
                                <td>{{ $senderInfo->zone_address }}</td>

                                <td>{{ $receivedGoods->receiver_zone_type }}</td>
                                @php
                                    $receiverInfo = DB::table('view_zones')->select('view_zones.*')->where('zone_id',$receivedGoods->receiver_zone_id)->first();
                                @endphp
                                <td>{{ $receiverInfo->zone_name }}</td>
                                <td>{{ $receiverInfo->zone_phone }}</td>
                                <td>{{ $receiverInfo->zone_address }}</td>

                    			<td>{{ $receivedGoods->delivery_charge }}</td>
                    			<td>
                                    <span class="switchery-demo m-b-30" onclick="statusChange({{ $receivedGoods->id }})">
                                        <input type="checkbox" {{ $receivedGoods->host_warehouse_goods_receieve_status == 1 ? 'checked' : '' }} class="js-switch" data-color="#00c292" data-switchery="true" style="display: none;">
                                    </span>
                    			</td>
                    			<td>
                                    @php
                                        echo \App\Link::action($receivedGoods->id);
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
                url: "{{ route('warehouseReceiveGoods.goodsReceiveStatus') }}",
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