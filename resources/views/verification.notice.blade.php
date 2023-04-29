@extends('layouts.landing')

@section('title')
	Contact Us - afribeats®
@endsection

@section('content')
<div id="s-container" class="remove-on-mobile">&nbsp;</div>
<div id="s-container">&nbsp;</div>
<div class="c-pageheader">
	<h1>Verify Your Email Address</h1>
</div>
<div id="wrap">
    <div class="placeholder">
        <div class="log-form">
                
            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        <p>A fresh verification link has been sent to your email address.</p>
                    </div>
                @endif

                <p>Before proceeding, please check your email for a verification link.</p>
                <p>If you did not receive the email</p>,
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">click here to request another</button>.
                </form>
            </div>

        </div>
    </div>
</div>
    
<div id="s-container" class="remove-on-mobile">&nbsp;</div>
<div id="s-container" class="remove-on-mobile">&nbsp;</div>
@endsection