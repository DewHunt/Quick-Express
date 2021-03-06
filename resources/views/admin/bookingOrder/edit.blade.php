@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" class="form-control" name="bookedOrderId" value="{{ $bookedOrder->id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="booking-date">Booking Date</label>
                <div class="form-group">
                    <input  type="text" class="form-control datepicker" id="bookingDate" name="bookingDate" placeholder="Select Delivery Date" value="{{ date('d-m-Y', strtotime($bookedOrder->date)) }}" required>
                </div>
            </div>

            <div class="col-md-4">
                <label for="booking-date">Booking Date</label>
                <div class="form-group">
                    <input  type="text" class="form-control datepicker" id="deliveryDate" name="deliveryDate" placeholder="Select Delivery Date" value="{{ date('d-m-Y', strtotime($bookedOrder->delivery_date)) }}" required>
                </div>
            </div>

            <div class="col-md-4">
                <label for="order-no-name">Order No</label>
                <div class="form-group {{ $errors->has('orderNo') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Order No" name="orderNo" value="{{ $bookedOrder->order_no }}" readonly>
                    @if ($errors->has('orderNo'))
                        @foreach($errors->get('orderNo') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="cash-on-delivery">Cash On Delivery</label>
                <div class="form-group {{ $errors->has('cod') ? ' has-danger' : '' }}">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" value="Yes" id="no" name="cod" class="cod" required {{ $bookedOrder->cod == 'Yes' ? 'checked' : '' }}> Yes
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" value="No" id="no" name="cod" class="cod" {{ $bookedOrder->cod == 'No' ? 'checked' : '' }}> No
                        </label>
                    </div>
                    @if ($errors->has('cod'))
                        @foreach($errors->get('cod') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <label for="order-no-name">Cash On Delivery Amount</label>
                <div class="form-group {{ $errors->has('codAmount') ? ' has-danger' : '' }}">
                    <input type="number" min="0" class="form-control" placeholder="Cash On Delivery Amount" id="codAmount" name="codAmount" value="{{ $bookedOrder->cod_amount }}" oninput="findDeliveryCharge()" {{ $bookedOrder->cod == 'Yes' ? '' : 'readonly' }}>
                    <input type="hidden" class="form-control" id="codChargePercentage" name="codChargePercentage" value="{{ $bookedOrder->cod_charge_percentage }}">
                    @if ($errors->has('codAmount'))
                        @foreach($errors->get('codAmount') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <label for="sender-type">Sender Type</label>
                <div class="form-group {{ $errors->has('senderType') ? ' has-danger' : '' }}">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" value="Client" id="Client" name="senderType" class="senderType" {{ $bookedOrder->booked_type == 'Client' ? 'checked' : 'disabled' }}> client
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" value="Merchant" id="Merchant" name="senderType" class="senderType" {{ $bookedOrder->booked_type == 'Merchant' ? 'checked' : 'disabled' }}> Merchant
                        </label>
                    </div>
                    @if ($errors->has('senderType'))
                        @foreach($errors->get('senderType') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="sender-phone-number">Clien / Merchant Phone No.</label>
                <div class="form-group {{ $errors->has('senderPhoneNumber') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Sender Phone Number" id="senderPhoneNumber" name="senderPhoneNumber" value="{{ $bookedOrder->sender_phone }}" readonly>
                    @if ($errors->has('senderPhoneNumber'))
                        @foreach($errors->get('senderPhoneNumber') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
                <input class="form-control" type="hidden" id="clientId" name="clientId" value="{{ $bookedOrder->sender_id }}">
            </div>

            <div class="col-md-6">
                <label for="receiver-phone-number">Receiver Phone Number</label>
                <div class="form-group {{ $errors->has('receiverPhoneNumber') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Receiver Phone Number" id="receiverPhoneNumber" name="receiverPhoneNumber" value="{{ $bookedOrder->receiver_phone }}" oninput="getReceiverInfo()">
                    @if ($errors->has('receiverPhoneNumber'))
                        @foreach($errors->get('receiverPhoneNumber') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="sender-name">Clien / Merchant Name</label>
                <div class="form-group {{ $errors->has('senderName') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Sender Name" id="senderName" name="senderName" value="{{ $bookedOrder->sender_name }}" readonly>
                    @if ($errors->has('senderName'))
                        @foreach($errors->get('senderName') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="receiver-name">Receiver Name</label>
                <div class="form-group {{ $errors->has('receiverName') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Receiver Name" id="receiverName" name="receiverName" value="{{ $bookedOrder->receiver_name }}">
                    @if ($errors->has('receiverName'))
                        @foreach($errors->get('receiverName') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="Sender-detail-address">Clien / Merchant Details Address</label>
                <div class="form-group {{ $errors->has('senderAddress') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="3" placeholder="Sender Details Address" id="senderAddress" name="senderAddress">{{ $bookedOrder->sender_address }}</textarea>
                    @if ($errors->has('senderAddress'))
                        @foreach($errors->get('senderAddress') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="receiver-detail-address">Receiver Details Address</label>
                <div class="form-group {{ $errors->has('receiverAddress') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="3" placeholder="Receiver Details Address" id="receiverAddress" name="receiverAddress">{{ $bookedOrder->receiver_address }}</textarea>
                    @if ($errors->has('receiverAddress'))
                        @foreach($errors->get('receiverAddress') as $error)
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
                    <textarea class="form-control" rows="3" placeholder="Remarks ( Wirte Other Details Here )" name="remarks">{{ $bookedOrder->remarks }}</textarea>
                    @if ($errors->has('remarks'))
                        @foreach($errors->get('remarks') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="sender-area">Clien / Merchant Area</label>
                <div class="form-group {{ $errors->has('senderArea') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" id="senderArea" name="senderArea" required>
                        <option value="">Select A Zone</option>
                        @foreach ($areas as $area)
                            @php
                                if ($area->id == $bookedOrder->sender_area_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }                                
                            @endphp
                            <option value="{{ $area->id }}" {{ $select }}>{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" id="senderZoneId" name="senderZoneId" value="{{ $bookedOrder->sender_zone_id }}">
                <input type="hidden" id="senderZoneType" name="senderZoneType" value="{{ $bookedOrder->sender_zone_type }}">
                <input type="hidden" id="senderHubId" name="senderHubId" value="{{ $bookedOrder->sender_hub_id }}">
            </div>

            <div class="col-md-6">
                <label for="receiver-area">Receiver Area</label>
                <div class="form-group {{ $errors->has('receiverArea') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" id="receiverArea" name="receiverArea" required>
                        <option value="">Select A Zone</option>
                        @foreach ($areas as $area)
                            @php
                                if ($area->id == $bookedOrder->receiver_area_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }                                
                            @endphp
                            <option value="{{ $area->id }}" {{ $select }}>{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" id="receiverZoneId" name="receiverZoneId" value="{{ $bookedOrder->receiver_zone_id }}">
                <input type="hidden" id="receiverZoneType" name="receiverZoneType" value="{{ $bookedOrder->receiver_zone_type }}">
                <input type="hidden" id="receiverHubId" name="receiverHubId" value="{{ $bookedOrder->receiver_hub_id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="courier-type">Service Type</label>
                <div class="form-group {{ $errors->has('serviceTypeId') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select serviceType" id="serviceType" name="serviceTypeId" onchange="findCharge()">
                        <option value="">Select A Delivery Type</option>
                        @foreach ($serviceTypes as $serviceType)
                            @php
                                if ($serviceType->id == $bookedOrder->delivery_type_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }                                
                            @endphp
                            <option value="{{ $serviceType->id }}" {{ $select }}>{{ $serviceType->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <label for="courier-type">Service Name</label>
                <div class="form-group {{ $errors->has('serviceId') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select service" id="service" name="serviceId" onchange="findCharge()">
                        <option value="">Select A Courier Type</option>
                        @foreach ($services as $service)
                            @php
                                if ($service->id == $bookedOrder->courier_type_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }                                
                            @endphp
                            <option value="{{ $service->id }}" {{ $select }}>{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <label for="charge-name">Charge Name</label>
                <div class="form-group {{ $errors->has('chargeName') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Charge Name" id="chargeName" name="chargeName" value="{{ $bookedOrder->charge_name }}" readonly>
                    @if ($errors->has('chargeName'))
                        @foreach($errors->get('chargeName') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- <div class="col-md-3">
                <label for="delivery-type">Delivery Type</label>
                <div class="form-group {{ $errors->has('deliveryTypeId') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" name="deliveryTypeId">
                        <option value="">Select A Delivery Type</option>
                        @foreach ($deliveryTypes as $deliveryType)
                            @php
                                if ($deliveryType->id == $bookedOrder->delivery_duration_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }                                
                            @endphp
                            <option title="{{ $deliveryType->description }}" value="{{ $deliveryType->id }}" {{ $select }}>{{ $deliveryType->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="delivery-type-unit">Delivery Charge Unit</label>
                <div class="form-group {{ $errors->has('deliveryChargeUnit') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Unit Price" id="deliveryChargeUnit" name="deliveryChargeUnit" oninput="findDeliveryCharge()" value="{{ $bookedOrder->delivery_charge_unit }}">
                    @if ($errors->has('deliveryChargeUnit'))
                        @foreach($errors->get('deliveryChargeUnit') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="charge-unit-per-kg">Charge Unit Per Kg/Litre</label>
                <div class="form-group {{ $errors->has('deliveryChargeUnitPerUom') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Unit Price Per Kg" id="deliveryChargeUnitPerUom" name="deliveryChargeUnitPerUom" oninput="findDeliveryCharge()" value="{{ $bookedOrder->delivery_charge_unit_per_uom }}" {{ $bookedOrder->courier_type_id == 10 ? "" : "readonly" }}>
                    <input type="hidden" class="form-control" id="upto" name="upto">
                    @if ($errors->has('deliveryChargeUnitPerUom'))
                        @foreach($errors->get('deliveryChargeUnitPerUom') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-2">
                <label for="qty-kg-lit">Kg/Litre</label>
                <div class="form-group {{ $errors->has('uom') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Qunatity/KG/Litre" id="uom" name="uom" oninput="findDeliveryCharge()" value="{{ $bookedOrder->uom == '' ? '1' : $bookedOrder->uom }}" readonly>
                    @if ($errors->has('uom'))
                        @foreach($errors->get('uom') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-2">
                <label for="cod-charge">COD Charge</label>
                <div class="form-group {{ $errors->has('codCharge') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="COD Charge" id="codCharge" name="codCharge" value="{{ $bookedOrder->cod_charge }}" readonly>
                    @if ($errors->has('codCharge'))
                        @foreach($errors->get('codCharge') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-2">
                <label for="delivery-charge">Delivery Charge</label>
                <div class="form-group {{ $errors->has('deliveryCharge') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Delivery Charge" id="deliveryCharge" name="deliveryCharge" value="{{ $bookedOrder->delivery_charge == '' ? '0' : $bookedOrder->delivery_charge }}">
                    <input type="hidden" class="form-control" id="collectionPayment" name="collectionPayment" value="{{ $bookedOrder->collection_payment == '' ? '0' : $bookedOrder->collection_payment }}">
                    <input type="hidden" class="form-control" id="deliveryPayment" name="deliveryPayment" value="{{ $bookedOrder->delivery_payment == '' ? '0' : $bookedOrder->delivery_payment }}">
                    @if ($errors->has('deliveryCharge'))
                        @foreach($errors->get('deliveryCharge') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $(document).on('change', '#senderArea', function()
        {
            var areaId = $('#senderArea').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('bookingOrder.getAgentInfo') }}',
                data:{areaId:areaId},
                success:function(data){
                    $('#senderZoneId').val(data.zoneId);
                    $('#senderZoneType').val(data.zoneType);
                    $('#senderHubId').val(data.hubId);
                },
            });
        });

        $(document).on('change', '#receiverArea', function()
        {
            var areaId = $('#receiverArea').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('bookingOrder.getAgentInfo') }}',
                data:{areaId:areaId},
                success:function(data){
                    $('#receiverZoneId').val(data.zoneId);
                    $('#receiverZoneType').val(data.zoneType);
                    $('#receiverHubId').val(data.hubId);
                },
            });
        });

        $('.cod').click(function(event) {
            var cod =  $("input[name='cod']:checked").val();

            if(cod == "Yes")
            {
                $("#codAmount").prop('readonly',false);
            }
            else
            {
                $("#codAmount").val(0);
                $("#codAmount").prop('readonly',true);
                $("#codCharge").val(0);
                findDeliveryCharge();
            }
        })

        function getClientInfo()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var senderPhoneNumber = $('#senderPhoneNumber').val();

            $.ajax({
                type:'post',
                url:'{{ route('bookingOrder.getClientInfo') }}',
                data:{senderPhoneNumber:senderPhoneNumber},
                success:function(data){
                    $('#senderName').val(data.senderName);
                    $('#senderAddress').val(data.senderAddress);
                    $('#clientId').val(data.clientId);
                    $('#clientUserRoleId').val(data.clientUserRoleId);
                    $('#senderZoneId').val(data.zoneId);
                    $('#senderZoneType').val(data.zoneType);
                    $('#codChargePercentage').val(data.senderCodChargePercentage);
                    $('#parcelReturnable').val(data.senderParcelReturnable);
                    $('#senderHubId').val(data.senderHubId);

                    if (data.clientType == '')
                    {
                        $( ".senderType" ).prop( "checked", false );
                    }
                    else
                    {
                        if (data.clientType == 'Client')
                        {
                            $("#Client").prop("checked",true);
                        }
                        else
                        {
                            $("#Merchant").prop("checked",true);
                        }
                    }

                    if (data.senderAreaId)
                    {
                        $('#senderArea option').filter(function () {
                            return $(this).val() == "";
                        }).attr('selected', false).trigger('chosen:updated');

                        $('#senderArea option').filter(function () {
                            return $(this).val() == data.senderAreaId;
                        }).attr('selected', true).trigger('chosen:updated');
                    }
                    else
                    {
                        $('#senderArea option').filter(function () {
                            return $(this).val() == $('#senderArea').val();
                        }).attr('selected', false).trigger('chosen:updated');

                        $('#senderArea option').filter(function () {
                            return $(this).val() == "";
                        }).attr('selected', true).trigger('chosen:updated');
                    }
                    findDeliveryCharge();
                }
            });
        }

        function getReceiverInfo()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var receiverPhoneNumber = $('#receiverPhoneNumber').val();

            $.ajax({
                type:'post',
                url:'{{ route('bookingOrder.getReceiverInfo') }}',
                data:{receiverPhoneNumber:receiverPhoneNumber},
                success:function(data){
                    $('#receiverName').val(data.receiverName);
                    $('#receiverAddress').val(data.receiverAddress);
                    $('#receiverZoneId').val(data.zoneId);
                    $('#receiverZoneType').val(data.zoneType);
                    $('#receiverHubId').val(data.receiverHubId);

                    if (data.receiverName)
                    {
                        $('#receiverName').prop('readonly',true);
                    }
                    else
                    {
                        $('#receiverName').prop('readonly',false);
                    }

                    if (data.receiverAreaId)
                    {
                        $('#receiverArea option').filter(function () {
                            return $(this).val() == "";
                        }).attr('selected', false).trigger('chosen:updated');

                        $('#receiverArea option').filter(function () {
                            return $(this).val() == data.receiverAreaId;
                        }).attr('selected', true).trigger('chosen:updated');
                    }
                    else
                    {
                        $('#receiverArea option').filter(function () {
                            return $(this).val() == $('#receiverArea').val();
                        }).attr('selected', false).trigger('chosen:updated');

                        $('#receiverArea option').filter(function () {
                            return $(this).val() == "";
                        }).attr('selected', true).trigger('chosen:updated');
                    }
                },
            });
        }

        function findCharge()
        {
            if ($('input[name="senderType"]:checked').val())
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var senderType = $('input[name="senderType"]:checked').val();
                var serviceTypeId = $('#serviceType').val();
                var serviceId = $('#service').val();
                var clientId = $('#clientId').val();

                $.ajax({
                    type:'post',
                    url:'{{ route('bookingOrder.getChargeInfo') }}',
                    data:{
                        senderType:senderType,
                        serviceTypeId:serviceTypeId,
                        serviceId:serviceId,
                        clientId:clientId
                    },
                    success:function(data){
                        if (data.charge)
                        {
                            $('#deliveryChargeUnit').val(data.charge);
                        }
                        else
                        {
                            $('#deliveryChargeUnit').val(0);
                        }

                        if (data.chargePerUom)
                        {
                            $('#deliveryChargeUnitPerUom').val(data.chargePerUom);
                        }
                        else
                        {
                            $('#deliveryChargeUnitPerUom').val(0);
                        }
                        $('#chargeName').val(data.chargeName);
                        $('#collectionPayment').val(data.collectionPayment);
                        $('#deliveryPayment').val(data.deliveryPayment);
                        findDeliveryCharge();
                    }
                });
            }
            else
            {
                swal({
                      title: "Problem",   
                      text: "Please Select Sender Type",   
                      type: "error" 
                });
            }
        }

        $(document).on('change', '#service', function()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var serviceTypeId = $('#service').val();

            $.ajax({
                type:'post',
                url:'{{ route('bookingOrder.getServiceInfo') }}',
                data:{serviceTypeId:serviceTypeId},
                success:function(data){
                    var serviceInfo = data.serviceInfo;
                    $("#upto").val(serviceInfo.upto);
                    
                    if (serviceInfo.weighing_scale == 1)
                    {
                        $("#uom").prop("readonly",false);
                        $("#deliveryChargeUnitPerUom").prop("readonly",false);
                    }
                    else
                    {
                        $("#uom").prop("readonly",true);
                        $("#deliveryChargeUnitPerUom").prop("readonly",true);
                        $("#uom").val(1);
                        $("#deliveryChargeUnitPerUom").val(0);z
                    }
                }
            });
        });

        function findDeliveryCharge()
        {
            var deliveryCharge;

            var codAmount = parseFloat($("#codAmount").val());
            var codChargePercentage = parseFloat($("#codChargePercentage").val());
            var codCharge = (codAmount * codChargePercentage) / 100;
            $("#codCharge").val(codCharge);

            var deliveryChargeUnit = parseFloat($("#deliveryChargeUnit").val());
            var uom = parseFloat($("#uom").val());
            var upto = parseFloat($("#upto").val());

            if (uom <= 0)
            {
                $("#uom").val('1')
                deliveryCharge = deliveryChargeUnit + codCharge;
            }
            else
            {
                var deliveryChargeUnitPerUom = parseFloat($("#deliveryChargeUnitPerUom").val());

                if (uom <= upto)
                {
                    deliveryCharge = deliveryChargeUnit + codCharge;
                }
                else
                {
                    deliveryCharge = (deliveryChargeUnitPerUom * (uom - upto)) + deliveryChargeUnit + codCharge;
                }
            }

            $("#deliveryCharge").val(Math.round(deliveryCharge));
        }
    </script>
@endsection