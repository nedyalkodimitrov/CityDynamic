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
                <span class="btn btn-success mt-2 mx-auto text-center col align-center" id="add-destination">Добави дестинация</span>
            </div>
            <hr>
            <div class="col-12 row mx-auto mt-3 destination" id="destination-1">
                <div><b><p>№1</p></b></div>
                <div class="form-group col-6">
                    <label for="exampleInputEmail1">Начална автогара</label>
                    <select class="form-select" name="startBusStation" id="">
                        <option value="" disabled selected>Избери автогара</option>
                        @forelse($busStations as $station)
                            @if($station->id == $destination->startBusStation)
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
                    <select class="form-select" name="endBusStation" id="">
                        <option value="" disabled selected>Избери автогара</option>
                        @forelse($busStations as $station)
                            @if($station->id == $destination->endBusStation)
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

        </div>


        <button type="submit" class="btn btn-primary col-12 mt-3">Редактирай дестинация</button>
    </form>


    <script>
        var destination = 1;
        var connectedStations = "{{route("company.getConnectedStations")}}"
        var chooseStation = ""

        $("#add-destination").on("click", function () {
            var connecte

            var html = "  <div class=\"col-12 row mx-auto mt-3 destination\">\n" +
                "                <div><b><p>№1</p></b></div>\n" +
                "                <div class=\"form-group col-6\">\n" +
                "                    <label for=\"exampleInputEmail1\">Начална автогара</label>\n" +
                "                    <select class=\"form-select\" disable name=\"startBusStation\" id=\"\">\n" +
                "                        <option value=\"\"  selected>Избери автогара</option>\n" +
                "                                <option selected value=\"\">София</option>\n" +
                "                    </select>\n" +
                "                </div>\n" +
                "                <div class=\"form-group col-6 \">\n" +
                "                    <label for=\"exampleInputEmail1\">Крайна автогара</label>\n" +
                "                    <select class=\"form-select\" name=\"endBusStation\" id=\"\">\n" +
                "                        <option value=\"\" disabled selected>Избери автогара</option>\n" +

                "                                <option value=\"1\">Варна</option>\n" +
                "                                <option value=\"2\">Попово</option>\n" +
                "                                <option value=\"3\">Бургас</option>\n" +
                "                    </select>\n" +
                "                </div>\n" +
                "\n" +
                "            </div>\n";

            $('.destinations').append(html);
            destination++;

        });
    </script>
@endsection

