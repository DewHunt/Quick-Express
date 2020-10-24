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
                        <th width="90px">Order Date</th>
                        <th width="100px">Delivery Date</th>
                        <th width="100px">Order No</th>
                        <th width="100px">Name</th>
                        <th width="90px">Phone</th>
                        <th>Address</th>
                        <th width="90px">Hub Name</th>
                        <th width="90px">Area Name</th>
                        <th width="100px">Delivery Man</th>
                        <th width="50px">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                		$sl = 1;
                	@endphp
                    @foreach ($assignedDeliveryMen as $assignedDeliveryMan)
                		<tr class="row_{{ $assignedDeliveryMan->id }}">
                			<td>{{ $sl++ }}</td>
                            <td>{{ date('d-m-Y', strtotime($assignedDeliveryMan->date)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($assignedDeliveryMan->delivery_date)) }}</td>
                            <td>{{ $assignedDeliveryMan->order_no }}</td>
                            <td>{{ $assignedDeliveryMan->receiver_name }}</td>
                            <td>{{ $assignedDeliveryMan->receiver_phone }}</td>
                            <td>{{ $assignedDeliveryMan->receiver_address }}</td>
                            <td class="text-right">{{ $assignedDeliveryMan->hubName }}</td>
                            <td class="text-right">{{ $assignedDeliveryMan->areaName }}</td>
                            <td>{{ $assignedDeliveryMan->deliveryManName }}</td>
                			<td>
                                <button class="btn btn-outline-success btn-sm" onclick="reject({{ $assignedDeliveryMan->id }});">Reject</button>		
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
                url: "{{ route('assignedDeliveryMan.reject') }}",
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