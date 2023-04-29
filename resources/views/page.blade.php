@extends('layouts.landing')

@section('title')
	{{ $page->title }} - afribeats® 
@endsection

@section('content')
<div id="s-container" class="remove-on-mobile">&nbsp;</div>
<div id="s-container">&nbsp;</div>

<div id="page-box">
    <div id="wrapper">
        <div id="pagecontent">
            <h1>{{ $page->title }}</h1>
            {!! ($page->body) !!}
        </div>

        <hr> 

        <div id="pagefooter">
            <h3>MEMBERSHIP IS FREE</h3>
            <p style="margin-bottom: 0;">Supported only by Donations & Sponsorship</p>
            <p>Donate to, or sponsor afribeats "Talent Support Revolution" today and get a STAR up on the success podium</p>
            <div class="footer"><p class="btn-grey"><a href="https://www.paypal.com/donate/?hosted_button_id=42UQ84BW4GWVG" target="_blank">Donate</a></p></div>
        </div>
    </div>
</div>


@endsection