@extends('admin.layouts.masterAddEdit')


@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input class="form-control" type="hidden" name="merchantId" value="{{ $charge->id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="merchant-name">Merchant's Name</label>
                <div class="form-group {{ $errors->has('merchant') ? ' has-danger' : '' }}">
                    <select class="form-control select2 merchant" id="merchant" name="merchant" required>
                        <option value="">Select A Merchant's Name</option>
                        @foreach ($merchants as $merchant)
                            @php
                                if ($merchant->id == $charge->merchant_id)
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
            </div>

            <div class="col-md-4">
                <label for="service-type">Service Type</label>
                <div class="form-group {{ $errors->has('serviceTypeId') ? ' has-danger' : '' }}">
                    <select class="form-control select2 serviceType" id="serviceType" name="serviceTypeId" onchange="getChargeName()" required>
                        <option value="">Select A Service Type</option>
                        @foreach ($serviceTypes as $serviceType)
                            @php
                                if ($serviceType->id == $charge->service_type_id)
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
                <label for="Service">Service Name</label>
                <div class="form-group {{ $errors->has('serviceId') ? ' has-danger' : '' }}">
                    <select class="form-control select2 service" id="service" name="serviceId" onchange="getChargeName()" required>
                        <option value="">Select A Service Name</option>
                        @foreach ($services as $service)
                            @php
                                if ($service->id == $charge->service_id)
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
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="charge-name">Charge Name</label>
                <div class="form-group {{ $errors->has('chargeName') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Charge Name" id="chargeName" name="chargeName" value="{{ $charge->name }}" required>
                    @if ($errors->has('chargeName'))
                        @foreach($errors->get('chargeName') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="charge">Charge</label>
                <div class="form-group {{ $errors->has('charge') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Delivery Charge" id="charge" name="charge" value="{{ $charge->charge }}" required>
                    @if ($errors->has('charge'))
                        @foreach($errors->get('charge') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="charge-per-kg">Charge Per Kg</label>
                <div class="form-group {{ $errors->has('chargePerKg') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Delivery ChargePerKg" id="chargePerKg" name="chargePerKg" value="{{ $charge->charge_per_uom }}">
                    @if ($errors->has('chargePerKg'))
                        @foreach($errors->get('chargePerKg') as $error)
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
        function getChargeName()
        {
            var deliveryCharge;

            if ($('#serviceType').val())
            {
                var serviceTypeName = $('#serviceType option:selected').text();
            }
            else
            {
                var serviceTypeName = '';
            }

            if ($('#service').val())
            {
                var serviceName = $('#service option:selected').text();
            }
            else
            {
                var serviceName = '';
            }

            var chargeName = serviceTypeName + ' - ' + serviceName;

            $("#chargeName").val(chargeName);
        }
    </script>
@endsection