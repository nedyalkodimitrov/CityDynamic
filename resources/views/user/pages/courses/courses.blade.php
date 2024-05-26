@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")
    <style>
        .searchBar {
            margin-bottom: 2em;
            box-shadow: 4px 4px 15px 4px rgb(33, 33, 33);
            padding: 1em;
            border-radius: 5px;
        }

        .searchBar label {
            font-size: 0.9em;
            font-weight: 800;
        }

        .image {
            width: 100%;
            height: 20em;
            object-fit: cover;
        }

        .searchBar-container {
            position: relative;
            margin: 0;
            padding: 0;
        }

        .searchBar {
            position: absolute;
            top: 0;
            background: white;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .searchBar-container h1 {
            position: absolute;
            top: 10%;
            color: white;
            font-family: 800;
            left: 50%;

            transform: translate(-50%, -10%);
        }

        .searchBar-container::before {
            content: "";
            background: black;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.3;
        }

        @media screen and (max-width: 992px) {
            .searchBar div {
                margin-top: 1em;
            }

            .searchBar-container h1 {
                display: none;
            }

        }


    </style>
    <div class="col-12 mx-auto searchBar-container">
        <img src="{{asset("assets/images/road.jpg")}}" alt="" class="image">
        <h1 class="title">Пътуваите из цялата страна</h1>
        <form method="post" action="{{route("user.searchCourses")}}" class="col-11 col-md-10 mx-auto row searchBar">
            @csrf
            <div class="col-6 col-lg-3 ">
                <label>
                    Tръгване
                </label>
                <select class="form-select" id="startCity" name="startCity">
                    <option value="" disabled selected>Избери град</option>
                    @if($startCity != null)
                        @foreach($cities as $city)
                            @if($startCity == $city->id)
                                <option selected value="{{$city->id}}">{{$city->name}}</option>
                            @else

                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endif

                        @endforeach
                    @else
                        @foreach($cities as $city)

                            <option value="{{$city->id}}">{{$city->name}}</option>

                        @endforeach

                    @endif
                </select>
                {{--                    <input type="text" class="form-control" placeholder="Спирка">--}}
            </div>
            <div class="col-6 col-lg-3">
                <label>
                    Пристигане
                </label>
                <select class="form-select" id="endCity" name="endCity">
                    <option value="" disabled selected>Избери начален град</option>

                </select>
            </div>
            <div class="col-12 col-lg-3">
                <label>
                    Дата на тръгване
                </label>
                <input type="date" value="{{$date}}" class="form-control" name="travelDate">
            </div>
            <div class="col-12 col-lg-3" style="
    align-self: center;
">
                <button class="btn btn-primary col-12" style="" id="search">Търси <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
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

                            @foreach($course->getDestination->getPoints as $point )
                                    {{$point->getStation->name}} |
                            @endforeach

                                    </p>

                            <hr>
                            <p class="col-12 col-md-2  p-0 pl-5 m-0" style="  ">
                                    <b>{{\Carbon\Carbon::parse($course->startTime)->format("H:i") }}
                                    - {{\Carbon\Carbon::parse($course->endTime)->format("H:i")}}</b>

                                <i class="fas fa-clock"></i>
                            </p>
{{--                            <p class="col-12 col-md-2 p-0 m-0" style="  ">--}}
{{--                                {{\App\Http\Services\DestinationService::getTimeFromPointTillEnd($destination)}}--}}
{{--                               --}}
{{--                                --}}{{--                            {{$course->endTime -$course->startTime }}--}}

{{--                            </p>--}}
                            {{--                        <p class="col-12 col-md-2 p-0 m-0" style="align-self: center">--}}
                            {{--                            Пристигане:<br>  <i class="fas fa-clock"></i></p>--}}

                            <p class="col-12 col-md-3 p-0 m-0" style="align-self: center">
                                {{$course->getBus->model}} {{$course->getBus->name}} ({{$course->getBus->seats}})
                            </p>
                            <p class="col-12 col-md-2 p-0 m-0" style="align-self: center">
                                <b style="font-size: 1.3em">{{$course->getTicket->price}} лв.</b>
                            </p>
                            <a href="{{route("user.showCourse", ["id"=>$course->id])}}" style="align-self: center"
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

