@extends('companies.layouts.master')

@section("title")
    Автогара
@endsection

@section("content")
    <div class="card col-12 row p-0 m-2">
        <div class="card-body ">
            <div class="card-title row justify-content-between">
                <h5 class="col">{{$station->name}} | {{$station->city->name}}
                    , {{$station->city->country->name}} <i class="fas fa-map-marker-alt"
                                                           aria-hidden="true"></i></h5>
                @if($isRequestToThisStation)
                    @if($isApproved)
                        <form action="{{route("company.unpairStation",["id" => $station->id])}}" method="post"
                              class="col-3">
                            @csrf
                            <button
                                class="btn btn-danger col-12">Премахни тази автогара
                            </button>

                        </form>
                    @else
                        <form action="{{route("company.declineStationRequest",["id" => $station->id])}}" method="post"
                              class="col-3">
                            @csrf
                            <button
                                class="btn btn-danger col-12">Откажи заявката си
                            </button>

                        </form>
                    @endif
                @else
                    <form action="{{route("company.makeStationRequest",["id" => $station->id])}}" method="post"
                          class="col-3">
                        @csrf
                        <button
                            class="btn btn-success col-12">Свръжете се със станцията
                        </button>

                    </form>
                @endif
            </div>
            <p class="card-text"></p>
        </div>
    </div>

    <div class="col-12 row">
        <h3 class="text-center mt-2 mb-2">Компании, които осъществяват деиността в тази гара</h3>
        @foreach($station->companies as $company)
            <div class="col-12 col-md-4 col-lg-3 ">
                <div class="card col-11 mx-auto" style="height: 100%">
                    <img style="width: 100%; height: 100%; object-fit:contain"
                         src="{{asset("assets/images/".$company->profilePhoto)}}" alt="">
                    <p class="text-center" style="font-size: 1em">{{$company->name}}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
