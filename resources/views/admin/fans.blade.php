@extends('layouts.admin')

@section('title')
 Fans - afribeats®
@endsection

@section('content')
 <h1>All Fans</h1>  <a href="{{ route('fan.create') }}" type="button" class="btn btn-primary float-right addnewbtn">Add New Fan</a>
 <div id="dashbox-slim">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Profession</th>
                    <th class="tabimg">Profile Photo</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @foreach($users as $user)                                       
                <tr>
                    <td>{{ $user->id }}</td>
                    
                    <td><a href="{{ route('fansprofile', $user->first_name) }}">{{ $user->first_name }}</a></td>
                    <td><a href="{{ route('fansprofile', $user->first_name) }}">{{ $user->last_name }}</a></td>
                    
                    <td>{{ $user->profession }}</td>
                    <td class="tabimg">
                        <img src="{{ $user->profilephoto ? asset( 'storage/media/' . $user->profilephoto ) : asset( 'img/iuser.png' ) }}">
                    </td>                
                    <td>@if($user->status == 0) Inactive @else Active @endif</td>
                    <td>
                        <a href="{{ route('status', $user->id) }}" class="btn btn-primary"style="width:100%;">Change Status</a>
                        <br>
                        <a href="{{ route('fan.edit', $user->id) }}" class="btn btn-success" style="width:100%;">Edit</i></a>
                        <br>
                        <div id="userdelete">
                            <a href="#" onclick="cDelete()" id="fandelete">
                            <button class="btn btn-danger" style="width:100%;">Delete</button>
                            </a>
                            <div id="confirm-dele">
                                <p>Are you sure you want to delete this Fan?</p>
                                <form action="{{ route('fan.delete', $user->id) }}" method="POST">
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