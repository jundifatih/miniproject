@extends('layouts.master')
@section('title', 'My Profile')

@section('content')
    <div class="d-flex align-items-start gap-5">
        <img src="{{('image/default_profile.png')}}" style="border-radius:50%;" width="150" height="150" alt="">
        <div>
            <h5>{{$user->username}}</h4>
            <div class="d-flex gap-2">
                <p>0 <span class="fw-normal">Post</span></p>
                <p>0 <span class="fw-normal">Followers</span></p>
                <p>0 <span class="fw-normal">Following</span></p>
            </div>
            <p class="mt-0">{{$user->name}}</h4>
        </div>
    </div>
    <a href="" class="text-end text-light text-decoration-none">
        <i class="bi bi-gear-fill"></i> Setting
    </a>
@endsection