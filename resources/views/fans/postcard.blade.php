@extends('layouts.postcard')

@section('title')
 Postcards - afribeats®
@endsection

@section('content')
    
    @include('includes.message-block')

    <div id="postcard">
        <div class="postcard">

            @include('includes.upcform')

        </div>
    </div>
    
    @foreach($postcards as $postcard)  
    <div id="postfeed">
        <a href="{{ route('fanprofile', $postcard->user->first_name) }}">
        <div id="postprofile">
            <div class="ppimg">
                {{-- <a href="{{ route('singlepostcard', $postcard->id) }}"> --}}
                    <img src="{{ $postcard->user->profilephoto ? asset( 'storage/media/' . $postcard->user->profilephoto ) : asset( 'img/iuser.png' ) }}">
                {{-- </a> --}}
            </div>
            <div class="ppdetail">
                <p class="ppu-name">{{ $postcard->user->first_name }} {{ $postcard->user->last_name }}</p>
                <p class="ppu-aliase">{{ $postcard->user->profession }}</p>
            </div>
        </div>
        </a>

        @include('includes.pscard')

        @include('includes.modalcard')
        
    </div>
    @endforeach

@endsection


@section('scripts')


@endsection

