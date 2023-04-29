@extends('layouts.admin')

@section('title')
 Pages - afribeats®
@endsection

@section('content')
 <h1>Information Pages</h1> <a href="{{ route('page.create') }}" type="button" class="btn btn-primary float-right addnewbtn">Add New Page</a>
 <div id="dashbox-slim">

    @include('includes.message-block')

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @foreach($pages as $page)                                       
                <tr>                    
                    <td><a href="{{ route('page.show', $page->slug) }}" target="_blank">{{ $page->title }}</a></td>
                    <td>{{ $page->excerpt }}</td>
                    <td>
                        <a href="{{ route('page.edit', $page->id) }}" class="btn btn-success" style="width:100%;">Edit</i></a>
                        <br>
                        <div id="userdelete">
                            <a href="#" onclick="cDelete()" id="fandelete">
                            <button class="btn btn-danger" style="width:100%;">Delete</button>
                            </a>
                            <div id="confirm-dele">
                                <p>Are you sure you want to delete this Page?</p>
                                <form action="{{ route('page.delete', $page->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger" style="width:100%;">Yes Delete</button>
                                    <span class="btn btn-success" style="width:100%;" onclick="cDelete()">Cancel Delete</span>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
 </div>
@endsection