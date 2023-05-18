@extends('admin.layouts.master')

@section('title')
    Admin Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Създай компание</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" action="{{route("admin.editCompany", ["id" => $company->id])}}"
          method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$company->name }}">
        </div>

        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Админисратор</label>
            <select class="form form-select" name="admin">
                <option selected value="{{$company->getAdmin->id}}">
                    {{$company->getAdmin->name}}
                </option>

                @foreach($users as $user)
                    <option value="{{$user->id}}">
                        {{$user->name}}
                    </option>

                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Създай автобус</button>
    </form>

@endsection

