@extends('stations.layouts.master')

@section("title")
    Компания
@endsection

@section("content")
    <div class="card col-12 row p-0 m-2">
        <div class="card-body ">
            <div class="card-title row justify-content-between">
                <h4 class="col-12 text-center">{{$company->name}} </h4>

            </div>
            <h5>Осъществява дейността си:</h5>
            @forelse($company->getStations as $station)

                <p class="card-text"><i class="fas fa-map-marker-alt" aria-hidden="true"></i>  {{$station->name}}
                </p>
            @empty
                <p class="text-center" style="width: 100%; font-size: 1.1em;">Тази автогара още няма компании</p>

            @endforelse

            <h5>Автобуси, които има:</h5>
            @forelse($company->getBuses as $bus)

                <p class="card-text"><i class="fas fa-bus"></i>  {{$bus->name}} ({{$bus->model}}) - {{$bus->seats}} места
                </p>
            @empty
                <p class="text-center" style="width: 100%; font-size: 1.1em;">Тази автогара още няма компании</p>

            @endforelse


            <h5>Изпълняващи дестинации </h5>

            @foreach($company->getDestinations as $destination)

                <p>{{$destination->name}} <br>
                    {{$destination->getStartBusStation->name}} - {{$destination->getEndBusStation->name}}</p>
            @endforeach



        </div>
    </div>

@endsection

