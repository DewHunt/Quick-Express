@extends('frontend.customer.index') 

@section('customer_content')

	<div class="card-body">
		<div class="card-header">
		    <div class="row">
		        <div class="col-md-6">
		        	
		        </div>
		        <div class="col-md-6 text-right">
		            <a style="font-size: 16px;" class="btn btn-info" href="{{ route('user.bookingCreate') }}">
		                <i class="las la-plus-circle"></i> Create Booking
		            </a>                  
		        </div>
		    </div>
		</div>

        <div class="table-responsive">
            @php
                $sl = 0;
            @endphp
            <table id="dataTable" class="table table-bordered table-striped customer_table">
                <thead>
                    <tr>
                        <th rowspan="2" width="25px">SL</th>
                        <th rowspan="2" width="90px">Date</th>
                        <th colspan="3" class="text-center">Receiver</th>
                        <th rowspan="2" width="120px">Delivery Type</th>
                        <th rowspan="2" width="70px">Charge</th>
                        <th class="text-center" rowspan="2" width="120px">Action</th>
                    </tr>
                    <tr>
                        <th width="160px">Name</th>
                        <th width="80px">Phone</th>
                        <th width="150px">Address</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($bookingOrders as $bookingOrder)
                        <tr class="row_{{ $bookingOrder->id }}">
                            <td>{{ $sl++ }}</td>
                            <td>{{ date('d-m-Y', strtotime($bookingOrder->date)) }}</td>
                            <td>{{ $bookingOrder->receiver_name }}</td>
                            <td>{{ $bookingOrder->receiver_phone }}</td>
                            <td>{{ $bookingOrder->receiver_address }}</td>
                            <td>{{ $bookingOrder->deliveryTypeName }}</td>
                            <td>{{ $bookingOrder->delivery_charge }}</td>
                            <td>
                                <a href="{{ route('user.bookingView',$bookingOrder->id) }}" class="edit_link"><i class="la la-eye"></i> View</a>                               
                                <a href="{{ route('user.bookingEdit',$bookingOrder->id) }}" class="edit_link"><i class="la la-edit"></i> Edit</a>                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>	
@endsection