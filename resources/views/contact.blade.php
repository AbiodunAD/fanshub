@extends('layouts.landing')

@section('title')
	Contact Us - afribeats® 
@endsection

@section('content')
<div id="s-container" class="remove-on-mobile">&nbsp;</div>
<div id="s-container">&nbsp;</div>
<div class="c-pageheader">
	<h1>Contact Us</h1>
</div>
<div id="wrap">
    <div class="placeholder">
        <div class="log-form">
			<p>For Inquiries about our donations and program sponsorship, please fill the form below or contact us via mails@afribeats.tv or WhatsApp: +1(307) 888-9025 </p>
			@if(session('success'))
				<div class="success-box">
					<p>{{ session('success') }}</p>
				</div>
			@endif
		    <form method="POST" action="{{ url('/contact/sendmail') }}">
		        @csrf

		        <div class="row mb-3">
		            <input type="text" name="name" placeholder="Your Name:">
					<input type="email" name="email" placeholder="Email Address:">
					<input type="tel" name="phone" placeholder="Phone Number:">
					<textarea name="message" placeholder="Your Message:"></textarea>
		        </div>
 
		        <div class="row mb-0">
		            <div class="col-md-8 offset-md-4">
		                <button type="submit" class="btn btn-primary">Send</button>
		            </div>
		        </div>
		    </form>


		</div>
	</div>
</div>

<div id="s-container" class="remove-on-mobile">&nbsp;</div>


<div id="s-container">
    <div id="wrap">
       
        <div class="log-form">
            <h3>MEMBERSHIP IS FREE</h3>
            <p style="margin-bottom: 0;">Supported only by Donations & Sponsorship</p>
            <p>Donate to, or sponsor afribeats "Talent Support Revolution" today and get a STAR up on the success podium</p>
            <div class="footer"><p class="btn-grey"><a href="https://www.paypal.com/donate/?hosted_button_id=42UQ84BW4GWVG" target="_blank">Donate</a></p></div>
        </div>

    </div>
</div>


@endsection