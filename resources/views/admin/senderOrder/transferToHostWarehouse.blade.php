@extends('admin.layouts.master')

@section('content')
    <form class="form-horizontal" action="{{ route($formLink) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
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
		                <label for="warehouses">Warehouses</label>
		                <div class="form-group {{ $errors->has('warehouseId') ? ' has-danger' : '' }}">
		                    <select class="form-control chosen-select warehouse" id="warehouse" name="warehouseId">
		                        <option value="">Select Warehouse</option>
		                        @foreach ($warehouses as $warehouse)
		                        	@php
		                        		if ($warehouse->id == $bookingOrder->host_warehouse_id)
		                        		{
		                        			$select = "selected";
		                        		}
		                        		else
		                        		{
		                        			$select = "";
		                        		}
		                        		
		                        	@endphp
		                            <option value="{{ $warehouse->id }}" {{ $select }}>{{ $warehouse->name }}</option>
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
		        	<div class="col-md-12" id="warehouseInfo">
		        		@if ($warehouseInfo)
			        		<table class="table table-borderless table-striped">
			        			<thead class="thead-dark">
			        				<tr>
			        					<th colspan="3">Delivery Man Info</th>
			        				</tr>
			        			</thead>
			        			<tbody>
			        				<tr>
			        					<td style="font-weight: bold;" width="120px">Name</td>
			        					<td style="font-weight: bold;" width="10px">:</td>
			        					<td>{{ $warehouseInfo->name }}</td>
			        				</tr>

			        				<tr>
			        					<td style="font-weight: bold;" width="120px">Contact Person</td>
			        					<td style="font-weight: bold;" width="10px">:</td>
			        					<td>{{ $warehouseInfo->contact_person }}</td>
			        				</tr>

			        				<tr>
			        					<td style="font-weight: bold;" width="120px">Phone</td>
			        					<td style="font-weight: bold;" width="10px">:</td>
			        					<td>{{ $warehouseInfo->phone }}</td>
			        				</tr>

			        				<tr>
			        					<td style="font-weight: bold;" width="120px">Email</td>
			        					<td style="font-weight: bold;" width="10px">:</td>
			        					<td>{{ $warehouseInfo->email }}</td>
			        				</tr>

			        				<tr>
			        					<td style="font-weight: bold;" width="120px">Address</td>
			        					<td style="font-weight: bold;" width="10px">:</td>
			        					<td>{{ $warehouseInfo->address }}</td>
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
        $(document).on('change', '#warehouse', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var warehouseId = $('#warehouse').val();

            if (warehouseId == "")
            {
                $('#warehouseInfo').html("");
            }
            else
            {
                $.ajax({
                    type:'post',
                    url:'{{ route('senderOrder.showWarehouseInfo') }}',
                    data:{warehouseId:warehouseId},
                    success:function(data){
                        $('#warehouseInfo').html(data);
                    }
                });
            }
        });
    </script>
@endsection