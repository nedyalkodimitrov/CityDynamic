@extends('admin.layouts.master')

@section('title')Admin Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Създай компание</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9">
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Какво е името на компанията</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Въведете име на компанията">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Какъв е модела на автобуса </label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Модел на автобуса ">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Колко места заема</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Брой места">
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Създай автобус</button>
    </form>


@endsection

