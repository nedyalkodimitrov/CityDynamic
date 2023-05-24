@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")

    <div class="card">
        <div class="card-title">
            <h3 class="p-3">
                Профил
            </h3>
        </div>
        <div class="card-body">
                <p>Име:{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                <p>Имейл: {{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                <p>В системата от: {{\Illuminate\Support\Facades\Auth::user()->created_at}}</p>
        </div>

    </div>

@endsection
