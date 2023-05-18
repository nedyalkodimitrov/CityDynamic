@extends('companies.layouts.master')

@section("title")
    Вашите автогари
@endsection

@section("content")

    <div class="col-12">
        <h1 class="col-12 text-center mb-2"> Дестинации <a class="btn btn-success"
                                                           href="{{route("company.showDestinationsForm")}}">+</a></h1>
    </div>
    <div class="col-12 row">
        @forelse($destinations as $destination)
            <div class="col-3 row">

                <div class="card col-11 row mx-auto" style="width: 18rem;">
                    <div class="card-body col-12">
                        <h5 class="card-title">{{$destination->name}}</h5>
                        <p class="card-text">{{$destination->getStartBusStation()->first()->name}} - {{$destination->getEndBusStation()->first()->name}} <i class="fas fa-map-marker-alt"
                                                                                                                                                            aria-hidden="true"></i></p>
                        <a href="{{route("company.showStation", ["id" => $destination->id])}}" class="btn btn-primary col-12">Виж още</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center" style="width: 100%; font-size: 1.1em;">Нямате наличи дестинации</p>
        @endforelse
    </div>
@endsection
