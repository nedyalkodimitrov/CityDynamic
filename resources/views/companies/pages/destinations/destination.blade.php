@extends('companies.layouts.master')


@section("content")
    <style>
        .predefined-container {
            background: white;
            padding: 1em;
            padding-bottom: 1.5em;
            box-shadow: 0px 0px 10px 0px rgba(128, 128, 128, 0.58);
            border-radius: 5px;
        }


        .arrow-right {
            width: 0;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;

            border-left: 20px solid green;
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
        <div class="predefined-container  mt-4">
            <div class="row">
                <h1 class="col m-0">Дестинации</h1>

                @if(count($busStations) > 2)
                    <span class="btn btn-success mt-2 mx-auto text-center col align-center" id="add-destination">Добави точка</span>
                @endif
            </div>
            <hr>

            @php
                $trackNumber = 1;

            @endphp
            <div class="destinations row" style="border-left: 4px solid green; margin-left: 1em ">
                @foreach($tracks as $track)
                    <div
                        class="col-12 row mx-auto mt-3 p-0 destination @if($trackNumber == count($tracks)) last @endif"
                        id="destination-{{$trackNumber}}">
                        <div class="p-0 col-12 pl-0 mb-0 pb-0" style="display: flex; justify-content: space-between">
                            <div style="display: flex; align-items: center; gap: 5px">
                                <div class="arrow-right"></div>
                                <b><p class="p-0 m-0">№1</p></b>
                            </div>
                            @if($trackNumber != 1)
                                <div style="display: inline-block">
                                    <span class="btn btn-danger "><i class="fa fa-times"></i></span>

                                </div>
                            @endif
                        </div>
                        <div class=" pl-2 form-group col-12" style="padding-left: 1.5em;">
                            <label for="exampleInputEmail1">Начална автогара</label>
                            <select class="form-select startBusStation" name="startBusStation" id="startBusStation">
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

                    </div>


                    @php
                        $trackNumber++;
                    @endphp

                @endforeach
            </div>
        </div>


        <button type="submit" class="btn btn-primary col-12 mt-3">Редактирай дестинация</button>
    </form>


    <script>
        var elements = [];
        var allTracks = $('.destination').length;
        $('.destination').each(function(index, element) {
            // Access the current element using the element parameter
            // You can also access its properties or modify its content
            elements.push($(element).attr("id").split("-")[1]);
        });

        console.log(elements);

        var destinationNumber = allTracks + 1;
        var connectedStations = JSON.parse(ajaxRequest("POST", "{{route("company.getConnectedStations")}}", {}));


        console.log(connectedStations);
        $("#add-destination").on("click", function () {
            var chooseStation = $('.last .startBusStation').val();
            var chooseStationName = $('.last .startBusStation').find(":selected").text();
            // var startBusStation = $('#startBusStation').val();
            console.log(chooseStation);
            const filteredData = connectedStations.filter(item => item.id != chooseStation);


            var upperPartHtml =
            "  <div class=\"col-12 row mx-auto mt-3 p-0 destination last\" id=\"destination-1\">\n" +
            "                        <div class=\"p-0 col-12 pl-0 mb-0 pb-0\" style=\"display: flex; justify-content: space-between\">\n" +
            "                            <div style=\"display: flex; align-items: center; gap: 5px\">\n" +
            "                                <div class=\"arrow-right\"></div>\n" +
            "                                <b><p class=\"p-0 m-0\">№ "+destinationNumber+"</p></b>\n" +
            "                            </div>\n" +
                " <div style='display: inline-block'>"+
            "<span class='btn btn-danger remove-destination-track '><i class='fa fa-times'></i></span>"+

            "</div>" +

            "                        </div>\n" +
            "                        <div class=\" pl-2 form-group col-12\" style=\"padding-left: 1.5em;\">\n" +
            "                            <label for=\"exampleInputEmail1\">Точка за спиране</label>\n" +
            "                    <select class=\"form-select startBusStation \" name=\"endBusStation\" id=\"\">\n";


            // var upperPartHtml = "  <div class=\"col-12 row mx-auto mt-3 destination last\" id='destination-" + destination + "'>\n" +
            //     "                <div style='display: flex;justify-content: space-between'>" +
            //     "<div> <b><p>№" + destination + "</p></b></div>" +
            //     " <div style='display: inline-block'>" +
            //     "<span class='btn btn-danger remove-destination-track'><i class='fa fa-times'></i></span>" +
            //     "</div></div>\n" +
            //     "                <div class=\"form-group col-6\">\n" +
            //     "                    <label for=\"exampleInputEmail1\">Начална автогара</label>\n" +
            //     "                    <select class=\"form-select\" disable name=\"startBusStation\" id=\"\">\n" +
            //     "                                <option selected disabled value=" + chooseStation + ">" + chooseStationName + "</option>\n" +
            //     "                    </select>\n" +
            //     "                </div>\n" +
            //     "                <div class=\"form-group col-6 \">\n" +
            //     "                    <label for=\"exampleInputEmail1\">Крайна автогара</label>\n" +
            //     "                    <select class=\"form-select\" name=\"endBusStation\" id=\"\">\n";


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
            elements.push(destinationNumber);
            destinationNumber++;
        });

        $(document).on('click', '.remove-destination-track', function () {
            var parent = $(this).parent().parent().parent();
            var isLastElementFlag = false;
            var elementId = parent.attr("id");
            var elementNumber = elementId.split("-")[1];
            var index = elements.indexOf(parseInt(elementNumber));
            if (parent.hasClass("last")) {
                isLastElementFlag = true;
            }
            $(this).parent().parent().parent().remove();

            if (isLastElementFlag) {
                $('.destination').last().addClass("last");
            }

            if ($('.destination').length > 1) {
                var beforeElement = elements[index - 1];
                var afterElement = elements[index + 1];

                var valueOfBeforeElement = $("#destination-" + beforeElement + " .endBusStation").val();
                console.log("valueOfBeforeElement" + valueOfBeforeElement);
                $("#destination-" + afterElement + ".startBusStation").val(valueOfBeforeElement);
            }

            destinationNumber--;

        });

    </script>
@endsection

