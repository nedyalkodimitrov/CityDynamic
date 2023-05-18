@extends('stations.layouts.master')

@section("title")
    Дестинации
@endsection

@section("content")

    <h1 class="col-12 text-center mb-2">Дестинации <a href="{{route("station.showCompanyRequests")}}"><i class="fas fa-envelope"></i></a></h1>
    <div class="col-12 mx-auto row">
        @forelse($destinations as $destination)

            <div class="col-3">
                <div class="card col-11 mx-auto row" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$destination->name}}</h5>
                        <p class="card-text">  {{$destination->getCourses()->where("date" ,">", date("Y-m-d"))->count()}} предстоящи курсове</p>
                        <a href="{{route("station.showDestination", ["id" => $destination->id])}}" class="btn btn-primary col-12">Виж още</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center" style="width: 100%; font-size: 1.1em;">Няма налични дестинации</p>
        @endforelse
    </div>
@endsection
