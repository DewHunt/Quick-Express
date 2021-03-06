@extends('frontend.customer.index') 

@section('customer_content')
@php
    if($profile->birth_date != NULL){
        $birth_date = date('d-m-Y',strtotime($profile->birth_date));
    }else{
        $birth_date = '';
    }
@endphp
    <div class="card-body">
        <form class="crud_form" action="{{ route('user.editProfile') }}"method="POST" enctype="multipart/form-data" name="form">
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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nid">Date of Birth</label>
                                <input type="text" name="birth_date" class="form-control datepicker" value="{{ $birth_date  }}" required="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone">Phone No
                                </label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No." value="{{ $profile->phone }}" required>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $profile->email }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="nid">National ID No</label>
                                <input type="number" name="nid" class="form-control" placeholder="nid no" value="{{ $profile->nid }}" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="image">Profile Picture</label>
                                <input type="file" name="image" class="form-control" id="image" value="{{ old('image') }}" style="padding: 4px;">
                                @if (file_exists($profile->image))
                                    <img src="{{ asset($profile->image) }}" height="100px">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address">Address
                        </label>
                        <textarea name="address" class="form-control" id="address" required rows="8">{{ $profile->address }}</textarea>
                    </div>
                </div>
            </div>
            <div class="custom-card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-info" value="Save">
                            <i class="la la-save"></i> Update
                        </button>
                    </div>
                </div>              
            </div>
        </form>
    </div>
@endsection