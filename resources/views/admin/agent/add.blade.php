@extends('admin.layouts.masterAddEdit')

@section('card_body')
@php 
    use App\Agent;
@endphp
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="agent-name">Agent Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Agent Name" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="national-id">NID</label>
                <div class="form-group {{ $errors->has('nid') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="National ID" name="nid" value="{{ old('nid') }}">
                    @if ($errors->has('nid'))
                        @foreach($errors->get('nid') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="contact_person">Contact Person</label>
                <div class="form-group {{ $errors->has('contact_person') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Cntact Person Name" name="contact_person" value="{{ old('contact_person') }}" required>
                    @if ($errors->has('contact_person'))
                        @foreach($errors->get('contact_person') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="Phone">Contact No</label>
                <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Contact Person Phone No" name="phone" value="{{ old('phone') }}" required>
                    @if ($errors->has('phone'))
                        @foreach($errors->get('phone') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>            
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="supporting_warehouse">Supporting Warehouse</label>
                <div class="form-group {{ $errors->has('district') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" name="supporting_warehouse" required>
                        @foreach ($warehouse_list as $warehouse)
                            <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('supporting_warehouse'))
                        @foreach($errors->get('supporting_warehouse') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="area">Preffered Area</label>
                <div class="form-group {{ $errors->has('district') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" name="area[]" multiple required>
                        @foreach ($area_list as $area)
                            @php
                                $exist_area = Agent::whereRaw('FIND_IN_SET(?,area)', [$area->id])->get();
                            @endphp

                            @if (count($exist_area) < 1)
                                <option value="{{$area->id}}">{{$area->name}}</option>
                            @endif
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

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <label for="email">Email Address</label>
                        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                @foreach($errors->get('email') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-danger" placeholder="Password" name="password" value="" required>
                            @if ($errors->has('password'))
                                @foreach($errors->get('password') as $error)
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
                    <textarea class="form-control" rows="5" placeholder="Agent's Address" name="address"></textarea>
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