@extends('frontend.layouts.master')

@section('content')
	<!-- about start-->
	<div id="about" class="about-main-block theme-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="about-left">
						<img src="{{ asset('public/frontend/asset/images/about/about-men-2.png') }}" alt="">
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="about-content">
						<h1 class="section-heading">We're Top Mover Service <br>in Downtown</h1>
						<h5 class="wow slideInUp">Digital Solution for your business. We are commited to provide our customer exceptional service while offering our employee the best training.</h5>
						<p class="wow slideInDown">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi cillum dolore eu fugiat.</p>
						<div class="key-feature">
							<i class="las la-chevron-circle-right"></i>
							<p>Fast Deliveries</p>
							<i class="las la-chevron-circle-right"></i>
							<p>Secured Services</p>
							<i class="las la-chevron-circle-right"></i>
							<p>Worldwide Shipping</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="about-block-two">
						<div class="about-icon-two">
							<img src="{{ asset('public/frontend/asset/images/icons/about-01.png') }}" class="img-fluid" alt="about-img">
						</div>
						<div class="about-dtl-two">
							<h4 class="about-heading">Our Strategy</h4>
							<p>It is a long established fact that app reader will be distracted by the read won’t be content page.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="about-block-two">
						<div class="about-icon-two">
							<img src="{{ asset('public/frontend/asset/images/icons/about-02.png') }}" class="img-fluid" alt="about-img">
						</div>
						<div class="about-dtl-two">
							<h4 class="about-heading">Our Mission</h4>
							<p>It is a long established fact that app reader will be distracted by the read won’t be content page.</p>
						</div>

					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="about-block-two">
						<div class="about-icon-two">
							<img src="{{ asset('public/frontend/asset/images/icons/about-03.png') }}" class="img-fluid" alt="about-img">
						</div>
						<div class="about-dtl-two">
							<h4 class="about-heading-two">Our Achievements</h4>
							<p>It is a long established fact that app reader will be distracted by the read won’t be content page.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- about end-->

	<!-- facts start-->
	<div id="facts" class="facts-main-block" style="background-image: url('public/frontend/asset/images/bg/facts-bg.html')">
		<div class="container">
			<div class="row no-gutters text-white">
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="facts-block text-center mrg-btm-30">
						<h1 class="facts-heading text-white counter">2150</h1><span>+</span>
						<div class="facts-heading-sign text-white"></div>
						<div class="facts-dtl">Satisfied Clients</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="facts-block text-center mrg-btm-30">
						<h1 class="facts-heading text-white counter">100</h1>
						<div class="facts-heading-sign text-white"></div>
						<div class="facts-dtl">Offices Worldwide</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="facts-block text-center mrg-btm-30">
						<h1 class="facts-heading text-white counter">55</h1>
						<div class="facts-dtl">Countries Covered</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="facts-block text-center mrg-btm-30">
						<h1 class="facts-heading text-white counter">4.6</h1>
						<div class="facts-heading-sign text-white"></div>
						<div class="facts-dtl">Reviews</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- facts end-->

	<!--process start-->
	<div class="process-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1 class="section-heading">How we work for client</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12">
					<div class="single-process-item">
						<div class="about-points-icon">
							<img src="{{ asset('public/frontend/asset/images/icons/apply-001.png') }}" class="img-fluid" alt="home-icon">
						</div>
						<div class="about-point-heading">step 01</div>
						<h5>Apply Online</h5>
						<div class="number">01</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-sm-12">
					<div class="single-process-item">
						<div class="about-points-icon">
							<img src="{{ asset('public/frontend/asset/images/icons/apply-002.png') }}" class="img-fluid" alt="home-icon">
						</div>
						<div class="about-point-heading">step 02</div>
						<h5>Submit Documents</h5>
						<div class="number">02</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-sm-12">
					<div class="single-process-item">
						<div class="about-points-icon">
							<img src="{{ asset('public/frontend/asset/images/icons/apply-003.png') }}" class="img-fluid" alt="home-icon">
						</div>
						<div class="about-point-heading">step 03</div>
						<h5>Receive Goods</h5>
						<div class="number">03</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!--process end-->

	<!-- testimonial start-->
	<div id="testimonial" class="testimonial-main-block" style="background-image: url('public/frontend/asset/images/bg/clients.jpg')">
		<div class="container">
			<div class="section text-center">
				<h1 class="section-heading">Customer Feedback</h1>
			</div>
			<div id="testimonial-block-slider" class="testimonial-block-slider owl-carousel">
				<div class="item testimonial-dtl">
					<div class="testimonial-client-img">
						<img src="{{ asset('public/frontend/asset/images/testimonial/client-01.png') }}" class="img-fluid" alt="testimonial">
						<i class="las la-quote-right"></i>
					</div>
					<p>“ There anyone who loves or pursues nor desires to obtain pain of itself, bet it is pain, but because occasionally can packages as their default all the Lorem Ipsum generators on the Internet tend to repeat predefined. ”</p>
					<div class="rating">
						<ul>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>

						</ul>
					</div>
					<div class="testimonial-name">Mosis Kruew</div>
				</div>
				<div class="item testimonial-dtl">
					<div class="testimonial-client-img">
						<img src="{{ asset('public/frontend/asset/images/testimonial/client-02.png') }}" class="img-fluid" alt="testimonial">
						<i class="las la-quote-right"></i>
					</div>
					<p>“ There anyone who loves or pursues nor desires to obtain pain of itself, bet it is pain, but because occasionally can packages as their default all the Lorem Ipsum generators on the Internet tend to repeat predefined. ”</p>
					<div class="rating">
						<ul>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
						</ul>
					</div>
					<div class="testimonial-name">Mona Kruew</div>
				</div>
				<div class="item testimonial-dtl">
					<div class="testimonial-client-img">
						<img src="{{ asset('public/frontend/asset/images/testimonial/client-03.png') }}" class="img-fluid" alt="testimonial">
						<i class="las la-quote-right"></i>
					</div>
					<p>“ There anyone who loves or pursues nor desires to obtain pain of itself, bet it is pain, but because occasionally can packages as their default all the Lorem Ipsum generators on the Internet tend to repeat predefined. ”</p>
					<div class="rating">
						<ul>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
							<li><i class="las la-star"></i></li>
						</ul>
					</div>
					<div class="testimonial-name">Yena Kruew</div>
				</div>
			</div>
		</div>
	</div>
	<!-- testimonial end-->


	<!-- team start-->
	<div id="team" class="team-main-block">
		<div class="container">
			<div class="section text-center">
				<h1 class="section-heading">Our Team</h1>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-12 animate-box" data-animate-effect="fadeInLeft">
					<div class="team"> <img src="{{ asset('public/frontend/asset/images/team/1.jpg') }}" class="img-fluid" alt="">
						<div class="details">
							<h6>Alex Farguson</h6>
							<span>Manager</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 animate-box" data-animate-effect="fadeInLeft">
					<div class="team"> <img src="{{ asset('public/frontend/asset/images/team/2.jpg') }}" class="img-fluid" alt="">
						<div class="details">
							<h6>Robert Gill</h6>
							<span>Supervisor</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 animate-box" data-animate-effect="fadeInLeft">
					<div class="team"> <img src="{{ asset('public/frontend/asset/images/team/3.jpg') }}" class="img-fluid" alt="">
						<div class="details">
							<h6>Michael Sterk</h6>
							<span>Sr. Executive</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 animate-box" data-animate-effect="fadeInLeft">
					<div class="team"> <img src="{{ asset('public/frontend/asset/images/team/4.jpg') }}" class="img-fluid" alt="">
						<div class="details">
							<h6>John Clerk</h6>
							<span>Front Desk Office</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- team end-->
@endsection
