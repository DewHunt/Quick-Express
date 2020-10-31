@extends('admin.layouts.masterIndex')

@section('card_body')
    <div class="card-body">
        <form class="form-horizontal" action="{{ route('assignedOrderStatus.index') }}" id="search" method="POST" enctype="multipart/form-data" name="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <label for="hubs">Hubs</label>
                    <div class="form-group {{ $errors->has('hubId') ? ' has-danger' : '' }}">
                        <select class="form-control select2 hubId" id="hubId" name="hubId">
                            <option value="">Select Hub</option>
                            @foreach ($hubs as $hub)
                                <option value="{{ $hub->id }}">{{ $hub->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="areas">Areas</label>
                    <div class="form-group">
                        <div class="form-group" id="area-select-menu">
                            <select class="form-control select2 select2-multiple areaId" id="areaId" name="areaId" multiple>
                                <option value="">Select Area</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="delivery-men">Delivery Men</label>
                    <div class="form-group {{ $errors->has('deliveryManId') ? ' has-danger' : '' }}">
                        <select class="form-control select2 deliveryManId" id="deliveryManId" name="deliveryManId">
                            <option value="">Select Delivery Man</option>
                            @foreach ($deliveryMen as $deliveryMan)
                                <option value="{{ $deliveryMan->id }}">{{ $deliveryMan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-1">
                    <label for=""></label>
                    <div class="form-group {{ $errors->has('deliveryManId') ? ' has-danger' : '' }}">
                        <button type="submit" class="btn btn-outline-info btn-md waves-effect buttonSearch" name="buttonSearch" value="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            @php $sl = 0; @endphp

            <table id="dataTable" class="table table-bordered table-striped orderInfo" width="100%" name="areaTable">
                <thead>
                    <tr>
                        <th width="20px">SL</th>
                        <th width="90px">Order Date</th>
                        <th width="100px">Delivery Date</th>
                        <th width="100px">Order No</th>
                        <th width="150px">Hub Name</th>
                        <th width="150px">Area Name</th>
                        <th width="150px">Delivery Man Name</th>
                        <th width="90px">Order Status</th>
                        <th width="50px">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                		$sl = 1;
                	@endphp
                    @foreach ($allAssignedOrderStatus as $orderStatus)
                		<tr class="orderInfoRow row_{{ $orderStatus->id }}">
                			<td>{{ $sl++ }}</td>
                            <td>{{ date('d-m-Y', strtotime($orderStatus->date)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($orderStatus->delivery_date)) }}</td>
                            <td>{{ $orderStatus->order_no }}</td>
                            <td>{{ $orderStatus->hubName }}</td>
                            <td>{{ $orderStatus->areaName }}</td>
                            <td>{{ $orderStatus->deliveryManName }}</td>
                            <td>{{ $orderStatus->order_status == null ? 'No Status' : $orderStatus->order_status }}</td>
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
        $(document).on('change', '#hubId', function(){                
            var hubId = $('#hubId').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('assignedOrderStatus.getAllAreas') }}',
                data:{hubId:hubId},
                success:function(data){
                    $('#area-select-menu').html(data);
                    $(".select2").select2();
                }
            });

            hubWiseOrder(hubId);
        });

        function hubWiseOrder(hubId)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('assignedOrderStatus.hubWiseOrder') }}',
                data:{hubId:hubId},
                success:function(data){
                    var allOrders = data.allOrders;
                }
            });            
        }

        $(document).on('change', '#areaId', function(){                
            var hubId = $('#hubId').val();
            var areaId = $('#areaId').val();

            if (areaId == "")
            {
                hubWiseOrder(hubId);
            }
            else
            {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'post',
                    url:'{{ route('assignedOrderStatus.areaWiseOrder') }}',
                    data:{hubId:hubId,areaId:areaId},
                    success:function(data){
                        var allOrders = data.allOrders;
                    }
                });
            }

        });

        $(document).on('change', '#deliveryManId', function(){
            var deliveryManId = $('#deliveryManId').val();
            var areaId = $('#areaId').val();
            var hubId = $('#hubId').val();

            if (deliveryManId == "")
            {
                if (areaId == "")
                {
                    $('.orderInfoRow').remove();                    
                }
                else
                {
                    if (hubId == "")
                    {
                        $('.orderInfoRow').remove();
                    }
                    else
                    {
                        hubWiseOrder(hubId);
                    }
                }
            }
            else
            {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'post',
                    url:'{{ route('assignedOrderStatus.deliveryManWiseOrder') }}',
                    data:{deliveryManId:deliveryManId},
                    success:function(data){
                        var allOrders = data.allOrders;
                    }
                });
            }

        });

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