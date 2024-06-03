@extends('layouts.master')
@section('title', 'Home')
@section('content')

    {{-- Content Post --}}
    <div class="d-flex flex-column-reverse gap-2">
        @foreach ($posts as $post)
            <div class="card p-4 bg-black text-white" style="width: 400px; border:1px solid white;">
                <div class="d-flex justify-content-between mb-2">
                    <div class="d-flex text-white gap-3">
                        <img src="{{('image/default_profile.png')}}" style="border-radius: 50%" alt="profile" width="35" height="35">
                        <div>
                            <p class="my-0" style="font-size: 12px">{{$post->user->username}}</p>
                            <p style="font-size: 8px">{{$post->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                    <a href="">
                        <i class="bi bi-bookmark text-white"></i>
                    </a>
                </div>
                <p class="fw-normal">{{$post->description}}</p>
                <img src="{{$post->image}}" class="card-img-top border border-radius-3" alt="...">
                <div class="d-flex mt-2 gap-3">
                    <div class="d-flex gap-2">
                        <a href="">
                            <i class="bi bi-heart" style="color: white"></i>
                        </a>
                        <p>1 Likes</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="">
                            <i class="bi bi-chat" style="color: white"></i>
                        </a>
                        <p>0 Comments</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    {{-- Content yang harus diikuti --}}
    <div class="align-self-end" style="width: 300px;">
        <div class="">
            <h4 class="fw-bold">Siapa yang harus diikuti</h4>
            <p class="text-dark" style="font-size: 10px">Orang yang mungkin anda kenal</p>
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex text-white gap-3">
                    <img src="{{('image/default_profile.png')}}" style="border-radius: 50%" alt="profile" width="35" height="35">
                    <div>
                        <p class="my-0" style="font-size: 12px">Imronrev</p>
                        <p style="font-size: 8px">Imron Reviady</p>
                    </div>
                </div>
                <a href="" class="text-decoration-none fw-bold">
                    Follow
                </a>
            </div>
        </div>
    </div>
@endsection