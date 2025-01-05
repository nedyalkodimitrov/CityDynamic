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
                                По направление:
                                {{$course['startCity']}}
                                - {{$course['endCity']}}
                            </p>

                            <hr>
                            <p class="col-12 col-md-2  p-0 pl-5 m-0">
                                <i class="fas fa-calendar"></i>
                                <b>{{$course['datetime']}}</b>
                            </p>
                            <p class="col-12 col-md-3 p-0 m-0" style="align-self: center">
                                {{$course['bus']}}
                            </p>
                            <p class="col-12 col-md-2 p-0 m-0" style="align-self: center">
                                <b style="font-size: 1.3em">{{$course['price']}} лв.</b>
                            </p>
                            <a href="{{route("user.showCourse", ["id"=>$course['id'], "startCity" => $startCity, "endCity" => $endCity])}}"
                               style="align-self: center"
                               class="btn btn-primary col-12 col-md-3">Купи</a>
                        </div>
                    </div>
                @endforeach

            @else
                <div class="col-12 text-center mt-3">
                    <h3>Изберете начална и крайна точка </h3>
                </div>
            @endif
        </div>
@endsection

