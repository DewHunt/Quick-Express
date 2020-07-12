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

	    .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
	       background: #00c292;
	        color: #fff;
	    }

	</style>
	<div class="card">
		<div class="card-body">
	        {{-- <div align='center'>
	            <font size='7' text-align='center' color='green' face='Comic sans MS'>This Page Is Now Under Construction</font>
	        </div> --}}
	        <div class="row">
	            <div class="col-lg-12 ">
	              <nav>
	                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
	                  <a class="nav-item nav-link active" id="nav-new-order-tab" data-toggle="tab" href="#nav-new-order" role="tab" aria-controls="nav-new-order" aria-selected="true">New Order</a>

	                  <a class="nav-item nav-link" id="nav-running-order-tab" data-toggle="tab" href="#nav-running-order" role="tab" aria-controls="nav-running-order" aria-selected="false">Running Order</a>

	                  <a class="nav-item nav-link" id="nav-complete-order-tab" data-toggle="tab" href="#nav-complete-order" role="tab" aria-controls="nav-complete-order" aria-selected="false">Complete Order</a>
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
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	              </div>
	            
	            </div>
	          </div>
	    </div>	
	</div>
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