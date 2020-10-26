@extends('admin.layouts.master')

@section('custom_css')
    <style type="text/css">
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
        <div class="card">
            <div class="custom-card-header">
                <div class="row">
                    <div class="col-md-6"><h4 class="custom-card-title">Marchant Payment</h4></div>
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
                        <div class="row">
                            <div class="col-md-12">
                                <label for="marchant">Marchant</label>
                                <div class="form-group {{ $errors->has('merchant') ? ' has-danger' : '' }}">
                                    <select class="select2 form-control custom-select" id="merchant" name="merchant">
                                        <option value="">Select A Marchant</option>
                                        @foreach ($merchants as $merchant)
                                            <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="total-cod-amount">Total Balance</label>
                                <div class="form-group {{ $errors->has('totalBalance') ? ' has-danger' : '' }}">
                                    <input type="text" class="form-control" id="totalBalance" name="totalBalance" value="0" required readonly />
                                    <input type="hidden" class="form-control" id="totalBillAmount" name="totalBillAmount" value="0" required readonly />
                                    <input type="hidden" class="form-control" id="totalRecieveAmount" name="totalRecieveAmount" value="0" required readonly />
                                    <input type="hidden" class="form-control" id="totalDeliveryCharge" name="totalDeliveryCharge" value="0" required readonly />
                                    @if ($errors->has('totalBalance'))
                                        @foreach($errors->get('totalBalance') as $error)
                                            <div class="form-control-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="payment-date">Payment Date</label>
                                <div class="form-group">
                                    <input  type="text" class="form-control add_datepicker" id="paymentDate" name="paymentDate" placeholder="Select Payment Date" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="payment-type">Payment Type</label>
                                <div class="form-group {{ $errors->has('depositType') ? ' has-danger' : '' }}">
                                    @php
                                        $allDepositTypes = array("Cash Payment" => "Cash Payment","Bank Deposit" => "Bank Deposit","Bkash" => "Bkash","Nagad" => "Nagad","Rocket" => "Rocket",)
                                    @endphp
                                    <select class="select2 form-control custom-select" id="depositType" name="depositType">
                                        <option value="">Select Deposit Type</option>
                                        @foreach ($allDepositTypes as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="bank-account">Accoount No</label>
                                <div class="form-group {{ $errors->has('accountNo') ? ' has-danger' : '' }}">
                                    <input type="text" class="form-control" id="accountNo" name="accountNo" placeholder="Acconut No" value="{{ old('accountNo') }}" required/>
                                    @if ($errors->has('accountNo'))
                                        @foreach($errors->get('accountNo') as $error)
                                            <div class="form-control-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="remarks">Remarks</label>
                        <div class="form-group {{ $errors->has('remarks') ? ' has-danger' : '' }}">
                            <textarea class="form-control" id="remarks" name="remarks" rows="9">{{ old('remarks') }}</textarea>
                            @if ($errors->has('remarks'))
                                @foreach($errors->get('remarks') as $error)
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

        <div class="row">
            <div id="selectedOrders"></div>
        </div>
    </form>

    <div style="padding-bottom: 20px;"></div>

    <div class="row">
        <div class="col-12">
            <div class="tableFixHead">
                <table class="table table-bordered table-md color-bordered-table success-bordered-table orderInfo">
                    <thead>
                        <tr>
                            <th width="90px">Date</th>
                            <th width="130px">Order No.</th>
                            <th width="150px">Name</th>
                            <th width="100px">Phone</th>
                            <th>Address</th>
                            <th width="100px">Bill Amount</th>
                            <th width="120px">Recieve Amount</th>
                            <th width="120px">Service Charge</th>
                            <th width="70x">Balance</th>
                            <th width="30px" style="text-align: center;">
                                <input type="checkbox" class="select_all" name="select_all">
                            </th>
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

        $('.select_all').click(function(event){
            if(this.checked)
            {
                // Iterate each checkbox
                $(':checkbox').each(function(){
                    this.checked = true;

                    var totalBillAmount = 0;
                    var totalRecieveAmount = 0;
                    var totalDeliveryCharge = 0;
                    var totalBalance = 0;

                    $(".billAmount").each(function () {
                        var billAmount = parseFloat($(this).val());
                        // console.log(stval);
                        totalBillAmount += isNaN(billAmount) ? 0 : billAmount;
                    });

                    $(".recieveAmount").each(function () {
                        var recieveAmount = parseFloat($(this).val());
                        // console.log(stval);
                        totalRecieveAmount += isNaN(recieveAmount) ? 0 : recieveAmount;
                    });

                    $(".deliveryCharge").each(function () {
                        var deliveryCharge = parseFloat($(this).val());
                        // console.log(stval);
                        totalDeliveryCharge += isNaN(deliveryCharge) ? 0 : deliveryCharge;
                    });

                    $(".balance").each(function () {
                        var balance = parseFloat($(this).val());
                        // console.log(stval);
                        totalBalance += isNaN(balance) ? 0 : balance;
                    });

                    $(".bookingOrderId").each(function () {
                        var bookingOrderId = parseFloat($(this).val());
                        $('#block_'+bookingOrderId).remove();
                        getOrderInfo(bookingOrderId);
                    });

                    $('#totalBillAmount').val(totalBillAmount);
                    $('#totalRecieveAmount').val(totalRecieveAmount);
                    $('#totalDeliveryCharge').val(totalDeliveryCharge);
                    $('#totalBalance').val(totalBalance);
                });
            }
            else
            {
                $(':checkbox').each(function(){
                    this.checked = false;

                    $('#totalBillAmount').val(0);
                    $('#totalRecieveAmount').val(0);
                    $('#totalDeliveryCharge').val(0);
                    $('#totalBalance').val(0);

                    $(".bookingOrderId").each(function () {
                        var bookingOrderId = parseFloat($(this).val());
                        $('#block_'+bookingOrderId).remove();
                        getOrderInfo(bookingOrderId);
                    });
                });
            }
        });

        $(document).on('change', '#depositType', function()
        {            
            var depositType = $('#depositType').val();

            if (depositType == "Cash Payment")
            {
                $('#accountNo').prop('required',false);
                $('#accountNo').val("");
            }
            else
            {
                $('#accountNo').prop('required',true);
            }
        });

        $(document).on('change', '#merchant', function()
        {
            $('.block').remove();
            $('#totalCodAmount').val(0);
            $('#totalBalance').val(0);
            $('#remarks').val("");
            $('#balance').val(0);
            
            var merchant = $('#merchant').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('merchantPayment.getOrderInfo') }}',
                data:{merchant:merchant},
                success:function(data){
                    var orderInformations = data.orderInformations;
                    $('.orderInfoRow').remove();
                    for (var orderInformation of orderInformations)
                    {
                        var total = parseFloat(orderInformation.cod_amount) + parseFloat(orderInformation.delivery_charge);
                        var balance = orderInformation.recieve_amount - orderInformation.delivery_charge;
                        $(".orderInfo tbody").append(
                            '<tr class="orderInfoRow" id="orderInfoRow_'+orderInformation.id+'">'+
                                '<td>'+orderInformation.date+'</td>'+
                                '<td>'+
                                    orderInformation.order_no+
                                    '<input type="hidden" class="orderNo_'+orderInformation.id+'" id="orderNo_'+orderInformation.id+'" value="'+orderInformation.order_no+'" readonly>'+
                                    '<input type="hidden" class="bookingOrderId" id="bookingOrderId_'+orderInformation.id+'" value="'+orderInformation.id+'" readonly>'+
                                '</td>'+

                                '<td align="left">'+orderInformation.receiver_name+'</td>'+
                                '<td align="left">'+orderInformation.receiver_phone+'</td>'+
                                '<td align="left">'+orderInformation.receiver_address+'</td>'+

                                '<td align="right">'+
                                    total+
                                    '<input type="hidden" style="text-align: right;" class="billAmount" id="billAmount_'+orderInformation.id+'" value="'+total+'" readonly>'+
                                '</td>'+

                                '<td align="right">'+
                                    orderInformation.recieve_amount+
                                    '<input type="hidden" style="text-align: right;" class="recieveAmount" id="recieveAmount_'+orderInformation.id+'" value="'+orderInformation.recieve_amount+'" readonly>'+
                                '</td>'+

                                '<td align="right">'+
                                    orderInformation.delivery_charge+
                                    '<input type="hidden" style="text-align: right;" class="deliveryCharge" id="deliveryCharge_'+orderInformation.id+'" value="'+orderInformation.delivery_charge+'" readonly>'+
                                '</td>'+

                                '<td align="right">'+
                                    balance+
                                    '<input type="hidden" style="text-align: right;" class="balance" id="balance_'+orderInformation.id+'" value="'+balance+'" readonly>'+
                                '</td>'+

                                '<td align="center">'+
                                    '<input type="checkbox" class="check selectAllColumn" id="orderCheck_'+orderInformation.id+'" value="'+orderInformation.id+'" data-checkbox="icheckbox_square-red" onclick="getPayment('+orderInformation.id+')">'+
                                    '<label for="minimal-checkbox-'+orderInformation.id+'"></label>'+
                                '</td>'+
                            '</tr>'
                        );                        
                    }
                }
            });
        });

        function getPayment(bookingOrderId)
        {
            var orderNo = $('#orderNo_'+bookingOrderId).val();

            var billAmount = parseInt($('#billAmount_'+bookingOrderId).val());
            var totalBillAmount = parseInt($('#totalBillAmount').val());

            var recieveAmount = parseInt($('#recieveAmount_'+bookingOrderId).val());
            var totalRecieveAmount = parseInt($('#totalRecieveAmount').val());

            var deliveryCharge = parseInt($('#deliveryCharge_'+bookingOrderId).val());
            var totalDeliveryCharge = parseInt($('#totalDeliveryCharge').val());

            var balance = parseInt($('#balance_'+bookingOrderId).val());
            var totalBalance = parseInt($('#totalBalance').val());

            if ($('#orderCheck_'+bookingOrderId).is(":checked"))
            {
                var remarks = $('#remarks').val();

                totalBillAmount = totalBillAmount + billAmount;
                totalRecieveAmount = totalRecieveAmount + recieveAmount;
                totalDeliveryCharge = totalDeliveryCharge + deliveryCharge;

                totalBalance = totalBalance + balance;

                if (remarks != "")
                {
                    remarks += ', ';
                }
                
                remarks += orderNo + ' : (' + balance + ')';

                $('#totalBillAmount').val(totalBillAmount);
                $('#totalRecieveAmount').val(totalRecieveAmount);
                $('#totalDeliveryCharge').val(totalDeliveryCharge);
                $('#totalBalance').val(totalBalance);
                $('#remarks').val(remarks);

                $("#selectedOrders").append(
                    '<div class="block" id="block_'+bookingOrderId+'">'+
                    '<input type="hidden" name="orderNo[]" value="'+orderNo+'">'+
                    '<input type="hidden" name="orderId[]" value="'+bookingOrderId+'">'+

                    '<input type="hidden" name="billAmount[]" value="'+billAmount+'">'+
                    '<input type="hidden" name="recieveAmount[]" value="'+recieveAmount+'">'+
                    '<input type="hidden" name="deliveryCharge[]" value="'+deliveryCharge+'">'+
                    '<input type="hidden" name="balance[]" value="'+balance+'">'+
                    '</div>'
                );
            }
            else
            {
                var remarks = $('#remarks').val();

                var remarksArray = remarks.split(", ");

                var remarksIndex = remarksArray.indexOf(orderNo + ' : (' + balance + ')');

                remarksArray.splice(remarksIndex, 1);

                totalBillAmount = totalBillAmount - billAmount;
                totalRecieveAmount = totalRecieveAmount - recieveAmount;
                totalDeliveryCharge = totalDeliveryCharge - deliveryCharge;

                totalBalance = totalBalance - balance;

                $('#totalBillAmount').val(totalBillAmount);
                $('#totalRecieveAmount').val(totalRecieveAmount);
                $('#totalDeliveryCharge').val(totalDeliveryCharge);
                $('#totalBalance').val(totalBalance);
                $('#remarks').val(remarksArray.toString());

                $('#block_'+bookingOrderId).remove();
            }
        }

        function getOrderInfo(bookingOrderId)
        {
            var orderNo = $('#orderNo_'+bookingOrderId).val();

            var billAmount = parseInt($('#billAmount_'+bookingOrderId).val());

            var recieveAmount = parseInt($('#recieveAmount_'+bookingOrderId).val());

            var deliveryCharge = parseInt($('#deliveryCharge_'+bookingOrderId).val());

            var balance = parseInt($('#balance_'+bookingOrderId).val());

            if ($('#orderCheck_'+bookingOrderId).is(":checked"))
            {
                var remarks = $('#remarks').val();

                if (remarks != "")
                {
                    remarks += ', ';
                }
                
                remarks += orderNo + ' : (' + balance + ')';
                $('#remarks').val(remarks);

                $("#selectedOrders").append(
                    '<div class="block" id="block_'+bookingOrderId+'">'+
                    '<input type="hidden" name="orderNo[]" value="'+orderNo+'">'+
                    '<input type="hidden" name="orderId[]" value="'+bookingOrderId+'">'+

                    '<input type="hidden" name="billAmount[]" value="'+billAmount+'">'+
                    '<input type="hidden" name="recieveAmount[]" value="'+recieveAmount+'">'+
                    '<input type="hidden" name="deliveryCharge[]" value="'+deliveryCharge+'">'+
                    '<input type="hidden" name="balance[]" value="'+balance+'">'+
                    '</div>'
                );
            }
            else
            {
                var remarks = $('#remarks').val();

                var remarksArray = remarks.split(", ");

                var remarksIndex = remarksArray.indexOf(orderNo + ' : (' + balance + ')');

                remarksArray.splice(remarksIndex, 1);
                $('#remarks').val(remarksArray.toString());

                $('#block_'+bookingOrderId).remove();
            }
        }
    </script>
@endsection