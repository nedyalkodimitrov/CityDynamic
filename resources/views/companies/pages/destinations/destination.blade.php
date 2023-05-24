@extends('companies.layouts.master')


@section("content")
    <h1 class="col-12 text-center mb-2">Редактирай дестинация</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9 " action="{{route("company.editDestination", ["id" => $destination->id])}}" method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име </label>
            <input type="text" class="form-control" name="name" value="{{$destination->name}}" id="exampleInputEmail1" placeholder="Въведете име на компанията">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Начална автогара</label>
            <select class="form-select" name="startBusStation" id="">
                <option value=""  disabled selected>Избери автогара</option>
                @forelse($busStations as $station)
                    @if($station->id == $destination->startBusStation)
                    <option selected value="{{$station->id}}">{{$station->name}}</option>
                    @else
                        <option value="{{$station->id}}">{{$station->name}}</option>

                    @endif

                @empty
                    <option value=""  disabled >Нямате станции</option>
                @endforelse
            </select>
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Крайна автогара</label>
            <select class="form-select" name="endBusStation" id="">
                <option value="" disabled selected >Избери автогара</option>
                @forelse($busStations as $station)
                    @if($station->id == $destination->endBusStation)
                        <option selected value="{{$station->id}}">{{$station->name}}</option>
                    @else
                        <option value="{{$station->id}}">{{$station->name}}</option>

                    @endif
                @empty
                    <option value=""  disabled >Нямате станции</option>
                @endforelse
            </select>
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Редактирай дестинация</button>
    </form>


@endsection

