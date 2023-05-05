@extends('admin.layouts.master')

@section('title')
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Създай курс</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9">
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Дестинация</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Въведете име на компанията">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Автобус </label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Избери автобус ">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Избери шофьор </label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Брой места">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Избери шофьор </label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Брой места">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Дата </label>
            <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Избрете дата">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Време </label>
            <input type="time" class="form-control" id="exampleInputPassword1" placeholder="Избрете време">
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Създай автобус</button>
    </form>


@endsection

