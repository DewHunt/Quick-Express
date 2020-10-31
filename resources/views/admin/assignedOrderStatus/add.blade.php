@extends('admin.layouts.master')

@section('custom_css')
    <style type="text/css">
        .jumbotron {
            padding: 1rem 2rem;
            margin-bottom: 2rem;
            background-color: white;
            border: 2px solid #e9ecef;
            border-radius: 0.3rem;
        }

        label {
            font-weight: bold;
        }

        .tableFixHead {
            overflow-y: auto;
            /*overflow-x: hidden;*/
            height: 380px;
            border: 1px solid #00c292;
        }
    </style>
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route($formLink) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="custom-card-header">
                        <div class="row">
                            <div class="col-md-6"><h4 class="custom-card-title">Assigned Order Status</h4></div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-outline-info btn-md" href="{{ route($goBackLink) }}">
                                    <i class="fa fa-arrow-circle-left"></i> Go Back
                                </a>
                                <button type="submit" class="btn btn-outline-info btn-md waves-effect buttonAddEdit" name="buttonAddEdit" value="Save">
                                    <i class="fa fa-save"></i> {{ $buttonName }}
                                </button>
                                <button type="reset" class="btn btn-outline-info btn-md waves-effect buttonAddEdit" name="buttonAddEdit" value="Save" onclick="reset()">
                                    <i class="fa fa-window-close"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
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

                            <div class="col-md-4">
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
                        </div>
                    </div>

                    <div class="custom-card-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a class="btn btn-outline-info btn-md" href="{{ route($goBackLink) }}">
                                    <i class="fa fa-arrow-circle-left"></i> Go Back
                                </a>
                                <button type="submit" class="btn btn-outline-info btn-md waves-effect buttonAddEdit" name="buttonAddEdit" value="Save">
                                    <i class="fa fa-save"></i> {{ $buttonName }}
                                </button>
                                <button type="reset" class="btn btn-outline-info btn-md waves-effect buttonAddEdit" name="buttonAddEdit" value="Save" onclick="reset()">
                                    <i class="fa fa-window-close"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="orderIdDiv"></div>

        <div style="padding-bottom: 15px;"></div>
    </form>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="tableFixHead">
                <table class="table table-bordered table-md color-bordered-table success-bordered-table orderInfo">
                    <thead>
                        <tr>
                            <th rowspan="2" width="100px" style="vertical-align: middle; text-align: center;">Date</th>
                            <th rowspan="2" width="130px" style="vertical-align: middle; text-align: center;">Order No.</th>
                            <th rowspan="2" width="120px" style="vertical-align: middle; text-align: center;">Name</th>
                            <th rowspan="2" width="100px" style="vertical-align: middle; text-align: center;">Phone</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Amount</th>
                            <th rowspan="2" width="150px" style="vertical-align: middle; text-align: center;">Remarks</th>
                            <th rowspan="2" width="130px" style="vertical-align: middle; text-align: center;">Status</th>
                            <th rowspan="2" width="30px" style="vertical-align: middle; text-align: center;"></th>
                        </tr>
                        <tr>
                            <th width="80px" style="vertical-align: middle; text-align: center;">Bill</th>
                            <th width="150px" style="vertical-align: middle; text-align: center;">Receive / Return</th>
                        </tr>
                    </thead>

                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $("#formAddEdit").submit(function(e) {
            if($('.selectAllColumn').is(':checked'))
            {
                return true;
            }
            else
            {
                swal("Please! Select Order", "", "warning");
                return false;
            }

        });

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
                data:{hubId:hubId,orderStatus:'Yes'},
                success:function(data){
                    $('.orderInfoRow').remove();
                    var allOrders = data.allOrders;

                    appendOrderInfo(allOrders);
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
                    data:{hubId:hubId,areaId:areaId,orderStatus:'Yes'},
                    success:function(data){
                        $('.orderInfoRow').remove();
                        var allOrders = data.allOrders;

                        appendOrderInfo(allOrders);
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
                    data:{deliveryManId:deliveryManId,orderStatus:'Yes'},
                    success:function(data){
                        $('.orderInfoRow').remove();
                        var allOrders = data.allOrders;

                        appendOrderInfo(allOrders);
                    }
                });
            }

        });

        function appendOrderInfo(allOrders)
        {
            for (order of allOrders)
            {
                var total = parseFloat(order.cod_amount) + parseFloat(order.delivery_charge);
                $(".orderInfo tbody").append(
                    '<tr class="orderInfoRow" id="orderInfoRow_'+order.id+'">'+
                        '<td>'+
                            order.date+
                        '</td>'+
                        '<td align="left">'+
                            order.order_no+
                            '<input type="hidden" style="text-align: right;" class="orderId" id="orderId_'+order.id+'" value="'+order.id+'">'+
                        '</td>'+
                        '<td align="left">'+order.receiver_name+'</td>'+
                        '<td align="left">'+order.receiver_phone+'</td>'+
                        '<td align="right">'+
                            total+
                            '<input type="hidden" style="text-align: right;" class="form-control billAmount" id="billAmount_'+order.id+'" value="'+total+'">'+
                        '</td>'+
                        '<td align="right">'+
                            '<input type="number" min="1" style="text-align: right;" class="form-control receieveAmount" id="receieveAmount_'+order.id+'" value="0" oninput="getRecieveNumber('+order.id+')" readonly required>'+
                        '</td>'+
                        '<td align="right">'+
                            // '<input type="text" style="text-align: right;" class="form-control remarks" id="remarks_'+order.id+'" value="">'+
                            '<textarea class="form-control remarks" id="remarks_'+order.id+'" rows="2" oninput="getRemarks('+order.id+')"></textarea>'+
                        '</td>'+
                        '<td>'+
                            '<select class="form-control chosen-select orderStaus" id="orderStaus_'+order.id+'" onchange="getOrderInfoByStatus('+order.id+')">'+
                                '<option value="Pending">Pending</option>'+
                                '<option value="Delivered">Delivered</option>'+
                                '<option value="Return">Return</option>'+
                            '</select>'+
                        '</td>'+
                        '<td align="center">'+
                            '<input type="checkbox" class="check selectAllColumn" id="orderCheck_'+order.id+'" value="'+order.id+'" data-checkbox="icheckbox_square-red" onclick="getOrderInfo('+order.id+')">'+
                            '<label for="minimal-checkbox-'+order.id+'"></label>'+
                        '</td>'+
                    '</tr>'
                );
            }
        }

        function getOrderInfoByStatus(bookingOrderId)
        {
            var orderStatus = $('#orderStaus_'+bookingOrderId).val();

            if (orderStatus == "Pending") {
                $('#receieveAmount_'+bookingOrderId).prop('readonly',true);
                $('#receieveAmount_'+bookingOrderId).val(0);
            }
            else {
                $('#receieveAmount_'+bookingOrderId).prop('readonly',false);
            }

            $('#bookingOrderId_'+bookingOrderId).remove();
            $('#bookingOrderStatus_'+bookingOrderId).remove();
            $('#bookingOrderRecieveAmount_'+bookingOrderId).remove();
            $('#bookingOrderRemarks_'+bookingOrderId).remove();

            $('#orderCheck_'+bookingOrderId).prop('checked', true);
            getOrderInfo(bookingOrderId);
        }

        function getOrderInfo(bookingOrderId)
        {
            if ($('#orderCheck_'+bookingOrderId).is(":checked"))
            {
                var orderStatus = $('#orderStaus_'+bookingOrderId).val();
                var recieveAmount = $('#receieveAmount_'+bookingOrderId).val();
                var remarks = $('#remarks_'+bookingOrderId).val();

                $("#orderIdDiv").append(
                    '<input type="hidden" class="bookingOrderId" id="bookingOrderId_'+bookingOrderId+'" value="'+bookingOrderId+'" name="orderId[]">'+
                    '<input type="hidden" class="bookingOrderStatus" id="bookingOrderStatus_'+bookingOrderId+'" value="'+orderStatus+'" name="orderStatus[]">'+
                    '<input type="hidden" class="bookingOrderRecieveAmount" id="bookingOrderRecieveAmount_'+bookingOrderId+'" value="'+recieveAmount+'" name="recieveAmount[]">'+
                    '<input type="hidden" class="bookingOrderRemarks" id="bookingOrderRemarks_'+bookingOrderId+'" value="'+remarks+'" name="remarks[]">'
                );
            }
            else
            {
                $('#bookingOrderId_'+bookingOrderId).remove();
                $('#bookingOrderStatus_'+bookingOrderId).remove();
                $('#bookingOrderRecieveAmount_'+bookingOrderId).remove();
                $('#bookingOrderRemarks_'+bookingOrderId).remove();
            }
        }

        function getRecieveNumber(bookingOrderId) {
            var receieveAmount = parseFloat($('#receieveAmount_'+bookingOrderId).val());

            if (receieveAmount < 0) {
                $('#receieveAmount_'+bookingOrderId).val(0)
                recieveAmount = 0;
            }
            else {
                recieveAmount = 0;
            }

            $('#bookingOrderRecieveAmount_'+bookingOrderId).val(receieveAmount);
        }

        function getRemarks(bookingOrderId) {
            var remarks = $('#remarks_'+bookingOrderId).val();

            $('#bookingOrderRemarks_'+bookingOrderId).val(remarks);
        }
    </script>
@endsection