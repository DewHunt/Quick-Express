@extends('frontend.layouts.master')

@section('custom-css')
	<style type="text/css">
	</style>
@endsection

@section('content')
	<!-- Service Details -->
	<div class="service-details-section section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="service-list">
						<h5>Service Lists</h5>
						<a href="#">Standard Courier<span><i class="las la-arrow-right"></i></span></a>
						<a href="#">Door To Door<span><i class="las la-arrow-right"></i></span></a>
						<a class="active" href="#">Express Courier<span><i class="las la-arrow-right"></i></span></a>
						<a href="#">Pallet Courier<span><i class="las la-arrow-right"></i></span></a>
						<a href="#">Ware House<span><i class="las la-arrow-right"></i></span></a>

					</div>

					<div class="question-section">
						<h6>Have any Question?</h6>
						<form action="http://capricorn-theme.net/html/excelsure/sendemail.php">
							<input type="text" name="name" id="name" required="" placeholder="Full Name">
							<input type="email" name="email" id="email" required="" placeholder="Your E-mail">
							<textarea name="message" id="message" cols="30" rows="10" required="" placeholder="How can help you?"></textarea>
							<button class="btn btn-primary" type="submit">Your Question</button>
						</form>
					</div>

					<div class="helpline-section">
						<div class="helpline-content text-center">
							<h4>Need Consultancy Help</h4>
							<p>Gatherin galso sprit moving shall flow</p>
							<button class="btn btn-primary" type="submit">Contact Us</button>
						</div>
					</div>
				</div>

				<div class="col-lg-8">
					<div class="single-service">
						<img src="{{ asset('public/frontend/asset/images/service/01.jpg') }}" alt="">
						<h2>Express Courier</h2>
						<p>Air Frieght is express courier lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga sunt necessitatibus,
							fugit, nesciunt adipisci, exercitationem accusamus possimus repellendus praesentium deleniti
							explicabo laborum. Voluptates ipsa dignissimos blanditiis quibusdam temporibus cupiditate
							tempore atque illum sed? Doloribus recusandae pariatur architecto quisquam magni ipsam
							sapiente adipisci iusto odio eaque, hic repellat quis expedita perferendis? A quick brwon fox jumps over the lazy dog.</p>
						<p>Great Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt molestias, dolores
							maiores est temporibus iste aut, vitae dolorem a nisi, autem eum totam neque quibusdam!</p>
						<hr>
						<h5>Transforming brands with creativity</h5>
						<p>Such a game Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia vero ipsam nemo
							natus, mollitia adipisci sit eveniet non? Nisi doloremque molestiae amet quaerat ipsa
							maiores dolor deleniti blanditiis pariatur necessitatibus sit nemo, unde nihil eligendi
							soluta id eum dicta quisquam? a quick brown fox jumps over the lazy dog.</p>
						<div class="row">
							<div class="col-lg-6">
								<div class="single-service-bg">
									<img src="{{ asset('public/frontend/asset/images/service/02.jpg') }}" alt="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="single-service-bg">
									<img src="{{ asset('public/frontend/asset/images/service/04.jpg') }}" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
