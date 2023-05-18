@extends('admin.layouts.master')

@section("title")
    Вашите автобуси
@endsection

@section("content")

    <h1 class="col-12 text-center mb-2">Вашите автобуси <a href="{{route("admin.showUserCreate")}}"><i class="fas fa-plus"></i></a></h1>
{{----}}
    <div class="col-12 row ">

    @foreach($users as $user)
            <div class="col-4 mb-3 ">
                <div class="card col-11" >
                    <div class="card-body">
                        <h5 class="card-title">{{$user->name}}</h5>
                        <p class="card-text">{{$user->email}} </p>
                        <a href="{{route("admin.showUser", ["id" => $user->id])}}" class="btn btn-primary col-12">Виж още</a>
                    </div>
                </div>

            </div>
    @endforeach

    </div>
@endsection
