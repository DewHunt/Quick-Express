@extends('frontend.biker.index') 

@section('biker_content')
@php
    if($profile->birth_date != NULL){
        $birth_date = date('d-m-Y',strtotime($profile->birth_date));
    }else{
        $birth_date = '';
    }
@endphp
    <style type="text/css">
        textarea{
            height: unset !important;
        }

        .chosen-container-multi .chosen-choices {
            height: unset !important;
        }
    </style>
    <div class="card-body">
        <form class="crud_form" action="{{ route('biker.editProfile') }}"method="POST" enctype="multipart/form-data" name="form">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="name">Name
                        </label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ $profile->name }}" required>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $profile->email }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="phone">Phone No
                                </label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No." value="{{ $profile->phone }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nid">National ID No</label>
                                <input type="number" name="nid" class="form-control" placeholder="nid no" value="{{ $profile->nid }}" required="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address">Address
                        </label>
                        <textarea name="address" class="form-control" id="address" rows="4" required>{{ $profile->address }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address">Driving Licence
                        </label>
                        <input type="text" name="driving_licence" class="form-control" id="driving_licence" placeholder="your driving licence number" value="{{ $profile->driving_licence }}" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="bike_registration_no">Bike Registration No
                        </label>
                        <input type="text" name="bike_registration_no" class="form-control" id="bike_registration_no" placeholder="bike registration no" value="{{ $profile->bike_registration_no }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="image">Profile Picture</label>
                        <input type="file" name="image" class="form-control" id="image" value="{{ old('image') }}" style="padding: 4px;">
                        @if (file_exists($profile->image))
                            <img src="{{ asset($profile->image) }}" height="100px">
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="area_id">Preferred Area
                            <span>*</span>
                        </label>
                        <select class="form-control chosen-select" name="area_id[]" required multiple>
                            @php
                                $allArea = explode(',', $profile->area_id);
                            @endphp
                            <option value="">Select Area</option>
                            @foreach ($area_list as $area)
                            @php
                                if(in_array($area->id, $allArea)){
                                    $selected = 'selected';
                                }else{
                                    $selected = '';
                                }
                            @endphp
                                <option {{$selected}} value="{{$area->id}}">{{$area->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 text-right">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-info" value="Save">
                        <i class="la la-save"></i> Update
                    </button>
                </div>
            </div>
            <div class="custom-card-footer">
                <div class="row">
                    
                </div>              
            </div>
        </form>
    </div>
@endsection