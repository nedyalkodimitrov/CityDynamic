@extends('admin.layouts.master')

@section('title')
    Admin Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Редактирай автобусна станция</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" action="{{route("admin.editStation", ["id" => $station->id])}}" method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$station->name}}" placeholder="">
        </div>

        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Админ</label>
            <select class="form form-select" name="city">
                @foreach($cities as $city)
                    @if($city->id == $station->city)
                        <option selected value="{{$city->id}}">
                            {{$city->name}}
                        </option>
                    @else
                        <option value="{{$city->id}}">
                            {{$city->name}}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Админ</label>
            <select class="form form-select" name="admin">
                @foreach($users as $user)
                    <option value="{{$user->id}}">
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Запамети промените</button>
    </form>

@endsection

