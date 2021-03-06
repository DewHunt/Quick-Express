@extends('frontend.layouts.master') 

@section('content')
	<style type="text/css">
		textarea{
			height: unset !important;
		}
	</style>
	<div id="quotation" class="quotation-main-block" style="background-image: url('{{ asset('public/frontend/asset/images/bg/best-bg.jpg') }}')">
		<div class="container">
			<div class="section text-center">
				<h1 class="section-heading">{{$title}}</h1>
			</div>

			@if( count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong style="font-weight: bold;color: #e4280a;font-size: 16px;">
                        Sorry !
                    </strong> 
                    <strong style="font-weight: bold;color: #ca0c0c;;">
                        {{ $errors->first() }}
                    </strong>
                </div>
            @endif

            @if (Session::get('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> {{ Session::get('message') }}
                </div>
            @endif

			<div class="quotation-block">
				<form action="{{ route('merchant.registration') }}" class="quotation-form" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-lg-6 col-sm-6">
							<div class="form-group">
								<label for="name">Business Name <span>*</span></label>
								<input type="text" name="name" class="form-control" id="name" placeholder="business name of merchant" value="{{ old('name') }}" required>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6">
							<div class="form-group">
								<label for="contact_person_name">Contact Person Name <span>*</span></label>
								<input type="text" name="contact_person_name" class="form-control" id="contact_person_name" placeholder="contact person name" value="{{ old('contact_person_name') }}" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
								<label for="contact_person_phone">Contact Person Phone No <span>*</span></label>
								<input type="text" name="contact_person_phone" class="form-control" id="contact_person_phone" placeholder="phone no." value="{{ old('contact_person_phone') }}" required>
							</div>
						</div>

						<div class="col-lg-3">
							<div class="form-group">
								<label for="trade_licence_no">Trade Licence No</label>
								<input type="text" name="trade_licence_no" class="form-control" id="trade_licence_no" placeholder="trade licence no" value="{{ old('trade_licence_no') }}">
							</div>
						</div>

			            <div class="col-md-6"> 
			                <div class="form-group {{ $errors->has('area') ? ' has-danger' : '' }}">
			                    <label for="area">Business Area</label>
			                    <div class="form-group {{ $errors->has('area') ? ' has-danger' : '' }}">
			                        <select class="form-control select2" name="area" required>
			                            <option value="">Select Business Area</option>
			                            @foreach ($area_list as $area)
			                                <option value="{{$area->id}}">{{$area->name}}</option>
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
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-12 col-sm-6">
									<div class="form-group">
										<label for="contact_person_email">Contact Person Email</label>
										<input type="contact_person_email" name="contact_person_email" class="form-control" id="contact_person_email" placeholder="contact person email" value="{{ old('contact_person_email') }}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="password">Password <span>*</span></label>
										<input type="password" name="password" class="form-control" id="password" required>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for="confirm_password">Confirm Password <span>*</span></label>
										<input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label for="address">Address <span>*</span></label>
								<textarea name="address" class="form-control" id="address" rows="5" required>{{ old('address') }}</textarea>
							</div>
						</div>
					</div>

					

					<div class="row">
						<div class="col-lg-12 text-right">
							<a class="btn btn-success" href="{{ route('merchant.login') }}">
								Already Have Account ? Login Here
							</a>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
				<div class="quotation-dtl text-white">
					
				</div>
			</div>
		</div>
	</div>
@endsection