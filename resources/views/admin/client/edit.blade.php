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
                    <input type="text" class="form-control" placeholder="Client Name" name="name" value="{{ $client->name }}" required>
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
            <div class="col-md-6">
                <label for="image">Image</label>
                <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }}">
                    <input type="hidden" class="form-control" name="previousImage" value="{{ $client->image }}">
                    <input type="file" class="form-control" placeholder="Upload Delivery Man Recent Passport Size Image" name="image" value="{{ old('image') }}">
                     <span class="imageSizeInfo">/* Max Width: 600x, Max Height: 600px <br></span>
                    @if ($errors->has('image'))
                        @foreach($errors->get('image') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group {{ $errors->has('width') ? ' has-danger' : '' }}">
                    <label for="width">Width</label>
                    <input type="text" class="form-control" placeholder="Image Width" name="width" value="{{ $client->width }}">
                    <input type="hidden" class="form-control" name="previousWidth" value="{{ $client->width }}">
                    @if ($errors->has('width'))
                        @foreach($errors->get('width') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group {{ $errors->has('height') ? ' has-danger' : '' }}">
                    <label for="height">Height</label>
                    <input type="text" class="form-control" placeholder="Image Height" name="height" value="{{ $client->height }}">
                    <input type="hidden" class="form-control" name="previousHeight" value="{{ $client->height }}">
                    @if ($errors->has('height'))
                        @foreach($errors->get('height') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <img src="{{ asset($client->image) }}" width="100px" height="100px" style="border: 1px solid gray; border-radius: 3px">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
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

            <div class="col-md-6"> 
                <div class="form-group {{ $errors->has('area') ? ' has-danger' : '' }}">
                    <label for="area">Home Area</label>
                    <div class="form-group {{ $errors->has('district') ? ' has-danger' : '' }}">
                        <select class="form-control select2" name="area" required>
                            @foreach ($area_list as $area)
                            @php
                                if($area->id == $client->area){
                                    $selected = 'selected';
                                }else{
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
                <div class="row">
                    <div class="col-md-12">
                        <label for="Phone">Phone</label>
                        <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ $client->phone }}" required>
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
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $client->email }}" required>
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
                    <textarea class="form-control" rows="5" placeholder="Client's Address" name="address">{{ $client->address }}</textarea>
                    @if ($errors->has('address'))
                        @foreach($errors->get('address') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
        </div>
    </div>
@endsection