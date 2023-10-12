@extends('companies.layouts.master')


@section("content")
    <style>
        .destinations {
            background: white;
            padding: 1em;
            padding-bottom: 1.5em;
            box-shadow: 0px 0px 10px 0px rgba(128, 128, 128, 0.58);
            border-radius: 5px;
        }
    </style>
    <h1 class="col-12 text-center mb-2">Редактирай дестинация</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9 "
          action="{{route("company.editDestination", ["id" => $destination->id])}}" method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име </label>
            <input type="text" class="form-control" name="name" value="{{$destination->name}}" id="exampleInputEmail1"
                   placeholder="Въведете име на компанията">
        </div>
        <div class="destinations mt-4">
            <div class="row">
                <h1 class="col m-0">Дестинации</h1>

                @if(count($busStations) > 2)
                    <span class="btn btn-success mt-2 mx-auto text-center col align-center" id="add-destination">Добави дестинация</span>
                @endif
            </div>
            <hr>
            @foreach($tracks as $track)
                <div class="col-12 row mx-auto mt-3 destination last" id="destination-1">
                    <div class="row pl-0 ">
                        <div class="">
                            <b><p>№1</p></b>
                        </div>
                        <div>
                            <span class="btn btn-danger "><i class="fa fa-times"></i></span>

                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Начална автогара</label>
                        <select class="form-select" name="startBusStation" id="startBusStation">
                            <option value="" disabled selected>Избери автогара</option>
                            @forelse($busStations as $station)
                                @if($station->id == $track->startBusStation)
                                    <option selected value="{{$station->id}}">{{$station->name}}</option>
                                @else
                                    <option value="{{$station->id}}">{{$station->name}}</option>

                                @endif

                            @empty
                                <option value="" disabled>Нямате станции</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group col-6 ">
                        <label for="exampleInputEmail1">Крайна автогара</label>
                        <select class="form-select endBusStation" name="endBusStation" id="">
                            <option value="" disabled>Избери автогара</option>
                            @forelse($busStations as $station)
                                @if($station->id == $track->endBusStation)
                                    <option selected value="{{$station->id}}">{{$station->name}}</option>
                                @else
                                    <option value="{{$station->id}}">{{$station->name}}</option>

                                @endif
                            @empty
                                <option value="" disabled>Нямате станции</option>
                            @endforelse
                        </select>
                    </div>

                </div>

            @endforeach
        </div>


        <button type="submit" class="btn btn-primary col-12 mt-3">Редактирай дестинация</button>
    </form>


    <script>
        var destination = 2;
        var connectedStations = JSON.parse(ajaxRequest("POST", "{{route("company.getConnectedStations")}}", {}));


        console.log(connectedStations);
        $("#add-destination").on("click", function () {
            var chooseStation = $('.last .endBusStation').val();
            var chooseStationName = $('.last .endBusStation').find(":selected").text();
            var startBusStation = $('#startBusStation').val();
            console.log(chooseStation);
            const filteredData = connectedStations.filter(item => item.id != chooseStation && item.id != startBusStation);


            var upperPartHtml = "  <div class=\"col-12 row mx-auto mt-3 destination last\">\n" +
                "                <div><b><p>№" + destination + "</p></b></div>\n" +
                "                <div class=\"form-group col-6\">\n" +
                "                    <label for=\"exampleInputEmail1\">Начална автогара</label>\n" +
                "                    <select class=\"form-select\" disable name=\"startBusStation\" id=\"\">\n" +
                "                                <option selected disabled value=" + chooseStation + ">" + chooseStationName + "</option>\n" +
                "                    </select>\n" +
                "                </div>\n" +
                "                <div class=\"form-group col-6 \">\n" +
                "                    <label for=\"exampleInputEmail1\">Крайна автогара</label>\n" +
                "                    <select class=\"form-select\" name=\"endBusStation\" id=\"\">\n";


            var options = "";

            if (filteredData.length === 0) {
                options += "<option value=\"\" disabled selected>Нямате станции</option>";
            } else {
                filteredData.forEach(function (item) {
                    options += "<option value=\"" + item.id + "\">" + item.name + "</option>";
                });

            }


            var downPartHtml = "                    </select>\n" +
                "                </div>\n" +
                "\n" +
                "            </div>\n";


            var html = upperPartHtml + options + downPartHtml;

            $(".last").removeClass("last");

            $('.destinations').append(html);
            destination++;

        });
    </script>
@endsection

