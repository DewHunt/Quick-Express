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
    {{-- <div style="padding-bottom: 23px;"></div> --}}
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-5 col-md-3">
                    <form class="form-horizontal" action="{{ route($formLink) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="card-body">
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

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="total-cod-amount">Total Balance</label>
                                        <div class="form-group {{ $errors->has('totalBalance') ? ' has-danger' : '' }}">
                                            <input type="text" class="form-control" id="totalBalance" name="totalBalance" value="0" required readonly />
                                            <input type="hidden" class="form-control" id="totalCodAmount" name="totalCodAmount" value="0" required readonly />
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

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="remarks">Remarks</label>
                                        <div class="form-group {{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                            <textarea class="form-control" id="remarks" name="remarks" rows="3" required>{{ old('remarks') }}</textarea>
                                            @if ($errors->has('remarks'))
                                                @foreach($errors->get('remarks') as $error)
                                                    <div class="form-control-feedback">{{ $error }}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <div class="form-group">
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

                                <div class="row">
                                    <div id="selectedOrders"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-7 col-md-9">
                    <div class="tableFixHead">
                        <table class="table table-bordered table-md color-bordered-table success-bordered-table orderInfo">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th width="120px">COD Amount</th>
                                    <th width="120px">Service Charge</th>
                                    <th width="100px">Balance</th>
                                    <th width="30px" style="text-align: center;"></th>
                                </tr>
                            </thead>

                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript">
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
                        var balance = orderInformation.cod_amount - orderInformation.delivery_charge;
                        $(".orderInfo tbody").append(
                            '<tr class="orderInfoRow" id="orderInfoRow_'+orderInformation.id+'">'+
                                '<td>'+
                                    orderInformation.order_no+
                                    '<input type="hidden" class="orderNo_'+orderInformation.id+'" id="orderNo_'+orderInformation.id+'" value="'+orderInformation.order_no+'" readonly>'+
                                '</td>'+

                                '<td align="right">'+
                                    orderInformation.cod_amount+
                                    '<input type="hidden" style="text-align: right;" class="codAmount_'+orderInformation.id+'" id="codAmount_'+orderInformation.id+'" value="'+orderInformation.cod_amount+'" readonly>'+
                                '</td>'+

                                '<td align="right">'+
                                    orderInformation.delivery_charge+
                                    '<input type="hidden" style="text-align: right;" class="deliveryCharge_'+orderInformation.id+'" id="deliveryCharge_'+orderInformation.id+'" value="'+orderInformation.delivery_charge+'" readonly>'+
                                '</td>'+

                                '<td align="right">'+
                                    balance+
                                    '<input type="hidden" style="text-align: right;" class="balance_'+orderInformation.id+'" id="balance_'+orderInformation.id+'" value="'+balance+'" readonly>'+
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
            var codAmount = parseInt($('#codAmount_'+bookingOrderId).val());
            var deliveryCharge = parseInt($('#deliveryCharge_'+bookingOrderId).val());
            var balance = parseInt($('#balance_'+bookingOrderId).val());

            var totalCodAmount = parseInt($('#totalCodAmount').val());
            var totalBalance = parseInt($('#totalBalance').val());

            if ($('#orderCheck_'+bookingOrderId).is(":checked"))
            {
                var remarks = $('#remarks').val();
                totalCodAmount = totalCodAmount + codAmount;
                totalBalance = totalBalance + balance;

                if (remarks != "")
                {
                    remarks += ', ';
                }
                
                remarks += orderNo + ' - ' + balance;

                $('#totalCodAmount').val(totalCodAmount);
                $('#totalBalance').val(totalBalance);
                $('#remarks').val(remarks);

                $("#selectedOrders").append(
                    '<div class="block" id="block_'+bookingOrderId+'">'+
                    '<input type="hidden" name="orderNo[]" value="'+orderNo+'">'+
                    '<input type="hidden" name="codAmount[]" value="'+codAmount+'">'+
                    '<input type="hidden" name="deliveryCharge[]" value="'+deliveryCharge+'">'+
                    '<input type="hidden" name="orderId[]" value="'+bookingOrderId+'">'+
                    '<input type="hidden" name="balance[]" value="'+balance+'">'+
                    '</div>'
                );
            }
            else
            {
                var remarks = $('#remarks').val();

                var remarksArray = remarks.split(", ");

                var remarksIndex = remarksArray.indexOf(orderNo + ' - ' + balance);

                remarksArray.splice(remarksIndex, 1);

                totalCodAmount = totalCodAmount - codAmount;
                totalBalance = totalBalance - balance;

                $('#totalCodAmount').val(totalCodAmount);
                $('#totalBalance').val(totalBalance);
                $('#remarks').val(remarksArray.toString());

                $('#block_'+bookingOrderId).remove();
            }
        }
    </script>
@endsection