@extends('stations.layouts.master')

@section("title")
    Заявка от {{$company->name}}
@endsection

@section("content")
    <h2 class="text-center">Заявка от компания</h2>
    <div class="card col-12 row p-0 m-2">
        <div class="card-body ">
            <div class="card-title row justify-content-between">
                <div class="mx-auto row">
                    <img style="width: 200px; " class="mx-auto" src="{{asset("assets/images/".$company->image)}}"
                         alt="">
                </div>
                <h4 class="col text-center">{{$company->name}} </h4>
            </div>
            <div>
                <h5>Осъществява дейността си:</h5>
                <div class="col-12 pl-4" style="padding-left: 1em">
                    @forelse($company->getStations as $station)

                        <p class="card-text  m-0"><i class="fas fa-map-marker-alt"
                                                     aria-hidden="true"></i> {{$station->name}}
                        </p>
                    @empty
                        <p class="text-center" style="width: 100%; font-size: 1.1em;">Тази автогара още няма
                            компании</p>

                    @endforelse

                </div>
            </div>
            <div class="mt-3">
                <h5>Автобуси, които има:</h5>
                <div  class="col-12 pl-4" style="padding-left: 1em">
                    @forelse($company->getBuses as $bus)

                        <p class="card-text  m-0"><i class="fas fa-bus"></i> {{$bus->name}} ({{$bus->model}})
                            - {{$bus->seats}} места
                        </p>
                    @empty
                        <p class="text-center" style="width: 100%; font-size: 1.1em;">Тази автогара още няма
                            компании</p>

                    @endforelse

                </div>

            </div>
{{--            <h5>Изпълняващи дестинации </h5>--}}
{{--            {{$company->getDestinations->count()}} <br>--}}

            <div class="row col-12 mt-4">

                <form action="{{route("station.decCompanyRequest",["id" => $company->id])}}" method="post"
                      class="col-6">
                    @csrf
                    <button
                        class="btn btn-danger col-12">Decline
                    </button>

                </form>
                <form action="{{route("station.acceptCompanyRequest",["id" => $company->id])}}" method="post"
                      class="col-6">
                    @csrf
                    <button
                        class="btn btn-success col-12">Accept
                    </button>

                </form>

            </div>
        </div>
    </div>

@endsection

