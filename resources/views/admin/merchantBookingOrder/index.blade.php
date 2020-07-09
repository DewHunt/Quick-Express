@extends('admin.layouts.masterIndex')

@section('card_body')
    <div class="card-body">
        {{-- <div align='center'>
            <font size='7' text-align='center' color='green' face='Comic sans MS'>This Page Is Now Under Construction</font>
        </div> --}}

        <div class="table-responsive">
            @php
                $sl = 0;
            @endphp

            <table id="dataTable" class="table table-bordered table-striped" width="100%" name="areaTable">
                <thead>
                    <tr style="background: #00c292; text-align: center;">
                        <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="10px">SL</th>
                        <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="80px">Date</th>
                        <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="130px">Order No</th>
                        <th style="font-weight: bold; vertical-align: middle;" colspan="3">Receiver</th>
                        <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="100px">Delivery Type</th>
                        <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="50px">Charge</th>
                        <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="60px">Status</th>
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
                    @foreach ($bookingOrders as $bookingOrder)
                		<tr class="row_{{ $bookingOrder->id }}">
                			<td>{{ $sl++ }}</td>
                			<td>{{ date('d-m-Y', strtotime($bookingOrder->date)) }}</td>
                            <td>{{ $bookingOrder->order_no }}</td>
                            <td>{{ $bookingOrder->receiver_name }}</td>
                            <td>{{ $bookingOrder->receiver_phone }}</td>
                            <td>{{ $bookingOrder->receiver_address }}</td>
                            <td>{{ $bookingOrder->deliveryTypeName }}</td>
                			<td>{{ $bookingOrder->delivery_charge }}</td>
                			<td>
                                @php
                                    echo \App\Link::status($bookingOrder->id,$bookingOrder->status);
                                @endphp
                			</td>
                			<td>
                    			@php
                    				echo \App\Link::action($bookingOrder->id);
                    			@endphp                				
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
        $(document).ready(function() {
            var updateThis ;       

            //ajax delete code
            $('#dataTable tbody').on( 'click', 'i.fa-trash', function () {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                merchantBookingOrderId = $(this).parent().data('id');
                var tableRow = this;
                swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this information!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    cancelButtonText: "No, cancel plx!",   
                    closeOnConfirm: false,   
                    closeOnCancel: false 
                },
                function(isConfirm){   
                    if (isConfirm) {
                        $.ajax({
                            type: "POST",
                            url : "{{ route('merchantBookingOrder.delete') }}",
                            data : {merchantBookingOrderId:merchantBookingOrderId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+merchantBookingOrderId).remove();
                            },
                            error: function(response) {
                                error = "Failed.";
                                swal({
                                    title: "<small class='text-danger'>Error!</small>", 
                                    type: "error",
                                    text: error,
                                    timer: 1000,
                                    html: true,
                                });
                            }
                        });    
                    }
                    else
                    { 
                        swal({
                            title: "Cancelled", 
                            type: "error",
                            text: "This Data Is Safe :)",
                            timer: 1000,
                            html: true,
                        });    
                    } 
                });
            });
        });
                
        //ajax status change code
        function statusChange(merchantBookingOrderId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('merchantBookingOrder.status') }}",
                data: {merchantBookingOrderId:merchantBookingOrderId},
                success: function(response) {
                    swal({
                        title: "<small class='text-success'>Success!</small>", 
                        type: "success",
                        text: "Status Successfully Updated!",
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