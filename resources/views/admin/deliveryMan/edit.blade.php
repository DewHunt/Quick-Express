@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" class="form-control" name="deliveryManId" value="{{ $deliveryMan->id }}">
            </div>

            <div class="col-md-6">
                <input type="hidden" class="form-control" name="userId" value="{{ $deliveryMan->user_id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="delivery-man-name">Delivery Man Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Delivery Man Name" name="name" value="{{ $deliveryMan->name }}" required>
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
                    <input type="text" class="form-control" placeholder="National ID" name="nid" value="{{ $deliveryMan->nid }}">
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
                <div class="form-group {{ $errors->has('area') ? ' has-danger' : '' }}">
                    <label for="area">Preffered Area</label>
                    <div class="form-group {{ $errors->has('district') ? ' has-danger' : '' }}">
                        <select class="form-control select2" name="area[]" multiple required>
                            @php
                                $area_array = explode(',', $deliveryMan->area_id);
                            @endphp
                            @foreach ($area_list as $area)
                                @php
                                    if(in_array($area->id, $area_array)){
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

            <div class="col-md-6">
                <label for="Phone">Phone</label>
                <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ $deliveryMan->phone }}" required>
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
                <div class="row">
                    <div class="col-md-12">
                        <label for="image">Image</label>
                        <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }}">
                            <input type="hidden" class="form-control" name="previousImage" value="{{ $deliveryMan->image }}">
                            <input type="file" class="form-control" placeholder="Upload Delivery Man Recent Passport Size Image" name="image" value="{{ old('image') }}">
                             <span class="imageSizeInfo">/* Max Width: 600x, Max Height: 600px <br></span>
                            @if ($errors->has('image'))
                                @foreach($errors->get('image') as $error)
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
                                <div class="form-group {{ $errors->has('width') ? ' has-danger' : '' }}">
                                    <label for="width">Width</label>
                                    <input type="text" class="form-control" placeholder="Image Width" name="width" value="{{ $deliveryMan->width }}">
                                    <input type="hidden" class="form-control" name="previousWidth" value="{{ $deliveryMan->width }}">
                                    @if ($errors->has('width'))
                                        @foreach($errors->get('width') as $error)
                                            <div class="form-control-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('height') ? ' has-danger' : '' }}">
                                    <label for="height">Height</label>
                                    <input type="text" class="form-control" placeholder="Image Height" name="height" value="{{ $deliveryMan->height }}">
                                    <input type="hidden" class="form-control" name="previousHeight" value="{{ $deliveryMan->height }}">
                                    @if ($errors->has('height'))
                                        @foreach($errors->get('height') as $error)
                                            <div class="form-control-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <img src="{{ asset($deliveryMan->image) }}" width="140px" height="140px" style="border: 1px solid gray; border-radius: 3px">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}" required>
                                    @if ($errors->has('email'))
                                        @foreach($errors->get('email') as $error)
                                            <div class="form-control-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="address">Address</label>
                        <div class="form-group {{ $errors->has('address') ? ' has-danger' : '' }}">
                            <textarea class="form-control" rows="6" placeholder="Delivery Man Address" name="address">{{ $deliveryMan->address }}</textarea>
                            @if ($errors->has('address'))
                                @foreach($errors->get('address') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection