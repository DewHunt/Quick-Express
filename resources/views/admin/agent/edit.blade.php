@extends('admin.layouts.masterAddEdit')

@section('card_body')
@php 
    use App\Agent;
@endphp
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" class="form-control" name="agentId" value="{{ $agent->id }}">
            </div>

            <div class="col-md-6">
                <input type="hidden" class="form-control" name="userId" value="{{ $agent->user_id }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="agent-name">Agent Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Agent Name" name="name" value="{{ $agent->name }}">
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
                    <input type="text" class="form-control" placeholder="National ID" name="nid" value="{{ $agent->nid }}">
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
                    <input type="text" class="form-control" placeholder="Cntact Person Name" name="contact_person" value="{{ $agent->contact_person }}" required>
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
                    <input type="text" class="form-control" placeholder="Contact Person Phone No" name="phone" value="{{ $agent->phone }}" required>
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
                        @php
                            if($warehouse->id == $agent->supporting_warehouse){
                                $selected = "selected";
                            }else{
                                $selected = "";
                            }
                        @endphp
                            <option {{$selected}} value="{{$warehouse->id}}">{{$warehouse->name}}</option>
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
                        @php
                            $area_array = explode(',', $agent->area);
                        @endphp
                        @foreach ($area_list as $area)
                            @php
                                if(in_array($area->id, $area_array))
                                {
                                    $selected = 'selected';
                                }
                                else
                                {
                                    $selected = '';
                                }
                                $exist_area = Agent::whereRaw('FIND_IN_SET(?,area)', [$area->id])->get();
                                $exist_own_area = explode(',', $agent->area);
                            @endphp

                            @if (in_array($area->id, $exist_own_area) || count($exist_area) < 1)
                                <option {{$selected}} value="{{$area->id}}">{{$area->name}}</option>
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
                <label for="email">Email Address</label>
                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $agent->email }}">
                    @if ($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="address">Address</label>
                <div class="form-group {{ $errors->has('address') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="5" placeholder="Agent's Address" name="address">{{ $agent->address }}</textarea>
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