<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Mini Project')</title>
    {{-- Link Icon Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Link CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <style>
        *{
            margin: 0;
        }
        .cont{
            display: flex;
            /* align-items: flex-start; */
        }
        #sidebar{
            flex-basis: 15%;
            background-color: black;
            color: white;
            /* height: 100vh; */
            /* border-right: 2px solid white; */
        }
        #content{
            flex-basis: 85%;
            background-color: rgb(0, 0, 0);
        }
        #warning{
            position: sticky;
            width: 100%;
            bottom: 3%;
            background-color: rgb(143, 202, 202);
        }
    </style>
<body class="bg-black">
    
    <div class="d-flex">

        {{-- Sidebar --}}
        <div class="" id="sidebar">
            <div>
                <div class="d-flex p-3 gap-2 pb-0">
                    @auth
                        <img src="{{('image/default_profile.png')}}" style="border-radius: 50%" width="30" height="30" alt="">
                        <div>
                            <a href="{{route('my_profile')}}" class="text-decoration-none text-white">
                                <h6 class="mb-0 fw-bold">{{Auth::user()->username}}</h6>
                                <p style="font-size: 10px;">{{Auth::user()->name}}</p>
                            </a>
                        </div>
                    @else
                    <img src="{{('image/logo-medsos.png')}}" width="30" height="30" alt="">
                    <div>
                        <h6 class="mb-1 fw-bold">Silahkan Login Dahulu</h6>
                        <p style="font-size: 10px;">Ayo Login</p>
                    </div>
                    @endauth
                </div>
                <hr class="border border-2 border-light"></hr>
                <div class="d-flex flex-column gap-3 p-3">
                    <div class="d-flex gap-4 fw-bold">
                        <i class="bi bi-house-door-fill" style="color: aqua"></i>
                        <a href="{{route('home')}}" class="text-white text-decoration-none">Beranda</a>
                    </div>
                    <div class="d-flex gap-4 fw-bold">
                        <i class="bi bi-search" style="color: aqua"></i>
                        <a href="" class="text-white text-decoration-none">Explore</a>
                    </div>

                    @auth
                    <div class="d-flex gap-4 fw-bold">
                        <i class="bi bi-bell-fill" style="color: aqua"></i>
                        <a href="" class="text-white text-decoration-none">Notifikasi</a>
                    </div>
                    <div class="d-flex gap-4 fw-bold">
                        <i class="bi bi-plus-lg" style="color: aqua"></i>
                        <a href="{{route('form_post')}}" class="text-white text-decoration-none">Posting</a>
                    </div>
                    <div class="d-flex gap-4 fw-bold">
                        <i class="bi bi-bookmark-fill" style="color: aqua"></i>
                        <a href="" class="text-white text-decoration-none">Bookmarks</a>
                    </div>
                    <div class="d-flex gap-4 fw-bold">
                        <i class="bi bi-arrow-left" style="color: aqua"></i>
                        <a href="{{route('logout')}}" class="text-white text-decoration-none">Logout</a>
                    </div>

                    @else
                    <div class="d-flex gap-4 fw-bold">
                        <i class="bi bi-arrow-left" style="color: aqua"></i>
                        <a href="{{route('get_login')}}" class="text-white text-decoration-none">Login</a>
                    </div>
                    @endauth
                </div>  
            </div>
        </div>

        {{-- Content Navbar--}}
        <div class=" pt-2 text-white fw-bold" id="content">
            <div class="d-flex justify-content-center my-3">
                <img src="{{('image/logo-medsos.png')}}" width="30" height="30" alt="logo">
            </div>
            <div class="d-flex justify-content-center gap-5">
                <a href="{{route('home')}}" style="font-size: 12px" class="text-decoration-none text-white">For You</a>
                <a href="" style="font-size: 12px" class="text-decoration-none text-white">Following</a>
            </div>

            <div class="d-flex justify-content-evenly mx-1 my-5 gap-4 flex-wrap-reverse">

                @yield('content')
                
            </div>
            <p class="text-dark text-center mt-5" style="font-size: 12px">Copyright 2024</p>
        </div>
    </div>

    {{-- Login & Register Warning --}}
    @if(!Auth::user())
    <div id="warning">
        <div class="d-flex justify-content-around align-items-center py-3 px-4 gap-2">
            <div class="text-white">
                <h6 class="fw-bold my-0">Jangan ketingalan berita terbaru</h6>
                <p class="my-0" style="font-size: 11px">login, untuk pengalaman yang baru</p>
            </div>
            <div class="d-flex gap-3">
                <a href="{{route('get_login')}}">
                    <button class="btn btn border text-white fw-bold">Login</button>
                </a>
                <a href="{{route('get_register')}}">
                    <button class="btn btn-light border text-dark fw-bold">Register</button>
                </a>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>