@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" class="form-control" name="clientId" value="{{ $client->id }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="client-name">Client Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Client Name" name="name" value="{{ $client->name }}">
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="date-of-birth">Date Of Birth</label>
                <div class="form-group">
                    <input  type="text" class="form-control {{ $client->birth_date == '' ? 'add_datepicker' : 'datepicker' }}" name="dob" placeholder="Select Delivery Date" value="{{ date('d-m-Y', strtotime($client->birth_date)) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="national-id">NID</label>
                <div class="form-group {{ $errors->has('nid') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="National ID" name="nid" value="{{ $client->nid }}">
                    @if ($errors->has('nid'))
                        @foreach($errors->get('nid') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <label for="Phone">Phone</label>
                <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ $client->phone }}">
                    @if ($errors->has('phone'))
                        @foreach($errors->get('phone') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-4"> 
                <div class="form-group {{ $errors->has('parent') ? ' has-danger' : '' }}">
                    <label for="role">User Role</label>
                    <select class="form-control" name="role" required>
                        <option value=""> Select Role</option>
                        @foreach($userRoles as $role)
                            @php
                                if ($role->id == $client->user_role_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }
                            @endphp
                            <option value="{{$role->id}}" {{ $select }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>                                       
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="email">Email</label>
                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $client->email }}">
                    @if ($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="address">Address</label>
                <div class="form-group {{ $errors->has('address') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="5" placeholder="Client's Address" name="address">{{ $client->address }}</textarea>
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