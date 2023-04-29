@extends('layouts.admin')

@section('title')
 Admin Dashboard - afribeats®
@endsection

@section('content')
 <h1>Welcome, Admin {{ $user->first_name }}</h1>

 <div class="dash-box">
    <div class="dash-box-left">
        <p>Fans Count</p>
        <p class="big-data">{{ $users }}</p>
        <div class="btn-grey"><a href="{{ route('fans.list') }}">Manage Fans</a></div>
    </div>

    <div class="dash-box-right">
        <p>Postcards Count</p>
        <p class="big-data">{{ $postcards }}</p>
        <div class="btn-grey"><a href="{{ route('postcards') }}">View Postcards</a></div>
    </div>
 </div>
@endsection