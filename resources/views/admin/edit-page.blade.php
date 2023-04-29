@extends('layouts.admin')

@section('title')
 Edit {{ $page->title }} - afribeats®
@endsection


@section('content')
 <h1>Edit {{ $page->title }}</h1>

    <div id="dashbox">
        <div class="log-form">

            <form method="post" action="{{ route('page.update', $page->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div>
                    <label>Edit Page Title:</label>
                    <input type="text" name="title" value="{{ $page->title }}" required autofocus />
                    @error('title')
                        <p>{{ $page->title }}</p>
                    @enderror
                </div>

                <div>
                    <label>Edit Page Slug:</label>
                    <input type="text" name="slug" value="{{ $page->slug }}" required autofocus />
                    @error('slug')
                        <p>{{ $page->slug }}</p>
                    @enderror
                </div>

                <div>
                    @error('body')
                        <p>{{ $page->body }}</p>
                    @enderror
                    <label style="margin-bottom:20px;">Edit Page Content:</label>
                    <textarea id="summernote" name="body">{{ $page->body }}</textarea>
                </div>

                <div>
                    <label>Edit Page Excerpt:</label>
                    <input type="text" name="excerpt" value="{{ $page->excerpt }}" required autofocus />
                    @error('excerpt')
                        <p>{{ $page->excerpt }}</p>
                    @enderror
                </div>

                <p>&nbsp;</p>
                <div class="flex items-center gap-4">
                    <button type="submit">Publish</button>
                </div>
                <button><a href="{{ route('pages.all') }}">Cancel</a></button>
            </form>
    
            
        </div>
    </div>    
@endsection