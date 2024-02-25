@extends('companies.layouts.master')


@section("content")
    <h1 class="col-12 text-center mb-2">Създайте предписание</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9 " action="{{route("company.createDestination")}}" method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Цена</label>
            <input type="number" step="0.1" class="form-control" name="price" id="exampleInputEmail1"
                   placeholder="Въведете цена">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Начален час</label>
            <input type="time" class="form-control" name="hour" id="exampleInputEmail1"
                   placeholder="Въведете цена">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Начална автобус</label>
            <select class="form-select" name="bus" id="">
                <option value="" disabled selected>Избери автобус</option>
                @forelse($buses as $bus)
                    <option value="{{$bus->id}}">{{$bus->name}}</option>
                @empty
                    <option value="" disabled>Нямате автобуси</option>
                @endforelse
            </select>
        </div>

        <div class="form-group col-12">
            <label for="exampleInputEmail1"></label>
            <select class="form-select" name="driver" id="">
                <option value="" disabled selected>Избери шофьор</option>
                @forelse($drivers as $driver)
                    <option value="{{$bus->id}}">{{$bus->name}}</option>
                @empty
                    <option value="" disabled>Нямате шофьор</option>
                @endforelse
            </select>
        </div>
        <button type="submit" class="btn btn-primary col-12 mt-3">Създай предписание</button>
    </form>


@endsection

