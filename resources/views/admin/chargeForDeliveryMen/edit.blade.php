@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input class="form-control" type="hidden" name="chargeId" value="{{ $charge->id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="service-type">Service Type</label>
                <div class="form-group {{ $errors->has('serviceTypeName') ? ' has-danger' : '' }}">
                    <select class="form-control select2 serviceType" id="serviceType" name="serviceTypeName" onchange="getChargeName()" required>
                        <option value="">Select A Service Type</option>
                        <option value="Collect" {{ $charge->service_type_name == 'Collect' ? 'selected' : '' }}>Collect</option>
                        <option value="Delivery" {{ $charge->service_type_name == 'Delivery' ? 'selected' : '' }}>Delivery</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
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

            <div class="col-md-6">
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