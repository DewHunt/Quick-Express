@extends('admin.layouts.master')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('custom-css')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
	<style type="text/css">
	    .nav-tabs .nav-link:not(:active) {
	       background: #7a7b7b;
	        color: #fff;
	    }

	    .top_card{
	    	height: 160px;
	    }

	    .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
	       background: #00c292;
	        color: #fff;
	    }

	    .first_block_title p{
	    	color: #00c292;
		    text-transform: uppercase;
		    font-weight: bold;
		    margin-bottom: 0px;
		    margin-top: 7px;
		    font-size: 12px;
	    }

	    .first_block_title .col-md-2 h3,.second_block_title .col-md-2 h3,.third_block_title .col-md-2 h3,.fourth_block_title .col-md-2 h3{
	    	height: 17px;
	    	text-align: center;
	    }

	    .first_block_title a{
	    	color: #00c292;
    		font-size: 16px;
	    }

	    .second_block_title p{
	    	color: #1f9a11;
		    text-transform: uppercase;
		    font-weight: bold;
		    margin-bottom: 0px;
		    margin-top: 7px;
		    font-size: 12px;
	    }

	    .second_block_title a{
	    	color: #1f9a11;
    		font-size: 16px;
	    }

	    .third_block_title p{
	    	color: #089faf;
		    text-transform: uppercase;
		    font-weight: bold;
		    margin-bottom: 0px;
		    margin-top: 7px;
		    font-size: 12px;
	    }

	    .third_block_title a{
	    	color: #089faf;
    		font-size: 16px;
	    }

	    .fourth_block_title p{
	    	color: #2329ea;
		    text-transform: uppercase;
		    font-weight: bold;
		    margin-bottom: 0px;
		    margin-top: 7px;
		    font-size: 12px;
	    }

	    .fourth_block_title a{
	    	color: #2329ea;
    		font-size: 16px;
	    }

	</style>

	<div class="row">
		<div class="col-lg-3">
			<div class="card top_card">
		        <div class="card-body">
		        	<div class="row">
		        		<div class="col-md-6">
		        			<h3>
			        			<a style="font-size: unset;color: unset;">
			        				<i class="fa fa-plus"></i>
			        			</a>
			        		</h3>
		        		</div>

		        		<div class="col-md-6">
		        			<h5 class="text-right" style="font-weight: bold;">New</h5>
		        		</div>
		        		
		        	</div>
		            <div class="row first_block_title">
		                <div class="col-md-10">
		                    <div class="d-flex no-block align-items-center">
		                        <div>
		                            <a href="{{ route('goodsCollection.index') }}" style="font-size: unset;">
		                            	<p>Collection</p>
		                            </a>

		                            <a href="{{ route('goodsDelivery.index') }}" style="font-size: unset;">
		                            	<p>Delivery</p>
		                            </a>

		                            <a style="font-size: unset;">
		                            	<p>Total</p>
		                            </a>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-2">
		                	<div class="d-flex no-block align-items-center">
		                        <div class="ml-auto">
		                            <h3 class="counter text-primary"><a href="javascript:void(0)">{{count($new_collection_list)}}</a></h3>
		                            <h3 class="counter text-primary"><a href="javascript:void(0)">{{count($new_delivery_list)}}</a></h3>
		                            <h3 class="counter text-primary">
		                            	<a href="javascript:void(0)">
				                            {{count($new_collection_list) + count($new_delivery_list)}}
				                        </a>
			                        </h3>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="col-lg-3">
			<div class="card top_card">
		        <div class="card-body">
		        	<div class="row">
		        		<div class="col-md-6">
		        			<h3>
			        			<a style="font-size: unset;color: unset;">
			        				<i class="fa fa-plus"></i>
			        			</a>
			        		</h3>
		        		</div>

		        		<div class="col-md-6">
		        			<h5 class="text-right" style="font-weight: bold;">Complete</h5>
		        		</div>
		        		
		        	</div>

		            <div class="row third_block_title">
		                <div class="col-md-10">
		                    <div class="d-flex no-block align-items-center">
		                        <div>
		                            <a href="{{ route('goodsCollection.index') }}" style="font-size: unset;">
		                            	<p>Collection</p>
		                            </a>

		                            <a href="{{ route('goodsDelivery.index') }}" style="font-size: unset;">
		                            	<p>Delivery</p>
		                            </a>

		                            <a style="font-size: unset;">
		                            	<p>Total</p>
		                            </a>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-2">
		                	<div class="d-flex no-block align-items-center">
		                        <div class="ml-auto">
		                            <h3 class="counter text-primary">
		                            	<a href="javascript:void(0)">
			                            	{{count($complete_collection_list)}}
			                            </a>
			                        </h3>
		                            <h3 class="counter text-primary"><a href="javascript:void(0)">{{count($complete_delivery_list)}}</a></h3>
		                            <h3 class="counter text-primary">
		                            	<a href="javascript:void(0)">
				                            {{count($complete_collection_list) + count($complete_delivery_list)}}
				                        </a>
			                        </h3>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="col-lg-3">
			<div class="card top_card">
		        <div class="card-body">
		        	<div class="row">
		        		<div class="col-md-6">
		        			<h3>
			        			<a style="font-size: unset;color: unset;">
			        				<i class="fa fa-plus"></i>
			        			</a>
			        		</h3>
		        		</div>

		        		<div class="col-md-6">
		        			<h5 class="text-right" style="font-weight: bold;">Return</h5>
		        		</div>
		        		
		        	</div>

		            <div class="row second_block_title">
		                <div class="col-md-10">
		                    <div class="d-flex no-block align-items-center">
		                        <div>
		                            <a href="{{ route('goodsCollection.index') }}" style="font-size: unset;">
		                            	<p>Collection</p>
		                            </a>

		                            <a href="{{ route('goodsDelivery.index') }}" style="font-size: unset;">
		                            	<p>Delivery</p>
		                            </a>

		                            <a style="font-size: unset;">
		                            	<p>Total</p>
		                            </a>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-2">
		                	<div class="d-flex no-block align-items-center">
		                        <div class="ml-auto">
		                            <h3 class="counter text-primary"><a href="javascript:void(0)">0</a></h3>
		                            <h3 class="counter text-primary"><a href="javascript:void(0)">0</a></h3>
		                            <h3 class="counter text-primary">
		                            	<a href="javascript:void(0)">
				                            0
				                        </a>
			                        </h3>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="col-lg-3">
			<div class="card top_card">
		        <div class="card-body">
		        	<div class="row">
		        		<div class="col-md-6">
		        			<h3>
			        			<a style="font-size: unset;color: unset;">
			        				<i class="fa fa-plus"></i>
			        			</a>
			        		</h3>
		        		</div>

		        		<div class="col-md-6">
		        			<h5 class="text-right" style="font-weight: bold;">Amount</h5>
		        		</div>
		        		
		        	</div>
		            <div class="row fourth_block_title">
		                <div class="col-md-10">
		                    <div class="d-flex no-block align-items-center">
		                        <div>
		                            <p>Received</p>
		                            <p>Due</p>
		                            <p>Total</p>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-2">
		                	<div class="d-flex no-block align-items-center">
		                        <div class="ml-auto">
		                            <h3 class="counter text-primary">
		                            	<a href="javascript:void(0)">
		                            		{{$received_collection_amount + $received_delivery_amount}}
		                            	</a>
		                            </h3>
		                            <h3 class="counter text-primary">
			                            <a href="javascript:void(0)">
			                            	{{$due_collection_amount + $due_delivery_amount}}
			                            </a>
			                        </h3>

			                        <h3 class="counter text-primary">
			                            <a href="javascript:void(0)">
			                            	{{$received_collection_amount + $received_delivery_amount + $due_collection_amount + $due_delivery_amount}}
			                            </a>
			                        </h3>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>

	<br>
    
	{{-- <div class="card">
		<div class="card-body">
	        <div class="row">
	            <div class="col-lg-12 ">
	              <nav>
	                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
	                  <a class="nav-item nav-link active" id="nav-new-order-tab" data-toggle="tab" href="javascript:void(0)#nav-new-order" role="tab" aria-controls="nav-new-order" aria-selected="true">New Order</a>

	                  <a class="nav-item nav-link" id="nav-running-order-tab" data-toggle="tab" href="javascript:void(0)#nav-running-order" role="tab" aria-controls="nav-running-order" aria-selected="false">Running Order</a>

	                  <a class="nav-item nav-link" id="nav-complete-order-tab" data-toggle="tab" href="javascript:void(0)#nav-complete-order" role="tab" aria-controls="nav-complete-order" aria-selected="false">Complete Order</a>
	                </div>
	              </nav>

	              <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
	                <div class="tab-pane fade show active" id="nav-new-order" role="tabpanel" aria-labelledby="nav-new-order-tab">
	                    <div class="table-responsive">
	                        @php
	                            $sl = 0;
	                        @endphp

	                        <table class="table table-bordered table-striped dataTable" width="100%">
	                            <thead>
	                                <tr style="background: #00c292; text-align: center;">
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="10px">SL</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="80px">Date</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="130px">Order No</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" colspan="3">Receiver</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="140px">Delivery Type</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="50px">Charge</th>
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
				                    @foreach ($new_collection_list as $new_order)
				                		<tr class="row_{{ $new_order->id }}">
				                			<td>{{ $sl++ }}</td>
				                			<td>{{ date('d-m-Y', strtotime($new_order->date)) }}</td>
				                            <td>{{ $new_order->order_no }}</td>
				                            <td>{{ $new_order->receiver_name }}</td>
				                            <td>{{ $new_order->receiver_phone }}</td>
				                            <td>{{ $new_order->receiver_address }}</td>
				                            <td>{{ $new_order->deliveryTypeName }}</td>
				                			<td>{{ $new_order->delivery_charge }}</td>
				                		</tr>
				                	@endforeach
	                            </tbody>
	                        </table>
	                    </div>
	                </div>

	                <div class="tab-pane fade" id="nav-running-order" role="tabpanel" aria-labelledby="nav-running-order-tab">
	                    <div class="table-responsive">
	                        @php
	                            $sl = 0;
	                        @endphp

	                        <table class="table table-bordered table-striped dataTable" width="100%">
	                            <thead>
	                                <tr style="background: #00c292; text-align: center;">
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="10px">SL</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="80px">Date</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="130px">Order No</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" colspan="3">Receiver</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="100px">Delivery Type</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="50px">Charge</th>
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
				                    @foreach ($complete_collection_list as $running_order)
				                		<tr class="row_{{ $running_order->id }}">
				                			<td>{{ $sl++ }}</td>
				                			<td>{{ date('d-m-Y', strtotime($running_order->date)) }}</td>
				                            <td>{{ $running_order->order_no }}</td>
				                            <td>{{ $running_order->receiver_name }}</td>
				                            <td>{{ $running_order->receiver_phone }}</td>
				                            <td>{{ $running_order->receiver_address }}</td>
				                            <td>{{ $running_order->deliveryTypeName }}</td>
				                			<td>{{ $running_order->delivery_charge }}</td>
				                		</tr>
				                	@endforeach
	                            </tbody>
	                        </table>
	                    </div>
	                </div>

	                <div class="tab-pane fade" id="nav-complete-order" role="tabpanel" aria-labelledby="nav-complete-order-tab">
	                    <div class="table-responsive">
	                        @php
	                            $sl = 0;
	                        @endphp

	                        <table class="table table-bordered table-striped dataTable" width="100%">
	                            <thead>
	                                <tr style="background: #00c292; text-align: center;">
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="10px">SL</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="80px">Date</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="130px">Order No</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" colspan="3">Receiver</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="100px">Delivery Type</th>
	                                    <th style="font-weight: bold; vertical-align: middle;" rowspan="2" width="50px">Charge</th>
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
				                    @foreach ($complete_collection_list as $complete_order)
				                		<tr class="row_{{ $complete_order->id }}">
				                			<td>{{ $sl++ }}</td>
				                			<td>{{ date('d-m-Y', strtotime($complete_order->date)) }}</td>
				                            <td>{{ $complete_order->order_no }}</td>
				                            <td>{{ $complete_order->receiver_name }}</td>
				                            <td>{{ $complete_order->receiver_phone }}</td>
				                            <td>{{ $complete_order->receiver_address }}</td>
				                            <td>{{ $complete_order->deliveryTypeName }}</td>
				                			<td>{{ $complete_order->delivery_charge }}</td>
				                		</tr>
				                	@endforeach
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	              </div>
	            
	            </div>
	          </div>
	    </div>	
	</div> --}}
@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
        // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });

            var table = $('.dataTable').DataTable( {
                "order": [[0, "asc"]]
            } );

            table.on('order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
            
            // $('[data-toggle="tooltip"]').tooltip();
        });
                
    </script>
@endsection