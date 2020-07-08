@extends('frontend.layouts.master') 

@section('content')
	<div id="quotation" class="quotation-main-block" style="background-image: url('{{ asset('public/frontend') }}images/bg/consult-bg.jpg')">
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
				<form action="{{ route('user.registration') }}" class="quotation-form" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-lg-6 col-sm-6">
							<div class="form-group">
								<label for="name">Name 
									<span>*</span>
								</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ old('name') }}" required>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="phone">Phone No 
									<span>*</span>
								</label>
								<input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No." value="{{ old('phone') }}" required>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label for="address">Address 
									<span>*</span>
								</label>
								<input type="text" name="address" class="form-control" id="address" placeholder="your address" value="{{ old('address') }}" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="password">Password 
									<span>*</span>
								</label>
								<input type="password" name="password" class="form-control" id="password" required>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label for="confirm_password">Confirm Password 
									<span>*</span>
								</label>
								<input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 text-right">
							<a class="btn btn-success" href="{{ route('user.login') }}">
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