@extends('companies.layouts.master')


@section("content")
    <h1 class="col-12 text-center mb-2">Създайте дестинация</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9 " action="{{route("company.createDestination")}}" method="post">
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име </label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Въведете име на компанията">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Начална автогара</label>
            <select class="form-select" name="startBusStation" id="">
                <option value=""  disabled selected>Избери автогара</option>
                @forelse($busStations as $station)
                    <option value="{{$station->id}}">{{$station->name}}</option>

                @empty
                    <option value=""  disabled >Нямате станции</option>
                @endforelse
            </select>
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Крайна автогара </label>
            <select class="form-select" name="endBustStation" id="">
                <option value="" disabled selected >Избери автогара</option>
                @forelse($busStations as $station)
                    <option value="{{$station->id}}">{{$station->name}}</option>

                @empty
                    <option value=""  disabled >Нямате станции</option>
                @endforelse
            </select>
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Създай дестинация</button>
    </form>


@endsection

