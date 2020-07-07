@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" class="form-control" name="subagentId" value="{{ $subagent->id }}">
            </div>

            <div class="col-md-6">
                <input type="hidden" class="form-control" name="userId" value="{{ $subagent->user_id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="agent-name">Agent Name</label>
                <div class="form-group {{ $errors->has('agentId') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" name="agentId">
                        <option value=" ">Select Agent's Name</option>
                        @foreach ($agents as $agent)
                            @php
                                if ($agent->id == $subagent->agent_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }
                                
                            @endphp
                            <option value="{{ $agent->id }}" {{ $select }}>{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <label for="subagent-name">Subagent Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Subagent Name" name="name" value="{{ $subagent->name }}">
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <label for="upazila">Upazila</label>
                <div class="form-group {{ $errors->has('upazila') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Upazila Name" name="upazila" value="{{ $subagent->upazila }}">
                    @if ($errors->has('upazila'))
                        @foreach($errors->get('upazila') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="Phone">Phone</label>
                <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ $subagent->phone }}">
                    @if ($errors->has('phone'))
                        @foreach($errors->get('phone') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <label for="national-id">NID</label>
                <div class="form-group {{ $errors->has('nid') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="National ID" name="nid" value="{{ $subagent->nid }}">
                    @if ($errors->has('nid'))
                        @foreach($errors->get('nid') as $error)
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
                                if ($role->id == $subagent->user_role_id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }                                
                            @endphp
                            <option value="{{$role->id}}" {{ $select }}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>                                       
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="email">Email</label>
                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $subagent->email }}">
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
                    <input type="text" class="form-control form-control-danger" placeholder="User Name" name="username" value="{{ $user->username }}" required>
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
                    <textarea class="form-control" rows="5" placeholder="Subagent's Address" name="address">{{ $subagent->address }}</textarea>
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