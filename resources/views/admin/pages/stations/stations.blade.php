@extends('admin.layouts.master')

@section("title")
    Вашите автобуси
@endsection

@section("content")

    <h1 class="col-12 text-center mb-4" style="position:relative;">Автогари  <a style="position: absolute; right: 0" class="btn btn-success"
                                                                                                                                  href="{{route("admin.showStationCreate")}}"> Създай автогара </a></h1>
    {{----}}
    <div class="col-12 row ">

        @foreach($stations as $station)
            <div class="col-4 mb-3 ">
                <div class="card col-11" >
                    <div class="card-body">
                        <h5 class="card-title">{{$station->name}}</h5>
                        <a href="{{route("admin.showStation", ["id" => $station->id])}}" class="btn btn-primary col-12">Виж още</a>
                    </div>
                </div>

            </div>
        @endforeach

    </div>
@endsection
