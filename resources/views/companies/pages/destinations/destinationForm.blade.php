@extends('companies.layouts.master')


@section("content")
    <h1 class="col-12 text-center mb-2">Създайте дестинация</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9 " action="{{route("company.createDestination")}}" method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име </label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                   placeholder="Въведете име на компанията">
        </div>
        <div class="stations-container">
            <div class="form-group col-12">
                <label for="exampleInputEmail1">Начална автогара</label>
                <select class="form-select" name="station-1" id="">
                    <option value="" disabled selected>Избери автогара</option>
                    @forelse($busStations as $station)
                        <option value="{{$station->id}}">{{$station->name}}</option>

                    @empty
                        <option value="" disabled>Нямате станции</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group col-12 mt-3">
                <label for="exampleInputEmail1">Крайна автогара</label>
                <select class="form-select" name="station-2" id="">
                    <option value="" disabled selected>Избери автогара</option>
                    @forelse($busStations as $station)
                        <option value="{{$station->id}}">{{$station->name}}</option>
                    @empty
                        <option value="" disabled>Нямате станции</option>
                    @endforelse
                </select>
            </div>
        </div>
        <span id="addStationBtn" class="btn btn-secondary col-12 mt-3" onclick="addStation()">Добави още точнки</span>
        <button type="submit" class="btn btn-primary col-12 mt-3">Създай дестинация</button>
    </form>


    <script>
        var stationCount = 2;

        function addStation() {
            stationCount++;
            document.querySelector(".stations-container").innerHTML += '' +
                ' <div class="form-group col-12 mt-3">\n' +
                '                <label for="exampleInputEmail1">Крайна автогара</label>\n' +
                '                <select class="form-select" name="station-' + stationCount + '" id="">\n' +
                '                    <option value="" disabled selected >Избери автогара</option>\n' +
                @forelse($busStations as $station)
                    '                        <option value="{{$station->id}}">{{$station->name}}</option>\n' +
                @empty
                    '                        <option value=""  disabled >Нямате станции</option>\n' +
                @endforelse
                    '                </select>\n' +
                '            </div>'


        }
    </script>
@endsection

