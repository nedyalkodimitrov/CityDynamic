@extends('companies.layouts.master')

@section('title')
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Създай курс</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" action="{{route("company.createCourse")}}" method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Дестинация</label>
            <select class="form-select" name="destination" id="">
                <option value="" disabled selected>Избери дестинация</option>
                @forelse($destinations as $destination)
                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                @empty
                    <option value="" disabled>Нямате дестинации</option>
                @endforelse
            </select>

        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Автобус</label>
            <select class="form-select" name="bus" id="">
                <option value="" disabled selected>Избери автобус</option>
                @forelse($buses as $bus)
                    <option value="{{$bus->id}}">{{$bus->name}} {{$bus->model}} - ({{$bus->seats }} места)</option>
                @empty
                    <option value="" disabled>Нямате автобуси</option>
                @endforelse
            </select>
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Дата </label>
            <input type="date" name="date" class="form-control" id="exampleInputPassword1" placeholder="Избрете дата">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Време на тръгване</label>
            <input type="time" name="startTime" class="form-control" id="exampleInputPassword1" placeholder="Избрете време">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Време на пристигане</label>
            <input type="time" name="endTime" class="form-control" id="exampleInputPassword1"
                   placeholder="Избрете време">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Цена на билетите </label>
            <input type="number" name="price" step="0.1" class="form-control" id="exampleInputPassword1"
                   placeholder="Каква е цената на билетите">
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Създай курс</button>
    </form>
@endsection

