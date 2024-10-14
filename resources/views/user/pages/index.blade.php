@extends('user.layouts.master')

@section('title')
    User
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{asset("assets/css/searchBar.css")}}"
@endsection

@section("content")
    <div class="col-12 row m-0 ">
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
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
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
                    <input type="date" class="form-control" name="travelDate">
                </div>
                <div class="col-12 col-lg-3" style="
    align-self: center;
">
                    <button class="btn btn-primary col-12" style="" id="search">Търси <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <h2 class="text-center mb-4 mt-4">Нашите предложения</h2>
       <div class="col-11 col-md-10 mx-auto row">
        @foreach($destinations as $destination)
            <div class="col-12 p-0  col-md-4 col-lg-3 mt-4 mb-2 mt-md-0">
                <div class="card col-11 mx-auto">
                    <div class="card-body">
                        <h3>За {{$destination->startBusStation->name}}</h3>
                        <h6>От {{$destination->endBusStation->name}}</h6>
                        <a href="{{route("user.showCourses", ["id" => $destination->id])}}" class="btn btn-primary col-12 ">Вижте
                            курсове</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-11 mx-auto row mt-5">
        <h2 class="text-center">Компаниите, които ни се довериха</h2>
        @foreach($companies as $company)
            <div class="col-6 col-md-4 col-lg-2 mt-2 p-0">
                <div class="col-11 mx-auto" style="border: 1px solid grey; border-radius: 5px">
                    <img style="width: 100%; height: 100px;object-fit: contain" src="{{asset("assets/images/".$company->profilePhoto)}}"><br>
                    <p class="text-center">{{$company->name}}</p>
                </div>
            </div>
        @endforeach
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



