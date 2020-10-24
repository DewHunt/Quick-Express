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
            height: 380px;
            /*border: 1px solid #00c292;*/
        }

        .tableFixHead thead th {
            position: sticky;
            top: 0;
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
                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <label for="areas">Areas</label>
                                <div class="form-group">
                                    <div class="form-group" id="area-select-menu">
                                        <select class="form-control select2 select2-multiple areaId" id="areaId" name="areaId" multiple>
                                            <option value="">Select Area</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
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

                            <div class="col-md-3">
                                <label for="total-cod-amount">Total COD</label>
                                <div class="form-group {{ $errors->has('totalCodAmount') ? ' has-danger' : '' }}">
                                    <input type="text" class="form-control" id="totalCodAmount" name="totalCodAmount" value="0" required readonly/>
                                    @if ($errors->has('totalCodAmount'))
                                        @foreach($errors->get('totalCodAmount') as $error)
                                            <div class="form-control-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="total-delivery-charge">Total Charge</label>
                                <div class="form-group {{ $errors->has('totalCharge') ? ' has-danger' : '' }}">
                                    <input type="text" class="form-control" id="totalCharge" name="totalCharge" value="0" required readonly/>
                                    @if ($errors->has('totalCharge'))
                                        @foreach($errors->get('totalCharge') as $error)
                                            <div class="form-control-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
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

    <input type="hidden" id="previousOrderId" value="">

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="tableFixHead">
                <table class="table table-bordered table-md color-bordered-table success-bordered-table orderInfo">
                    <thead>
                        <tr>
                            <th width="100px">Date</th>
                            <th width="130px">Order No.</th>
                            <th width="150px">Name</th>
                            <th width="100px">Phone</th>
                            <th>Address</th>
                            <th width="80px">Amount</th>
                            <th width="80px">Charge</th>
                            <th width="80px" style="text-align: right;">Total</th>
                            <th width="130px">Status</th>
                            <th width="30px" style="text-align: center;"></th>
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
                    data:{hubId:hubId,areaId:areaId},
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
                    data:{deliveryManId:deliveryManId},
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
                        '<td align="left">'+order.receiver_address+'</td>'+
                        '<td align="right">'+
                            order.cod_amount+
                            '<input type="hidden" style="text-align: right;" class="codAmount" id="codAmount_'+order.id+'" value="'+order.cod_amount+'">'+
                        '</td>'+
                        '<td align="right">'+
                            order.delivery_charge+
                            '<input type="hidden" style="text-align: right;" class="charge" id="charge_'+order.id+'" value="'+order.delivery_charge+'">'+
                        '</td>'+
                        '<td align="right">'+total+'</td>'+
                        '<td>'+
                            '<select class="form-control chosen-select orderStaus" id="orderStaus_'+order.id+'" onchange="getTotalByStatus('+order.id+')">'+
                                '<option value="Pending">Pending</option>'+
                                '<option value="Delivered">Delivered</option>'+
                                '<option value="Return">Return</option>'+
                            '</select>'+
                        '</td>'+
                        '<td align="center">'+
                            '<input type="checkbox" class="check selectAllColumn" id="orderCheck_'+order.id+'" value="'+order.id+'" data-checkbox="icheckbox_square-red" onclick="getTotal('+order.id+')">'+
                            '<label for="minimal-checkbox-'+order.id+'"></label>'+
                        '</td>'+
                    '</tr>'
                );
            }
        }

        function getTotalByStatus(bookingOrderId)
        {
            $('#bookingOrderId_'+bookingOrderId).remove();
            $('#bookingOrderStatus_'+bookingOrderId).remove();

            // var previousOrderId = $('#previousOrderId').val();

            // if (previousOrderId != bookingOrderId) {
            //     var totalCodAmount = parseInt($('#totalCodAmount').val());
            //     var totalCharge = parseInt($('#totalCharge').val());

            //     var codAmount = parseInt($('#codAmount_'+bookingOrderId).val());
            //     var charge = parseInt($('#charge_'+bookingOrderId).val());

            //     if (totalCodAmount != 0 && totalCharge != 0) {                
            //         totalCodAmount = totalCodAmount - codAmount;
            //         totalCharge = totalCharge - charge;

            //         $('#totalCodAmount').val(totalCodAmount);
            //         $('#totalCharge').val(totalCharge);
            //     }
            //     alert(totalCodAmount);
            //     $('#previousOrderId').val(previousOrderId)
            // }

            $('#orderCheck_'+bookingOrderId).prop('checked', true);
            getTotal(bookingOrderId);
        }

        function getTotal(bookingOrderId)
        {
            var codAmount = parseInt($('#codAmount_'+bookingOrderId).val());
            var charge = parseInt($('#charge_'+bookingOrderId).val());

            var totalCodAmount = parseInt($('#totalCodAmount').val());
            var totalCharge = parseInt($('#totalCharge').val());

            if ($('#orderCheck_'+bookingOrderId).is(":checked"))
            {
                totalCodAmount = totalCodAmount + codAmount;
                totalCharge = totalCharge + charge;

                $('#totalCodAmount').val(totalCodAmount);
                $('#totalCharge').val(totalCharge);

                var orderStatus = $('#orderStaus_'+bookingOrderId).val();

                $("#orderIdDiv").append(
                    '<input type="hidden" class="bookingOrderId" id="bookingOrderId_'+bookingOrderId+'" value="'+bookingOrderId+'" name="orderId[]">'+
                    '<input type="hidden" class="bookingOrderStatus" id="bookingOrderStatus_'+bookingOrderId+'" value="'+orderStatus+'" name="orderStatus[]">'
                );
            }
            else
            {
                totalCodAmount = totalCodAmount - codAmount;
                totalCharge = totalCharge - charge;

                $('#totalCodAmount').val(totalCodAmount);
                $('#totalCharge').val(totalCharge);
                $('#bookingOrderId_'+bookingOrderId).remove();
                $('#bookingOrderStatus_'+bookingOrderId).remove();
            }
        }
    </script>
@endsection