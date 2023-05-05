@extends('admin.layouts.master')

@section("title")
    Вашите автобуси
@endsection

@section("content")

    <h1 class="col-12 text-center mb-2">Вашите автобуси</h1>

    @foreach($buses as $bus)
        <div class="card col-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$bus->name}}</h5>
                <p class="card-text">{{$bus->model}} | {{$bus->seats}} <i
                        class="fas fa-users"></i>|{{$bus->currentStation}} <i class="fas fa-map-marker-alt"
                                                                              aria-hidden="true"></i></p>
                <a href="{{route("company.showBus", ["id" => $bus->id])}}" class="btn btn-primary col-12">Виж още</a>
            </div>
        </div>

    @endforeach
@endsection
