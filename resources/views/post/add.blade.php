@extends('layouts.master')
@section('title', 'Form Post')

@section('content')
    <div class="border rounded-1 py-2 px-3">
        <div class="d-flex justify-content-between gap-2">
            <img src="{{('image/default_profile.png')}}" class="rounded-circle" alt="profile" width="25" height="25">
            <h6>{{Auth::user()->username}}</h6>
            <i class="bi bi-three-dots"></i>
        </div>
        <form action="{{route('form_add')}}" method="POST" class="mt-3">
            @csrf
            
            <textarea name="description" id="description" placeholder="Deskripsi postingan" cols="50" rows="1" class="fw-normal bg-black border-0 text-white" style="font-size: 11px" required></textarea>
            @error('description')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror

            <div class="border rounded-1 py-5 text-center">
                <label for="image">Pilih Gambar</label>
                <input type="file" id="image" name="image" placeholder="Pilih Gambar" accept="image/png, image/jpg, image/jpeg" required>
                {{-- @error('image')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror --}}
            </div>

            <button class="btn btn-primary mt-1 py-1 px-3 fw-bold" style="font-size: 11px" type="submit">Posting</button>
        </form>
    </div>
@endsection