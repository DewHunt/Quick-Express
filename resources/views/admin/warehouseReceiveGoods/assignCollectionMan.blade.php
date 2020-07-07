@extends('admin.layouts.master')

@section('content')
    <form class="form-horizontal" action="{{ route('senderOrder.saveAssignedCollectionMan') }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
    	{{ csrf_field() }}

	    <div class="card">
	        <div class="custom-card-header">
	            <div class="row">
	                <div class="col-md-6"><h4 class="custom-card-title">{{ $title }}</h4></div>
	                <div class="col-md-6 text-right">
	                	<a class="btn btn-outline-info btn-lg" href="{{ route('senderOrder.view',$senderOrderId) }}">
	                		<i class="fa fa-arrow-circle-left"></i> Go Back
	                	</a>
	                </div>
	            </div>
	        </div>
	
		    <div class="card-body">
		    	<div class="row">
		    		<div class="col-md-12">
		    			<input class="form-control" type="hidden" name="bookedOrderId" value="{{ $senderOrderId }}">
		    		</div>
		    	</div>

		        <div class="row">
		            <div class="col-md-10">
		                <label for="delivery-man-name">Delivery Man Name</label>
		                <div class="form-group {{ $errors->has('collectionManId') ? ' has-danger' : '' }}">
		                    <select class="form-control chosen-select deliveryMan" id="deliveryMan" name="collectionManId">
		                        <option value="">Select Delivery Man</option>
		                        @foreach ($deliveryMen as $deliveryMan)
		                        	@php
		                        		if ($deliveryMan->id == $bookingOrder->collection_man_id)
		                        		{
		                        			$select = "selected";
		                        		}
		                        		else
		                        		{
		                        			$select = "";
		                        		}
		                        		
		                        	@endphp
		                            <option value="{{ $deliveryMan->id }}" {{ $select }}>{{ $deliveryMan->name }}</option>
		                        @endforeach
		                    </select>
		                </div>
		            </div>

		            <div class="col-md-1">
		                <label for=""></label>
		                <div class="form-group">
	                		<button type="submit" class="btn btn-outline-info btn-md waves-effect buttonAddEdit" name="buttonAddEdit" value="Save"><i class="fa fa-save"></i> {{ $buttonName }}</button>
		                </div>
		            </div>
		        </div>

		        <div class="row">
		        	<div class="col-md-12" id="deliveryManInfo">
		        		@if ($deliveryManInfo)
			        		<table class="table table-borderless table-striped">
			        			<thead class="thead-dark">
			        				<tr>
			        					<th colspan="3">Delivery Man Info</th>
			        					<th width="150px">Image</th>
			        				</tr>
			        			</thead>
			        			<tbody>
			        				<tr>
			        					<td style="font-weight: bold;" width="100px">Name</td>
			        					<td style="font-weight: bold;" width="10px">:</td>
			        					<td>{{ $deliveryManInfo->name }}</td>
			        					<td style="text-align= center;" rowspan="5">
			        						<img src="{{ asset($deliveryManInfo->image) }}" width="150px" height="150px">
			        					</td>
			        				</tr>
			        				<tr>
			        					<td style="font-weight: bold;" width="100px">NID</td>
			        					<td style="font-weight: bold;" width="10px">:</td>
			        					<td>{{ $deliveryManInfo->nid }}</td>
			        				</tr>
			        				<tr>
			        					<td style="font-weight: bold;" width="100px">Phone</td>
			        					<td style="font-weight: bold;" width="10px">:</td>
			        					<td>{{ $deliveryManInfo->phone }}</td>
			        				</tr>
			        				<tr>
			        					<td style="font-weight: bold;" width="100px">Email</td>
			        					<td style="font-weight: bold;" width="10px">:</td>
			        					<td>{{ $deliveryManInfo->email }}</td>
			        				</tr>
			        				<tr>
			        					<td style="font-weight: bold;" width="100px">Address</td>
			        					<td style="font-weight: bold;" width="10px">:</td>
			        					<td>{{ $deliveryManInfo->address }}</td>
			        				</tr>
			        			</tbody>
			        		</table>
		        		@endif
		        	</div>
		        </div>
		    </div>
	    </div>
	</form>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $(document).on('change', '#deliveryMan', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var deliveryManId = $('#deliveryMan').val();

            if (deliveryManId == "")
            {
                $('#deliveryManInfo').html("");
            }
            else
            {
                $.ajax({
                    type:'post',
                    url:'{{ route('senderOrder.showDeliveryManInfo') }}',
                    data:{deliveryManId:deliveryManId},
                    success:function(data){
                        $('#deliveryManInfo').html(data);
                    }
                });
            }
        });
    </script>
@endsection