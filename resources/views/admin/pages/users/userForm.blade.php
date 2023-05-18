@extends('admin.layouts.master')

@section('title')
    Admin Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Създай компание</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" action="{{route("admin.createUser")}}" method="post">
       @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Имейл</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Модел на автобуса ">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Парола</label>
            <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Брой места">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Роля</label>
            <select class="form form-select" name="role">
                @foreach($roles as $role)
                    <option value="{{$role->id}}">
                        {{$role->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Създай автобус</button>
    </form>

@endsection

