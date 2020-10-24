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
        <div class="col-lg-5 col-md-3">
            <form class="form-horizontal" action="{{ route($formLink) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <label for="delivery-men-list">Delivery Men List</label>
                        <div class="form-group {{ $errors->has('deliveryMan') ? ' has-danger' : '' }}">
                            <select class="select2 form-control" id="deliveryMan" name="deliveryMan" required disabled="">
                                <option value="">Select A Client/Marchant</option>
                                @foreach ($merchants as $merchant)
                                    @php
                                        if ($merchant->id == $merchantPayment->merchant_id)
                                        {
                                            $select = "selected";
                                        }
                                        else
                                        {
                                            $select = "";
                                        }
                                        
                                    @endphp
                                    <option value="{{ $merchant->id }}" {{ $select }}>{{ $merchant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="merchantId" value="{{ $merchantPayment->merchant_id }}">
                        <input type="hidden" name="merchantPaymentId" value="{{ $merchantPaymentId }}">
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="total-cod-amount">Total Balance</label>
                                <div class="form-group {{ $errors->has('totalBalance') ? ' has-danger' : '' }}">
                                    <input type="text" class="form-control" id="totalBalance" name="totalBalance" value="{{ $merchantPayment->total_balance }}" required readonly />
                                    <input type="hidden" class="form-control" id="totalCodAmount" name="totalCodAmount" value="{{ $merchantPayment->total_cod_amount }}" required readonly />
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
                                    <input type="text" class="form-control add_datepicker" id="paymentDate" name="paymentDate" placeholder="Select Payment Date" value="{{ $merchantPayment->date == "" ? "--- " : date('Y-m-d',strtotime($merchantPayment->date)) }}" readonly>
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
                                            @php
                                                if ($key == $merchantPayment->deposit_type)
                                                {
                                                    $select = "selected";
                                                }
                                                else
                                                {
                                                    $select = "";
                                                }
                                                
                                            @endphp
                                            <option value="{{ $key }}" {{ $select }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="bank-account">Accoount No</label>
                                <div class="form-group {{ $errors->has('accountNo') ? ' has-danger' : '' }}">
                                    <input type="text" class="form-control" id="accountNo" name="accountNo" placeholder="Acconut No" value="{{ $merchantPayment->account_no }}" {{ $merchantPayment->deposit_type == "Cash Payment" ? "" : "required" }}/>
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
                                    <textarea class="form-control" id="remarks" name="remarks" rows="3" required>{{ $merchantPayment->remarks }}</textarea>
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
                                <label for=""></label>
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
                            <div id="selectedOrders">
                                @foreach ($merchantPaymentLists as $aMerchantPaymentList)
                                    <div class="block" id="block_{{ $aMerchantPaymentList->booking_order_id }}">
                                        <input type="text" name="orderNo[]" value="{{ $aMerchantPaymentList->order_no }}">
                                        <input type="text" name="codAmount[]" value="{{ $aMerchantPaymentList->cod_amount }}">
                                        <input type="text" name="deliveryCharge[]" value="{{ $aMerchantPaymentList->service_charge }}">
                                        <input type="text" name="orderId[]" value="{{ $aMerchantPaymentList->booking_order_id }}">
                                        <input type="text" name="balance[]" value="{{ $aMerchantPaymentList->balance }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-7 col-md-9">
            <div class="tableFixHead">
                <table class="table table-bordered table-md {{-- color-table muted-table --}} color-bordered-table success-bordered-table orderInfo">
                    <thead>
                        <tr>
                            <tr>
                                <th>Order No.</th>
                                <th width="110px">COD Amount</th>
                                <th width="110px">Service Charge</th>
                                <th width="80px">Balance</th>
                                <th width="30px" style="text-align: center;"></th>
                            </tr>
                        </tr>
                    </thead>

                    <tbody id="tbody">
                        @foreach ($merchantPaymentLists as $merchantPaymentList)
                            <tr class="orderInfoRow" id="orderInfoRow_{{ $merchantPaymentList->booking_order_id }}">
                                <td>
                                    {{ $merchantPaymentList->order_no }}
                                    <input type="hidden" class="orderNo_{{ $merchantPaymentList->booking_order_id }}" id="orderNo_{{ $merchantPaymentList->booking_order_id }}" value="{{ $merchantPaymentList->order_no }}">
                                </td>

                                <td align="right">
                                    {{ $merchantPaymentList->cod_amount }}
                                    <input type="hidden" style="text-align: right;" class="type_{{ $merchantPaymentList->booking_order_id }}" id="type_{{ $merchantPaymentList->booking_order_id }}" value="{{ $merchantPaymentList->cod_amount }}">
                                </td>

                                <td align="right">
                                    {{ $merchantPaymentList->service_charge }}
                                    <input type="hidden" style="text-align: right;" class="charge_{{ $merchantPaymentList->booking_order_id }}" id="charge_{{ $merchantPaymentList->booking_order_id }}" value="{{ $merchantPaymentList->service_charge }}">
                                </td>

                                <td align="right">
                                    {{ $merchantPaymentList->balance }}
                                    <input type="hidden" style="text-align: right;" class="balance_{{ $merchantPaymentList->booking_order_id }}" id="balance_{{ $merchantPaymentList->booking_order_id }}" value="{{ $merchantPaymentList->balance }}">
                                </td>

                                <td align="center">
                                    <input type="checkbox" id="orderCheck_{{ $merchantPaymentList->booking_order_id }}" value="{{ $merchantPaymentList->booking_order_id }}" onclick="getPayment({{ $merchantPaymentList->booking_order_id }})" checked>
                                    <label for="minimal-checkbox-{{ $merchantPaymentList->booking_order_id }}"></label>
                                </td>
                            </tr>
                        @endforeach

                        @foreach ($orderInformations as $orderInformation)
                            @php
                                $balance = $orderInformation->cod_amount - $orderInformation->delivery_charge;
                            @endphp
                            <tr class="orderInfoRow" id="orderInfoRow_{{ $orderInformation->id }}">
                                <td>
                                    {{ $orderInformation->order_no }}
                                    <input type="hidden" class="orderNo_{{ $orderInformation->id }}" id="orderNo_{{ $orderInformation->id }}" value="{{ $orderInformation->order_no }}">
                                </td>

                                <td align="right">
                                    {{ $orderInformation->cod_amount }}
                                    <input type="hidden" style="text-align: right;" class="type_{{ $orderInformation->id }}" id="type_{{ $orderInformation->id }}" value="{{ $orderInformation->cod_amount }}">
                                </td>

                                <td align="right">
                                    {{ $orderInformation->delivery_charge }}
                                    <input type="hidden" style="text-align: right;" class="charge_{{ $orderInformation->id }}" id="charge_{{ $orderInformation->id }}" value="{{ $orderInformation->delivery_charge }}">
                                </td>

                                <td align="right">
                                    {{ $balance }}
                                    <input type="hidden" style="text-align: right;" class="charge_{{ $orderInformation->id }}" id="charge_{{ $orderInformation->id }}" value="{{ $balance }}">
                                </td>

                                <td align="center">
                                    <input type="checkbox" id="orderCheck_{{ $orderInformation->id }}" value="{{ $orderInformation->id }}" onclick="getPayment({{ $orderInformation->id }})">
                                    <label for="minimal-checkbox-{{ $orderInformation->id }}"></label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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