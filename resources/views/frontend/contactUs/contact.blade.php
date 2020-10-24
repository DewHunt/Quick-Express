@extends('frontend.layouts.master')

@section('custom-css')
	<style type="text/css">
		.contact-section h5 {
			margin: 10px 0; 		
		    background: #5bf1b2;
		    padding: 10px;
		}

		.contact-detail {
			margin-top: 15px;
		}

		.contact-detail span {
			padding-left: 35px;
		}

		.contact-detail p b {
			font-size: 15px;
		}


	</style>
@endsection

@section('content')
	<!-- Contact Area -->
	<div class="contact-section section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="section-title">
						<h2>Find Us Easy Way</h2>
					</div>
					<div class="row">
						@foreach ($allContacts as $contact)
							<div class="col-lg-4 col-md-6 col-sm-6">
								<h5>{{ @$contact->name }}</h5>
								<div class="contact-detail">
									<p>
										<i class="las la-user-tie"></i><b>Contact Person</b>
										<span>{{ @$contact->contact_person }}</span>
									</p>

									<p>
										<i class="las la-mobile"></i><b>Phone</b>
										<span>{{ @$contact->phone_one }}, {{ @$contact->phone_two }}</span>
										<span>{{ @$contact->phone_three }}, {{ @$contact->phone_four }}</span>
									</p>

									<p>
										<i class="las la-map-marker"></i><b>Address</b>
										<span>{{ @$contact->address }}</span>
									</p>

									<p>
										<i class="las la-envelope"></i><b>Email</b>
										<span>{{ @$contact->email_one }} </span>
										<span>{{ @$contact->email_two }} </span>
										<span>{{ @$contact->email_three }} </span>
										<span>{{ @$contact->email_four }} </span>
									</p>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>

			<div>
				<div class="col-lg-6">
					<div class="contact-form">
						<h3>Get in Touch</h3>
						<form name="contact-form" id="contactForm" action="http://capricorn-theme.net/html/excelsure/sendemail.php" method="POST">
							<input type="text" name="name" id="name" required="" placeholder="User Name">
							<input type="email" name="email" id="email" required="" placeholder="Your E-mail">
							<input type="text" name="subject" id="subject" placeholder="Subject">
							<textarea name="message" id="message" cols="30" rows="10" required="" placeholder="How can help you?"></textarea>
							<button class="btn btn-primary" type="submit" name="submit">Send Message</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
