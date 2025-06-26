@extends('companies.layouts.master')

@section('title')@endsection

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
@endsection


@section("content")
    <div class="col-9 mx-auto mt-3 mb-3">
        @if($isActive)
            <div class="alert alert-success col-1 p-1 text-center">
                Активен
            </div>
        @elseif($isLocked)
            <div class="alert alert-dark col-1 p-1 text-center">
                Изминал
            </div>
        @endif
    </div>
    <h1 class="col-12 text-center mb-2">
        {{$isLocked?"Преглед на": "Редактирай курс"}} курс
    </h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" action="{{route("company.editCourse", ["id" => $course->id])}}"
          method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Дестинация</label>
            <select class="form-select" {{$isLocked?'disabled':''}} name="destination" id="">
                <option value="" disabled selected>Избери дестинация</option>
                @foreach($destinations as $destination)
                    <option
                        @selected($destination->id == $course->destination_id) value="{{$destination->id}}">{{$destination->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Автобус </label>
            <select class="form-select" {{$isLocked?'disabled':''}} name="bus" id="">
                <option value="" disabled selected>Избери автобус</option>
                @foreach ($buses as $bus)
                    <option @selected($course->bus_id == $bus->id) value="{{$bus->id}}">{{$bus->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1" {{$isLocked?'disabled':''}}>Дата </label>
            <input type="date" name="date" class="form-control" id="exampleInputPassword1" placeholder="Избрете дата"
                   value="{{$course->date}}">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Време на тръгване</label>
            <input type="time" name="startTime" class="form-control" id="startTime" placeholder="Избрете време"
                   value="{{$course->start_time}}">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Време на пристигане</label>
            <input type="time" name="endTime" class="form-control" id="endTime"
                   placeholder="Избрете време" value="{{$course->end_time}}">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1" {{$isLocked?'disabled':''}}>Цена на билетите </label>
            <input type="number" name="price" step="0.1" class="form-control" id="exampleInputPassword1"
                   placeholder="Каква е цената на билетите" value="{{$course->price}}">
        </div>
        @foreach($errors->all() as $error)
            <div class="alert alert-danger col-12 mt-3" role="alert">
                {{$error}}
            </div>
        @endforeach
        @if(!$isLocked)
            <button type="submit" class="btn btn-primary col-12 mt-3">Запази промените</button>
        @endif
    </form>

    @if($isActive)
        <div class="mt-5 mb-5 ">
            <h4 class="text-center">Заети места в автобуса</h4>

            <div class="d-flex justify-content-center ">
                <div id="bus-seats"></div>
            </div>
        </div>

        <div class="mt-5 mb-5 col-9 mx-auto">
            <h4 class="text-center">Текущо разположение на автобуса</h4>

            <div id="map" style="width: 100%; height: 200px;"></div>
        </div>
    @endif

    <script src="{{asset('assets/js/generateBusSeats.js')}}"></script>
    <script>

        document.getElementById("startTime").value = "{{$course->start_time}}";
        document.getElementById("endTime").value = "{{$course->end_time}}";

        @if($isActive)
        generateSeats('{{$course->bus->seats}}', '{{$course->bus->seats_at_row}}',
            Array.from({length: Math.min(15, {{$course->bus->seats}})}, () => Math.floor(Math.random() * {{$course->bus->seats}}) + 1));


        let lat = Math.random() * 90 - 45; // Random latitude between -90 and 90
        let lag= Math.random() * 180 - 90; // Random latitude between -90 and 90

        let map = L.map('map').setView([lat, lag], 7);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        let marker = L.marker([lat, lag]).addTo(map);
        @endif
    </script>
@endsection

