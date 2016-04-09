@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">


                    <table class="table table-striped">
                        <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Facebook ID</th>
                                <th>Friends</th>
                                <th>Likes</th>
                                <th>Created At</th>
                                <th>Created By</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($fb_users as $fb_user)
                            <tr>
                                <th scope="row">{{$fb_user->id}}</th>
                                <td>{{$fb_user->name}}</td>
                                <td>{{$fb_user->email}}</td>
                                <th>{{$fb_user->fb_id}}</th>
                                <td>{{$fb_user->user_friends}}</td>
                                <td>{{$fb_user->user_likes}}</td>
                                <th>{{$fb_user->created_at}}</th>
                                <th>{{$fb_user->updated_at}}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
