{{-- @extends('layouts.master') --}}
{{-- @section('title', 'Register User') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- Link Icon Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Link CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-black">

    <div class="mt-5 p-5">
        <h1 class="h3 mb-3 fw-normal text-center fw-bold text-white">Login</h1>

        <!-- error message -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- success message -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-center gap-5 p-3 flex-wrap ">
            <img src="{{('image/logo-medsos.png')}}" alt="logo" width="150" height="150" class="mt-5">
            <form action="{{ route('login_user') }}" method="POST">
                @csrf

                <div class="form-group mb-3 text-white fw-bold">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"class="form-control mt-2" style="width: 400px;" placeholder="Masukan Username Kamu" required>
                    @error('username')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group mb-3 text-white fw-bold">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control mt-2" style="width: 400px;" placeholder="Masukan Password Kamu" required>
                    @error('password')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-light fw-bold px-5 py-1">Login</button>

                <p class="mt-3 text-center text-white">Belum punya akun? <a href="{{route('get_register')}}" class="fw-bold text-decoration-none text-white">Register</a></p>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
{{-- @endsection --}}