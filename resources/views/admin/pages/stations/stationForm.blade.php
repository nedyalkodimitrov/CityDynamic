@extends('admin.layouts.master')

@section('title')
    Admin Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Създай автогара</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" action="{{route("admin.createStation")}}" method="post">
        @csrf
        <div>
            <labe for="image">Профилина снимка</labe>
            <input id="image" type="file" name="image" class="form-control">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">В кой град се намира</label>
            <select class="form form-select" name="admin">
                @foreach($cities as $city)
                    <option value="{{$city->id}}">
                        {{$city->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Кой ще администрира компанията</label>
            <select class="form form-select" name="admin">
                @foreach($users as $user)
                    <option value="{{$user->id}}">
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-12">
            <label for="contactEmail">Имейл за контакт</label>
            <input type="email" name="contactEmail" class="form-control" id="contactEmail">
        </div>
        <div class="form-group col-12">
            <label for="contactPhone">Телефон за контакт</label>
            <input type="text" name="contactPhone" class="form-control" id="contactPhone">
        </div>
        <div class="form-group col-12">
            <label for="contactAddress">Седалище на фирмата</label>
            <input type="text" name="contactAddress" class="form-control" id="contactAddress">
        </div>
        <button type="submit" class="btn btn-primary col-12 mt-3">Създай автогара</button>
    </form>

@endsection

