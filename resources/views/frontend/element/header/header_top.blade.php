<div id="top-bar" class="top-bar-main-block">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="top-nav">
					<ul>
						{{-- when login a customer --}}
						@if(Auth::guard('customer')->user())
							<li class="login">
								<a href="{{ route('user.dashboard') }}" title="Login">
									<i class="las la-share-square"></i> Dashboard 
								</a>
							</li>
							<li>
								<a href="{{ route('user.logout') }}" title="Create an account">
									<i class="las la-user"></i> Logout
								</a>
							</li>

						{{-- when login a merchant man --}}
						@elseif(Auth::guard('merchant')->user())
							<li class="login">
								<a href="{{ route('merchant.dashboard') }}" title="Login">
									<i class="las la-share-square"></i> Dashboard 
								</a>
							</li>
							<li>
								<a href="{{ route('merchant.logout') }}" title="Create an account">
									<i class="las la-user"></i> Logout
								</a>
							</li>

						{{-- when login a delivery man --}}
						@elseif(Auth::guard('biker')->user())
							<li class="login">
								<a href="{{ route('biker.dashboard') }}" title="Login">
									<i class="las la-share-square"></i> Dashboard 
								</a>
							</li>
							<li>
								<a href="{{ route('biker.logout') }}" title="Create an account">
									<i class="las la-user"></i> Logout
								</a>
							</li>
						@else

							<li class="login">
								<a href="{{ route('user.login') }}" title="Login">
									<i class="las la-share-square"></i> Login 
								</a>
							</li>
							<li class="login">
								<a href="{{ route('user.registration') }}" title="Create an account">
									<i class="las la-user"></i> User Registration
								</a>
							</li>

							<li class="login">
								<a href="{{ route('merchant.registration') }}" title="Create an account">
									<i class="las la-user"></i> Merchant Registration
								</a>
							</li>

							<li>
								<a href="{{ route('biker.registration') }}" title="Create an account">
									<i class="la la-motorcycle"></i> Biker Registration
								</a>
							</li>
						@endif
					</ul>
				</div>
			</div>
			<div class="col-md-5 text-right">
				<div class="top-bar-social">
					<ul>
						<li class="call">
							<i class="las la-phone-volume"></i>
							Call us at: 
							<a href="tel:" title="">{{ $website_information->phone_one }}</a>
						</li>
						@foreach ($social_link_list as $social_link)
							<li>
								<a href="{{$social_link->link}}" target="_blank" title="facebook">
									<i class="@php echo $social_link->icon @endphp"></i>
								</a>
							</li>
						@endforeach
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>