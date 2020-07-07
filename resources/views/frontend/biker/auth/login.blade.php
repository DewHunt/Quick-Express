@extends('frontend.layouts.master') 

@section('content')
@php
	$loginAs = array('user.login'=>'Customer','merchant.login'=>'Merchant','biker.login'=>'Biker');
@endphp
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
                    <strong>Success! </strong> {{ Session::get('message') }}
                </div>
            @endif

			<div class="quotation-block">
				<form action="{{ route('biker.login') }}" class="quotation-form" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="form-group">
								<label for="name">Login As
									<span>*</span>
								</label>
								<select class="form-control" id="loginAs">
									@php
										foreach ($loginAs as $key => $value) {
											if(\Route::currentRouteName() == $key){
												$selected = 'selected';
											}else{
												$selected = '';	
											}
									@endphp
										<option {{$selected}} value="{{$key}}">{{$value}}</option>
									@php
										}
									@endphp
								</select>
							</div>
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-lg-6 col-sm-6">
							<div class="form-group">
								<label for="name">Email Address/Phone No
									<span>*</span>
								</label>
								<input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6">
							<div class="form-group">
								<label for="email">Password <span>*</span></label>
								<input type="password" name="password" class="form-control" id="password" required="">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-8">
							<a class="btn btn-success" href="{{ route('biker.registration') }}">
								Create Acount
							</a>
						</div>
						<div class="col-lg-4 text-right">
							<a class="btn btn-info btn-lg" href="{{ route('biker.registration') }}">
								Forget Password ?
							</a>
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
				</form>
				<div class="quotation-dtl text-white">
					
				</div>
			</div>
		</div>
	</div>

	@section('custom_js')
		<script type="text/javascript">
		    $('#loginAs').on('change', function(){
		    	var url = $('#loginAs').find(":selected").val();
		    	if(url == 'user.login'){
		      		window.location.href = "{{route('user.login')}}";
		    	}
		    	if(url == 'biker.login'){
		      		window.location.href = "{{route('biker.login')}}";
		    	}

		    	if(url == 'merchant.login'){
		      		window.location.href = "{{route('merchant.login')}}";
		    	}
		    }); 
		</script>
	@endsection
@endsection