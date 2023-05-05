@extends('companies.layouts.master')

@section("title")
    Вашите автогари
@endsection

@section("content")

    <h1 class="col-12 text-center mb-2">Свързани автогари</h1>
    @forelse($connectedStations as $station)

        <div class="card col-12 row" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$station->name}}</h5>
                <p class="card-text"> | 25 <i class="fas fa-users"></i>|Монтана <i class="fas fa-map-marker-alt"
                                                                                   aria-hidden="true"></i></p>
                <a href="{{route("company.showStation", ["id" => $station->id])}}" class="btn btn-primary col-12">Виж още</a>
            </div>
        </div>
    @empty
            <p class="text-center" style="width: 100%; font-size: 1.1em;">Нямате наличи връзки с автогари</p>
    @endforelse
    <h1 class="col-12 text-center mb-2">Налични автогари</h1>
    @foreach($notConnectedStations as $station)

        <div class="card col-3 row" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$station->name}}</h5>
                <p class="card-text"> | {{count($station->getCompanies)}} <i class="fas fa-users"></i>|{{$station->getCity->name}}, {{$station->getCity->getCountry->name}} <i class="fas fa-map-marker-alt"
                                                                                   aria-hidden="true"></i></p>
                <a href="{{route("company.showStation", ["id" => $station->id])}}" class="btn btn-primary col-12">Виж още</a>
            </div>
        </div>
    @endforeach
@endsection
