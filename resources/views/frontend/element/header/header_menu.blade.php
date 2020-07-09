<div id="nav-bar" class="nav-bar-main-block">
	<div class="sticky-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<!--logo-->
					<div class="logo">
						<a href="{{url('/')}}" title="logo">
							<img src="{{ asset(@$website_information->logo_one) }}" alt="logo">
						</a>
					</div>
					<!-- Responsive Menu Area -->
					<div class="responsive-menu-wrap"></div>
				</div>

				<div class="col-lg-7">
					<!-- main-menu-->
					<div class="navigation text-white">
						<div id="cssmenu">
							<ul>
								<li class="active">
									<a href="{{ url('/') }}" title="Home">Home</a>
								</li>
								
								{{-- <li><a href="#" title="blog">Blog +</a>
									<ul>
										<li><a href="blog.html" title="Blog">Blog</a></li>
									</ul>
								</li> --}}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>