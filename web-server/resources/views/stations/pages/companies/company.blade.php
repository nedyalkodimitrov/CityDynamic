@extends('stations.layouts.master')

@section("title")
    Компания
@endsection

@section("content")
    <div class="card col-12 row p-0 m-2">
        <div class="card-body ">
            <div class="card-title row justify-content-between">
                <img style="max-width:200px; margin: auto" src="{{asset("assets/images/".$company->profile_photo)}}" alt="">
                <h4 class="col-12 text-center">{{$company->name}} </h4>
            </div>
            <h4>Осъществява дейността си:</h4>
            @forelse($company->stations as $station)
                <p class="card-text"><i class="fas fa-map-marker-alt" aria-hidden="true"></i>  {{$station->name}}
                </p>
            @empty
                <p class="text-center" style="width: 100%; font-size: 1.1em;">Тази автогара още няма компании</p>
            @endforelse

            <h4>Автобуси, които има:</h4>
            @forelse($company->buses as $bus)
                <p class="card-text"><i class="fas fa-bus"></i>  {{$bus->name}} ({{$bus->model}}) - {{$bus->seats}} места
                </p>
            @empty
                <p class="text-center" style="width: 100%; font-size: 1.1em;">Тази автогара още няма компании</p>
            @endforelse

            <h4>Изпълняващи дестинации</h4>
            @foreach($company->destinations as $destination)
                <p>{{$destination->name}}({{$destination->startStation->name}} - {{$destination->endStation->name}})</p>
            @endforeach
        </div>
    </div>

@endsection

