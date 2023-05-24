@extends('companies.layouts.master')

@section('title')User Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Редактирай автобус</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" method="post" action="{{route("company.editBus",["id" => $bus->id])}}">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Какво е името на автобуса</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Falcon" value="{{$bus->name}}">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Какъв е модела на автобуса </label>
            <input type="text" class="form-control" name="model" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$bus->model}}" placeholder="Mercedes ">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Колко места заема</label>
            <input type="text" class="form-control" name="seats" id="exampleInputPassword1" value="{{$bus->seats}}" placeholder="24">
        </div>
{{--        <div class="form-group col-12 mt-3">--}}
{{--            <label for="exampleInputPassword1">Сегашна станция</label>--}}
{{--            <select class="form-select" aria-label="Default select example">--}}

{{--                <option selected>Монтана</option>--}}
{{--                <option value="1">Разград</option>--}}
{{--            </select>--}}
{{--        </div>--}}

        <button type="submit" class="btn btn-primary col-12 mt-3">Редактирай автобус</button>
    </form>


@endsection

