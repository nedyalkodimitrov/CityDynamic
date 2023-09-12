@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")

    <hr>
    <div class="card col-11 col-md-10 col-lg-9 mx-auto">
        <div class="card-title m-0">
            <h3 class="pt-3 text-center">
                Профил
            </h3>
        </div>
        <div class="card-body">
            <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" style="position: relative;
    left: 50%;
    transform: translate(-50%, 0);" height="80" alt="" loading="lazy">
            <p class="text-center mt-1">{{\Illuminate\Support\Facades\Auth::user()->name}}
                ({{\Illuminate\Support\Facades\Auth::user()->email}})</p>
            <p class=""><b>Регистриран на:</b> {{\Illuminate\Support\Facades\Auth::user()->created_at}}</p>
        </div>

    </div>

@endsection
