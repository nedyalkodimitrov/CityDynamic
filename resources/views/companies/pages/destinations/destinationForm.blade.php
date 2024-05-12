@extends('companies.layouts.master')


@section("content")
    <style>

        .arrow-right {
            width: 0;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;

            border-left: 20px solid green;
        }
    </style>
    <h1 class="col-12 text-center mb-2">Създайте дестинация</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9 " action="{{route("company.createDestination")}}" method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име </label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                   placeholder="Въведете име на компанията">
        </div>
        <div class="">

        </div>


        <div class="col-12 mb-2 m-0 p-0">
            <div class="col-12 col-md-9 mx-auto col-lg-12 mt-3 p-0">
                <div class=" m-0 p-0 ">

                    <div class="destinations row" style="border-left: 4px solid green; margin-left: 1em;">
                        <div
                            class="col-12 row mx-auto mt-3 p-0 destination "
                            id="destination-1">
                            <div class="p-0 col-12 pl-0 mb-0 pb-0"
                                 style="display: flex; justify-content: space-between">
                                <div style="display: flex; align-items: center; gap: 5px">
                                    <div class="arrow-right"></div>
                                    <b><p class="p-0 m-0">№1</p></b>
                                </div>
                            </div>
                            <div class=" pl-2 form-group col-12" style="padding-left: 1.5em;">
                                <label for="exampleInputEmail1">
                                    Начална точка</label>
                                <select class="form-select" name="station-1" id="">
                                    <option value="" disabled selected>Избери автогара</option>
                                    @forelse($busStations as $station)
                                        <option value="{{$station->id}}">{{$station->name}}</option>

                                    @empty
                                        <option value="" disabled>Нямате станции</option>
                                    @endforelse
                                </select>

                            </div>

                        </div>
                        <div
                            class="col-12 row mx-auto mt-3 p-0 destination "
                            id="destination-2">
                            <div class="p-0 col-12 pl-0 mb-0 pb-0"
                                 style="display: flex; justify-content: space-between">
                                <div style="display: flex; align-items: center; gap: 5px">
                                    <div class="arrow-right"></div>
                                    <b><p class="p-0 m-0">№2</p></b>
                                </div>
                            </div>
                            <div class=" pl-2 form-group col-12" style="padding-left: 1.5em;">
                                <label for="exampleInputEmail1">
                                    Крайна точка</label>
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
                    </div>
                </div>
            </div>
        </div>


        <span id="addStationBtn" class="btn btn-secondary col-12 mt-3" onclick="addStation()">Добави още точнки</span>
        <button type="submit" class="btn btn-primary col-12 mt-3">Създай дестинация</button>
    </form>


    <script>
        var stationCount = 2;

        function addStation() {
            let busStations = @json($busStations);
            // Increment station count
            stationCount++;

            // Create a new station container
            var newStation = document.createElement('div');
            newStation.className = "col-12 row mx-auto mt-3 p-0 destination";
            newStation.id = "station-" + stationCount;
            newStation.name = "station-" + stationCount;

            // Create inner HTML for the new station
            var innerHTML = `
        <div class="p-0 col-12 pl-0 mb-0 pb-0" style="display: flex; justify-content: space-between">
            <div style="display: flex; align-items: center; gap: 5px">
                <div class="arrow-right"></div>
                <b><p class="p-0 m-0">№${stationCount}</p></b>
            </div>
        </div>
        <div class="pl-2 form-group col-12" style="padding-left: 1.5em;">
            <label for="exampleInputEmail1">Крайна точка</label>
            <select class="form-select" name="station-${stationCount}" id="">
                <option value="" disabled selected>Избери автогара</option>`;

            // Add options for each bus station
            busStations.forEach(function (station) {
                innerHTML += `<option value="${station.id}">${station.name}</option>`;
            });

            innerHTML += `</select>
 <span class="delete-btn" style="cursor: pointer">X</span></div>`;

            // Set the inner HTML of the new station
            newStation.innerHTML = innerHTML;

            // Append the new station to the end of the container
            document.querySelector('.destinations').appendChild(newStation);

            newStation.querySelector('.delete-btn').addEventListener('click', deleteStation);

            // Change the label of the last station to "Middle point"
            var lastStation = document.getElementById("destination-" + (stationCount - 1));
            var label = lastStation.querySelector('label');
            label.textContent = "Междинна точка";

        }

        function deleteStation(event) {
            // Get the station to be deleted
            var station = event.target.parentNode.parentNode;

            // Do not delete if there are only two stations
            if (stationCount <= 2) {
                return;
            }

            // Remove the station from the DOM
            station.parentNode.removeChild(station);

            // Decrement station count
            stationCount--;

            // Renumber remaining stations and change the last one's label
            var stations = document.querySelectorAll('.destination');
            stations.forEach(function (station, index) {
                var number = index + 1;
                station.id = "destination-" + number;
                station.querySelector('p').textContent = "№" + number;
                if (number === stationCount) {
                    station.querySelector('label').textContent = "Крайна точка";
                } else {
                    station.querySelector('label').textContent = "Междинна точка";
                }
            });
        }
    </script>
@endsection

