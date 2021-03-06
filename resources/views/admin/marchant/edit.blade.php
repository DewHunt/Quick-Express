@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" class="form-control" name="marchantId" value="{{ $marchant->id }}">
            </div>
            <div class="col-md-6">
                <input type="hidden" class="form-control" name="userId" value="{{ $marchant->user_id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="agent-name">Warehouse Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Warehouse Name" name="name" value="{{ $marchant->name }}" required>
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="contact-person-name">Contact Person Name</label>
                <div class="form-group {{ $errors->has('contactPerson') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Contact Person Name" name="contactPerson" value="{{ $marchant->contact_person_name }}" required>
                    @if ($errors->has('contactPerson'))
                        @foreach($errors->get('contactPerson') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="Phone">Phone</label>
                <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Menu link" name="phone" value="{{ $marchant->contact_person_phone }}" required>
                    @if ($errors->has('phone'))
                        @foreach($errors->get('phone') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6"> 
                <div class="form-group {{ $errors->has('area') ? ' has-danger' : '' }}">
                    <label for="area">Business Area</label>
                    <div class="form-group {{ $errors->has('district') ? ' has-danger' : '' }}">
                        <select class="form-control select2" name="area" required>
                            <option value="">Select Business Area</option>
                            @foreach ($area_list as $area)
                                @php
                                    if($area->id == $marchant->area)
                                    {
                                        $selected = 'selected';
                                    }
                                    else
                                    {
                                        $selected = '';
                                    }
                                @endphp
                                <option {{$selected}} value="{{$area->id}}">{{$area->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('area'))
                            @foreach($errors->get('area') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>                                       
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="cod-charge">COD Charge (%)</label>
                <div class="form-group {{ $errors->has('codChargePercentage') ? ' has-danger' : '' }}">
                    <input type="number" min="0" step="0.01" class="form-control" placeholder="COD Charge Percentage" name="codChargePercentage" value="{{ $marchant->cod_charge_percentage }}" required>
                    @if ($errors->has('codChargePercentage'))
                        @foreach($errors->get('codChargePercentage') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for=""></label>
                <div class="form-group {{ $errors->has('parcelReturnable') ? ' has-danger' : '' }}">
                    <div class="form-check-inline">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="1" id="returnCharge" name="returnCharge" {{ $marchant->return_charge_status == 1 ? "checked" : "" }}>Return Charge
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="1" id="rescheduleCharge" name="rescheduleCharge" {{ $marchant->reschedule_charge_status == 1 ? "checked" : "" }}>Re-Schedule Charge
                        </label>
                    </div>
                    @if ($errors->has('parcelReturnable'))
                        @foreach($errors->get('parcelReturnable') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <label for="trade-License">Trade License No.</label>
                        <div class="form-group {{ $errors->has('tradeLicenseNo') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control" placeholder="Trade License" name="tradeLicenseNo" value="{{ $marchant->trade_licence_no }}">
                            @if ($errors->has('tradeLicenseNo'))
                                @foreach($errors->get('tradeLicenseNo') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}" required>
                            <input type="text" class="form-control" placeholder="fa fa-icon" name="email" value="{{ $marchant->contact_person_email }}">
                            @if ($errors->has('email'))
                                @foreach($errors->get('email') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label for="address">Address</label>
                <div class="form-group {{ $errors->has('address') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="5" placeholder="Agent's Address" name="address">{{ $marchant->address }}</textarea>
                    @if ($errors->has('address'))
                        @foreach($errors->get('address') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection