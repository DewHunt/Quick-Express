@extends('frontend.merchant.index') 

@section('merchant_content')
@php
    if($profile->birth_date != NULL){
        $birth_date = date('d-m-Y',strtotime($profile->birth_date));
    }else{
        $birth_date = '';
    }
@endphp
    <div class="card-body">
        <form class="crud_form" action="{{ route('merchant.editProfile') }}"method="POST" enctype="multipart/form-data" name="form">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="name">Owner Name
                        </label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ $profile->name }}" required>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="nid">Contact Person Name</label>
                        <input type="text" name="contact_person_name" class="form-control" value="{{ $profile->contact_person_name  }}" required="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="contact_person_phone">Contact Person Phone
                                </label>
                                <input type="text" name="contact_person_phone" class="form-control" id="contact_person_phone" placeholder="Phone No." value="{{ $profile->contact_person_phone }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="contact_person_email">Email</label>
                                <input type="email" name="contact_person_email" class="form-control" id="contact_person_email" placeholder="Email" value="{{ $profile->contact_person_email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="trade_licence_no">Trade Licence</label>
                                <input type="text" name="trade_licence_no" class="form-control" placeholder="trade licence no" value="{{ $profile->trade_licence_no }}" required="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address">Address
                        </label>
                        <textarea name="address" class="form-control" id="address" rows="8" required>{{ $profile->address }}</textarea>
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