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
                    <strong>Success ! </strong> {{ Session::get('message') }}
                </div>
            @endif

			<div class="quotation-block">
				<div class="row" style="margin-right: 0px;">
					<div class="cart-grid-right col-xs-12 col-lg-2" style="padding-right: 0px;">
					    <div class="card">
					        <div class="sidebar_link">
							    <h5 class="profile_link_title">Profile Link</h5>
							    <ul class="profileLink">
							        <li><a href="{{ route('biker.dashboard') }}">Dashboard</a></li>
							        <li><a href="{{ route('biker.profile') }}">Profile</a></li>
							        <li><a href="{{ route('biker.logout') }}">Logout</a></li>
							    </ul>       
							</div>
					    </div>
					</div>

					<div class="cart-grid-body col-xs-12 col-lg-10">
						@yield('biker_content')
					</div>
				</div>
				<div class="quotation-dtl text-white">
					
				</div>
			</div>
		</div>
	</div>
@endsection