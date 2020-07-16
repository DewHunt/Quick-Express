@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" class="form-control" name="bookedOrderId" value="{{ $bookedOrder->id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="booking-date">Booking Date</label>
                <div class="form-group">
                    <input  type="text" class="form-control datepicker" name="deliveryDate" placeholder="Select Delivery Date" value="{{ date('d-m-Y', strtotime($bookedOrder->date)) }}">
                </div>
            </div>

            <div class="col-md-6">
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
            <div class="col-md-6">
                <label for="sender-phone-number">Sender Phone Number</label>
                <div class="form-group {{ $errors->has('senderPhoneNumber') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Sender Phone Number" name="senderPhoneNumber" value="{{ $bookedOrder->sender_phone }}">
                    @if ($errors->has('senderPhoneNumber'))
                        @foreach($errors->get('senderPhoneNumber') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="receiver-phone-number">Receiver Phone Number</label>
                <div class="form-group {{ $errors->has('receiverPhoneNumber') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Receiver Phone Number" id="receiverPhoneNumber" name="receiverPhoneNumber" value="{{ $bookedOrder->receiver_phone }}" oninput="getReceiverInfo()" required>
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
                <label for="sender-name">Sender Name</label>
                <div class="form-group {{ $errors->has('senderName') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Sender Name" name="senderName" value="{{ $bookedOrder->sender_name }}">
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
                <label for="Sender-detail-address">Sender Details Address</label>
                <div class="form-group {{ $errors->has('senderAddress') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="3" placeholder="Sender Details Address" name="senderAddress">{{ $bookedOrder->sender_address }}</textarea>
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
                    <textarea class="form-control" rows="3" placeholder="Remarks ( Wirte Other Details Here )" name="remarks"></textarea>
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
                <label for="sender-zone">Sender Zone</label>
                <div class="form-group {{ $errors->has('senderZone') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" name="senderZone">
                        <option value="">Select A Zone</option>
                        @foreach ($zones as $zone)
                            @php
                                if ($zone->zone_type == $bookedOrder->sender_zone_type && $zone->zone_id == $bookedOrder->sender_zone_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }                                
                            @endphp
                            <option value="{{ $zone->zone_id }},{{ $zone->zone_type }}" {{ $select }}>{{ $zone->zone_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <label for="receiver-zone">Receiver Zone</label>
                <div class="form-group {{ $errors->has('receiverZone') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" id="receiverZone" name="receiverZone">
                        <option value="">Select A Zone</option>
                        @foreach ($zones as $zone)
                            @php
                                if ($zone->zone_type == $bookedOrder->receiver_zone_type && $zone->zone_id == $bookedOrder->receiver_zone_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }                                
                            @endphp
                            <option value="{{ $zone->zone_id }},{{ $zone->zone_type }}" {{ $select }}>{{ $zone->zone_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="courier-type">Service Type</label>
                <div class="form-group {{ $errors->has('deliveryTypeId') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select serviceType" id="serviceType" name="deliveryTypeId" onchange="findCharge()">
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

            <div class="col-md-4">
                <label for="courier-type">Service Name</label>
                <div class="form-group {{ $errors->has('courierType') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select service" id="service" name="courierType" onchange="findCharge()">
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

            <div class="col-md-4">
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
        </div>

        <div class="row">
            <div class="col-md-2">
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
                <label for="delivery-charge">Delivery Charge</label>
                <div class="form-group {{ $errors->has('deliveryCharge') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Delivery Charge" id="deliveryCharge" name="deliveryCharge" value="{{ $bookedOrder->delivery_charge == '' ? '0' : $bookedOrder->delivery_charge }}">
                    @if ($errors->has('deliveryCharge'))
                        @foreach($errors->get('deliveryCharge') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
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

            <div class="col-md-3">
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
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript">
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
                url:'{{ route('merchantBookingOrder.getReceiverInfo') }}',
                data:{receiverPhoneNumber:receiverPhoneNumber},
                success:function(data){
                    $('#receiverName').val(data.receiverName);
                    $('#receiverAddress').val(data.receiverAddress);

                    if (data.receiverName)
                    {
                        $('#receiverName').prop('readonly',true);
                    }
                    else
                    {
                        $('#receiverName').prop('readonly',false);
                    }

                    // $('#receiverZone').selectmenu("refresh", true);

                    if (data.receiverZoneName)
                    {
                        $('#receiverZone option').filter(function () {
                            return $(this).html() == $('#receiverZone option:selected').text();
                        }).attr('selected', false).trigger('chosen:updated');
                        
                        $('#receiverZone option').filter(function () {
                            return $(this).val() == "";
                        }).attr('selected', false).trigger('chosen:updated');

                        $('#receiverZone option').filter(function () {
                            return $(this).html() == data.receiverZoneName;
                        }).attr('selected', true).trigger('chosen:updated');
                    }
                    else
                    {
                        $('#receiverZone option').filter(function () {
                            return $(this).html() == $('#receiverZone option:selected').text();
                        }).attr('selected', false).trigger('chosen:updated');

                        $('#receiverZone option').filter(function () {
                            return $(this).val() == "";
                        }).attr('selected', true).trigger('chosen:updated');
                    }
                },
            });
        }

        function findCharge()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var serviceTypeId = $('#serviceType').val();
            var serviceId = $('#service').val();
            var clientId = $('#clientId').val();

            $.ajax({
                type:'post',
                url:'{{ route('merchantBookingOrder.getChargeInfo') }}',
                data:{
                    serviceTypeId:serviceTypeId,
                    serviceId:serviceId,
                    clientId:clientId
                },
                success:function(data){
                    $('#deliveryChargeUnit').val(data.charge);
                    $('#chargeName').val(data.chargeName);
                    findDeliveryCharge();
                }
            });
        }

        $(document).on('change', '#service', function()
        {
            var serviceTypeName = $('#service option:selected').text();
            var serviceTypeId = $('#service').val();

            if (serviceTypeName == 'Weighing Scale' || serviceTypeId == 6)
            {
                $("#uom").prop("readonly",false);
            }
            else
            {
                $("#uom").prop("readonly",true);
                $("#uom").val(1);
            }
        });

        function findDeliveryCharge()
        {
            var deliveryCharge;

            var deliveryChargeUnit = parseFloat($("#deliveryChargeUnit").val());
            var uom = parseFloat($("#uom").val());

            if (uom <= 0)
            {
                $("#uom").val('1')
                deliveryCharge = deliveryChargeUnit;
            }
            else
            {
                deliveryCharge = deliveryChargeUnit * uom;
            }

            $("#deliveryCharge").val(Math.round(deliveryCharge));
        }
    </script>
@endsection