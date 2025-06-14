@extends('companies.layouts.master')

@section("title")
    Автогара
@endsection

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
@endsection

@section("content")
    <div class="card col-12 row p-0 m-2">
        <div class="card-body ">
            <div class="card-title row justify-content-between">
                <h5 class="col">{{$station->name}} | {{$station->city->name}}
                    , {{$station->city->country->name}} <i class="fas fa-map-marker-alt"
                                                           aria-hidden="true"></i></h5>
                @if($isApproved)
                    <form action="{{route("company.unpairStation",["id" => $station->id])}}" method="post"
                          class="col-3">
                        @csrf
                        <button
                            class="btn btn-danger col-12">Премахни тази автогара
                        </button>
                    </form>
                @else
                    @if($isRequestToThisStation)
                        <form action="{{route("company.declineStationRequest",["id" => $station->id])}}" method="post"
                              class="col-3">
                            @csrf
                            <button
                                class="btn btn-danger col-12">Откажи заявката си
                            </button>
                        </form>
                    @else
                        <form action="{{route("company.makeStationRequest",["id" => $station->id])}}" method="post"
                              class="col-3">
                            @csrf
                            <button
                                class="btn btn-success col-12">Свръжете се със станцията
                            </button>
                        </form>
                    @endif
                @endif
            </div>
            <div class="card-text">
                <p>Телефон: {{$station->contact_phone}}</p>
                <p>Имейл: {{$station->contact_email}}</p>
                <p>Адрес: {{$station->contact_address}}</p>
            </div>
          @if($station->location)
                <div id="map" style="width: 100%; height: 200px;"></div>
          @endif
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

    @if($station->location)
        <script>
            let map = L.map('map').setView([{{explode(',', $station->location)[0]}}, {{explode(',', $station->location)[1]}}], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            let marker = L.marker([{{explode(',', $station->location)[0]}}, {{explode(',', $station->location)[1]}}]).addTo(map);
        </script>
    @endif
@endsection




