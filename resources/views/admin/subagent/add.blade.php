@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="agent-name">Agent Name</label>
                <div class="form-group {{ $errors->has('agentId') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" name="agentId">
                        <option value=" ">Select Agent's Name</option>
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <label for="subagent-name">Subagent Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Subagent Name" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="contact-person">Contact Person</label>
                <div class="form-group {{ $errors->has('contactPerson') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Contact Person" name="contactPerson" value="{{ old('contactPerson') }}">
                    @if ($errors->has('contact-person'))
                        @foreach($errors->get('contactPerson') as $error)
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
                <div class="row">
                    <div class="col-md-12">
                        <label for="Phone">Phone</label>
                        <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                @foreach($errors->get('phone') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="email">Email</label>
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
                    <textarea class="form-control" rows="9" placeholder="Subagent's Address" name="address"></textarea>
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