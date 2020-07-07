@extends('frontend.biker.index') 

@section('biker_content')
@php
    if($profile->birth_date != NULL){
        $birth_date = date('d-m-Y',strtotime($profile->birth_date));
    }else{
        $birth_date = '';
    }
@endphp
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
                        <label for="nid">Date of Birth</label>
                        <input type="text" name="birth_date" class="form-control datepicker" value="{{ $birth_date  }}" required="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone No
                        </label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No." value="{{ $profile->phone }}" required>
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
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="nid">National ID No</label>
                        <input type="number" name="nid" class="form-control" placeholder="nid no" value="{{ $profile->nid }}" required="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address">Address
                        </label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="your address" value="{{ $profile->address }}" required>
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