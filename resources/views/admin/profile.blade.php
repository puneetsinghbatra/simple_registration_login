@extends('layouts.site') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    @if(Session::has('user_updated'))
                    <div class="alert alert-success alert-dismissible fade  show">
                        <strong>Well done!</strong>
                        {{session('user_updated')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                           <img src="{{asset('storage/avtars/'.$user_info->profile_picture)}}" class="img-fluid rounded-circle">
                        </div>
                        <div class="col-md-4 offset-md-2">
                            <a href="{{route('editprofile')}}" class="btn btn-info">Edit Profile</a>
                        </div>
                    </div><!--.row -->
                </div>

                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <strong>User Type</strong>
                        </div>
                        <div class="col-md-6 capitalize-text">
                            {{$user_info->user_type}}
                        </div>
                    </div>
                    <!--.row -->
                    <div class="row">
                        <div class="col-md-4">
                            <strong>First Name</strong>
                        </div>
                        <div class="col-md-6 capitalize-text">
                            {{$user_info->first_name}}
                        </div>
                    </div>
                    <!--.row -->
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Last Name</strong>
                        </div>
                        <div class="col-md-6 capitalize-text">
                            {{$user_info->last_name}}
                        </div>
                    </div>
                    <!--.row -->
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Email</strong>
                        </div>
                        <div class="col-md-6">
                            {{$user_info->email}}
                        </div>
                    </div>
                    <!--.row -->
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Username</strong>
                        </div>
                        <div class="col-md-6">
                            {{$user_info->username}}
                        </div>
                    </div>
                    <!--.row -->
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Address</strong>
                        </div>
                        <div class="col-md-6">
                            {{$user_info->address}}
                        </div>
                    </div>
                    <!--.row -->
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Gender</strong>
                        </div>
                        <div class="col-md-6 capitalize-text">
                            {{$user_info->gender}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Date Of Birth</strong>
                        </div>
                        <div class="col-md-6">
                            {{ date("d F Y",strtotime($user_info->date_of_birth)) }}
                        </div>
                    </div>
                    <!--.row -->
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Hobbies</strong>
                        </div>
                        <div class="col-md-6 capitalize-text">
                            {{$user_info->hobbies}}
                        </div>
                    </div>
                    <!--.row -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection