@extends('admin.layouts.master')

@section('title')
    User Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Редактирай автобус</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" action="{{route("admin.editUser", ["id" => $user->id])}}"
          method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputEmail1"
                   placeholder="">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Имейл</label>
            <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp"
                   placeholder="Модел на автобуса ">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Роля</label>
            <select class="form form-select" name="role">

                @foreach($roles as $role)

                    @if($role->name == $user->getRoleNames()->first()))
                        <option selected value="{{$role->id}}">
                            {{$role->name}}
                        </option>
                    @else
                        <option value="{{$role->id}}">
                            {{$role->name}}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Създай автобус</button>
    </form>

@endsection

