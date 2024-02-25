@extends('companies.layouts.master')

@section('title')
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Създай курс</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" action="{{route("company.createCourse")}}" method="post">
        @csrf
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Потребители</label>
            <input type="number" name="price" step="0.1" class="form-control" id="exampleInputPassword1"
                   placeholder="Каква е цената на билетите">
        </div>


        <button type="submit" class="btn btn-primary col-12 mt-3">Създай курс</button>
    </form>

@endsection

