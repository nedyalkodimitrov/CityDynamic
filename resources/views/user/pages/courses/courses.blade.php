@extends('user.layouts.master')

@section('title')
    User
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{asset("assets/css/searchBar.css")}}"
@endsection

@section("content")

   <livewire:destination-search :cities="$cities" :startCity="$startCity" :endCity="$endCity"/>
    <div class="col-12 row m-0">
        @if($date != null)
            <div class="col-12">
                <h2 class="col-12 text-center mb-2 mt-4 "> {{\Carbon\Carbon::parse($courses[0]->date)->format("d.m.Y")}}
                    <i
                        class="fas fa-calendar"></i></p></h2>
            </div>
        @endif
        <div class="col-12 ">
            @if($courses != null)

                @foreach($courses as $course)
                    <div class="card col-11 mx-auto mt-3">
                        <div class="card-body row align-center">
                            <p class="col-6 text-start"
                               style="font-size: 1.1em">

                            @foreach($course->destination->points as $point )
                                    {{$point->station->name}} |
                            @endforeach

                                    </p>

                            <hr>
                            <p class="col-12 col-md-2  p-0 pl-5 m-0" style="  ">
                                    <b>{{\Carbon\Carbon::parse($course->startTime)->format("H:i") }}
                                    - {{\Carbon\Carbon::parse($course->endTime)->format("H:i")}}</b>
                                <i class="fas fa-clock"></i>
                            </p>
                            <p class="col-12 col-md-3 p-0 m-0" style="align-self: center">
                                {{$course->bus->model}} {{$course->bus->name}} ({{$course->bus->seats}})
                            </p>
                            <p class="col-12 col-md-2 p-0 m-0" style="align-self: center">
                                <b style="font-size: 1.3em">{{$course->price}} лв.</b>
                            </p>
                            <a href="{{route("user.showCourse", ["id"=>$course->id, "startCity" => $startCity, "endCity" => $endCity])}}" style="align-self: center"
                               class="btn btn-primary col-12 col-md-3">Резервирай</a>
                        </div>
                    </div>
                @endforeach

            @else
                <div class="col-12 text-center mt-3">
                    <h3 >Please, choose start city, end city and date </h3>
                </div>
            @endif
        </div>

        <script src="{{asset("assets/js/ajax.js")}}"></script>
        <script>
            $('#startCity').on("change", function () {
                var results = ajaxRequest("POST", '{{route("user.getEndCities")}}', {startCity: $(this).val()})
                $("#endCity option").remove();

                if (results.length == 0) {
                    $("#endCity").append("<option value=''>Няма курсове</option>");
                } else {
                    $("#endCity").append("<option value=''>Избери град</option>");
                }
                for (var i = 0; i < results.length; i++) {
                    $("#endCity").append("<option value='" + results[i]["id"] + "'>" + results[i]["name"] + " </option>");
                }

            });
        </script>
@endsection

