@extends('companies.layouts.master')

@section('title')Admin Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Създай автобус</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" method="post" action="{{route("company.createBus")}}">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Какво е името на автобуса</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Въведете име на автобуса">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Какъв е модела на автобуса </label>
            <input type="text" class="form-control" name="model" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Модел на автобуса ">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Колко места заема</label>
            <input type="text" class="form-control" name="seats" id="exampleInputPassword1" placeholder="Брой места">
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Създай автобус</button>
    </form>


@endsection

