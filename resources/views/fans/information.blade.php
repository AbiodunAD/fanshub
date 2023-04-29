@extends('layouts.fans')

@section('title')
 Information - afribeats®
@endsection

@section('content')

    <h1>Information</h1>
    @foreach($pages as $page) 

    <div id="info-box">
        <h2>{{ $page->title }}</h2>
        <p>{{ $page->excerpt }}</p>
        <a href="{{ route('page.show', $page->slug) }}" target="_blank">Read More...</a>
    </div> 

    @endforeach    
@endsection



