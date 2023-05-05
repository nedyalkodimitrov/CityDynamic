@extends('admin.layouts.master')

@section("title")Вашите автобуси@endsection

@section("content")

    <h1 class="col-12 text-center mb-2">Вашите автобуси</h1>

    <div class="card col-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Falcon</h5>
            <p class="card-text">Mercedes | 25 <i class="fas fa-users"></i>|Монтана  <i class="fas fa-map-marker-alt" aria-hidden="true"></i> </p>
            <a href="#" class="btn btn-primary col-12">Виж още</a>
        </div>
    </div>

{{--    <div class="card col-3" style="width: 18rem;">--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="card-title">{{$bus->name}}</h5>--}}
{{--            <p class="card-text">{{$bus->model}}|{{$bus->seats}}|{{$bus->currentStation}}</p>--}}
{{--            <p class="card-text">{{$bus->model}}</p>--}}
{{--            <a href="#" class="btn btn-primary">Виж още</a>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
