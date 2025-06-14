@extends('admin.layouts.master')

@section('title')
    Admin Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Създай компания</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" action="{{route("admin.createCompany")}}" method="post"
          enctype="multipart/form-data">
        @csrf
        <div>
            <labe for="image">Профилина снимка</labe>
            <input id="image" type="file" name="image" class="form-control">
        </div>
        <div class="form-group col-12">
            <label >Име</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="">
        </div>

        <div class="form-group col-12 ">
            <label>Кой ще администрира компанията</label>
            <select class="form form-select" name="admin">
                @foreach($users as $user)
                    <option>Избери потребител</option>
                    <option value="{{$user->id}}">
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-12">
            <label for="foundedAt">Регистрация на компанията</label>
            <input type="date" name="foundedAt" class="form-control" id="foundedAt">
        </div>
        <div class="form-group col-12">
            <label for="description">Описание</label>
            <input type="text" name="description" class="form-control" id="description">
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
        @if($errors->any())
            <div class="alert alert-danger mt-2">
                @foreach($errors->all() as $error)
                    <p class="m-0 p-0">{{$error}}</p>
                @endforeach
            </div>
        @endif
        <button type="submit" class="btn btn-primary col-12 mt-3">Създай компания</button>
    </form>
@endsection

