@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="service-type">Service Type</label>
                <div class="form-group {{ $errors->has('serviceTypeId') ? ' has-danger' : '' }}">
                    <select class="form-control select2 serviceType" id="serviceType" name="serviceTypeId" onchange="getChargeName()" required>
                        <option value="">Select A Service Type</option>
                        @foreach ($serviceTypes as $serviceType)
                            <option value="{{ $serviceType->id }}">{{ $serviceType->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <label for="Service">Service Name</label>
                <div class="form-group {{ $errors->has('serviceId') ? ' has-danger' : '' }}">
                    <select class="form-control select2 service" id="service" name="serviceId" onchange="getChargeName()" required>
                        <option value="">Select A Service Name</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="charge-name">Charge Name</label>
                <div class="form-group {{ $errors->has('chargeName') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Charge Name" id="chargeName" name="chargeName" value="{{ old('chargeName') }}" required>
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
                    <input type="number" class="form-control" placeholder="Delivery Charge" id="charge" name="charge" value="0" required>
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