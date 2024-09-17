@extends('frontend.layout')
@section('title','Contact Us')
@section('content')
@include('flash-messages')
	<!-- Start Contact -->
	<div class="m-4 p-5 bg-secondary ">
		<div class="container">
            <h4 class="text-center pb-3">Contact Us</h4>
            <p>Write us a message @auth @else<span style="font-size:12px;" class="text-danger">[You need to login first]</span>@endauth</p>
				<div class="contact-head">
					<div class="row">
						<form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
						    @csrf
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group mb-3">
												<label class="form-label">Your Name<span>*</span></label>
												<input name="name" class="form-control" id="name" type="text" placeholder="Enter your name">

                                            </div>
                                            @error('name')
                                                <div class="form-error">
                                                    {{$message}}
                                                </div>

                                                @enderror
										</div>

										<div class="col-lg-12">
											<div class="form-group  mb-3">
												<label  class="form-label">Your Email<span>*</span></label>
												<input name="email" class="form-control" type="email" id="email" placeholder="Enter email address">

                                            </div>
                                            @error('email')
                                                <div class="form-error">
                                                    {{$message}}
                                                </div>

                                                @enderror
										</div>
										<div class="col-lg-12">
											<div class="form-group  mb-3">
												<label  class="form-label">Your Phone<span>*</span></label>
												<input id="phone" class="form-control" name="phone" type="number" placeholder="Enter your phone">

                                            </div>
                                            @error('phone')
                                                <div class="form-error">
                                                    {{$message}}
                                                </div>

                                                @enderror
										</div>
										<div class="col-12">
											<div class="form-group message  mb-3">
												<label  class="form-label">your message<span>*</span></label>
												<textarea name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                                            </div>
                                            @error('message')
                                                <div class="form-error">
                                                    {{$message}}
                                                </div>

                                                @enderror
										</div>
										<div class="col-12">
											<div class="form-group button  mb-3">
												<button type="submit" class="btn btn-outline-dark ">Send Message</button>
											</div>
										</div>
									</div>
								</form>

						</div>
					</div>
				</div>
			</div>
        </div>
	<!--/ End Contact -->






@endsection

