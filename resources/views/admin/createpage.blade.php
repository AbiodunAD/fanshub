@extends('layouts.admin')

@section('title')
 Creat New Page - afribeats®
@endsection

@section('content')
<h1>Creat a New Page</h1>
<div id="dashbox">
    <div class="log-form">

        <form method="post" action="{{ route('page.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <label>Enter Page Slug:</label>
                <input type="text" name="slug" placeholder="Page Slug:" required autofocus />
            </div>

            <div>
                <label>Enter Page Title:</label>
                <input type="text" name="title" placeholder="Page Title:" required autofocus />
            </div>
           
            <div>
                <label style="margin-bottom:20px;">Enter Page Content:</label>
                <textarea id="summernote" name="body"></textarea>
            </div>

            <div>
                <label>Enter Page Excerpt:</label>
                <input type="text" name="excerpt" placeholder="Enter Excerpt:" required autofocus />
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