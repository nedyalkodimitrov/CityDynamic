@extends('admin.layouts.master')

@section('title')Admin Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Редактирай автобус</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9">
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Какво е името на автобуса</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Falcon">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Какъв е модела на автобуса </label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mercedes ">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Колко места заема</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="24">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Сегашна станция</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Монтана</option>
                <option value="1">Разград</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Редактирай автобус</button>
    </form>


@endsection

