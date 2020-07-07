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
                    <input type="text" class="form-control" placeholder="Warehouse Name" name="name" value="{{ $marchant->name }}">
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
                    <input type="text" class="form-control" placeholder="Contact Person Name" name="contactPerson" value="{{ $marchant->contact_person }}">
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
                    <input type="text" class="form-control" placeholder="Menu link" name="phone" value="{{ $marchant->phone }}">
                    @if ($errors->has('phone'))
                        @foreach($errors->get('phone') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6"> 
                <div class="form-group {{ $errors->has('parent') ? ' has-danger' : '' }}">
                    <label for="role">User Role</label>
                    <select class="form-control" name="role" required>
                        <option value=""> Select Role</option>
                        @foreach($userRoles as $role)
                            @php
                                if ($role->id == $marchant->user_role_id)
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
                    <input type="text" class="form-control" placeholder="fa fa-icon" name="email" value="{{ $marchant->email }}">
                    @if ($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }}">
                    <label for="user-name">User Name</label>
                    <input type="text" class="form-control form-control-danger" name="username" value="{{ $user->username }}" required>
                    @if ($errors->has('username'))
                        @foreach($errors->get('username') as $error)
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