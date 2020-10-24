@extends('admin.layouts.masterIndex')

@section('card_body')
    <div class="card-body">
        <div class="table-responsive">
            @php
                $sl = 0;
            @endphp

            <table id="dataTable" class="table table-bordered table-striped" width="100%" name="areaTable">
                <thead>
                    <tr>
                        <th width="20px">SL</th>
                        <th width="100px">Order Date</th>
                        <th width="120px">Delivery Date</th>
                        <th>Order No</th>
                        <th width="150px">Hub Name</th>
                        <th width="150px">Area Name</th>
                        <th width="150px">Delivery Man Name</th>
                        <th width="100px">Order Status</th>
                        <th width="50px">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                		$sl = 1;
                	@endphp
                    @foreach ($allAssignedOrderStatus as $orderStatus)
                		<tr class="row_{{ $orderStatus->id }}">
                			<td>{{ $sl++ }}</td>
                            <td>{{ date('d-m-Y', strtotime($orderStatus->date)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($orderStatus->delivery_date)) }}</td>
                            <td>{{ $orderStatus->order_no }}</td>
                            <td class="text-right">{{ $orderStatus->hubName }}</td>
                            <td class="text-right">{{ $orderStatus->areaName }}</td>
                            <td class="text-right">{{ $orderStatus->deliveryManName }}</td>
                            <td class="text-right">{{ $orderStatus->order_status == null ? 'No Status' : $orderStatus->order_status }}</td>
                			<td>
                                <button class="btn btn-outline-success btn-sm" onclick="reject({{ $orderStatus->id }});">Reject</button>		
                			</td>
                		</tr>
                	@endforeach
                </tbody>
            </table>
        </div>
    </div>	
@endsection

@section('custom-js')
    <script>                
        //ajax status change code
        function reject(orderId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('assignedOrderStatus.reject') }}",
                data: {orderId:orderId},
                success: function(response) {
                    swal({
                        title: "<small class='text-success'>Success!</small>", 
                        type: "success",
                        text: "Reject Delivery Man Successfully!",
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