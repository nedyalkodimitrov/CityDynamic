@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")
    <div class="col-12 row">
        <div class="col-12">
            <h2 class="col-12 text-center mb-2 mt-4 ">{{$destination->getStartBusStation->getCity->name}} - {{$destination->getEndBusStation->getCity->name}}</h2>
        </div>
        <div class="col-12">
        @foreach($courses as $course)
                <div class="card col-11 mx-auto mt-3">
                    <div class="card-body row align-center">
                        <p class="col-3 p-0 m-0 " style="align-self: center">Ден: <br> {{$course->date}} <i class="fas fa-calendar"></i></p>
                        <p class="col-2 p-0 m-0"  style="align-self: center">Час на тръгване: <br>{{$course->startTime}} <i class="fas fa-clock"></i></p>
                        <p class="col-2 p-0 m-0"  style="align-self: center">Час на пристигане:<br> {{$course->endTime}} <i class="fas fa-clock"></i></p>
                        <p class="col-2 p-0 m-0"  style="align-self: center"> Компания: {{$course->getDestination->getCompany->name}} </p>

                        <a href="{{route("user.showCourse", ["id"=>$course->id])}}" style="align-self: center" class="btn btn-primary col-3">Резервирай</a>
                    </div>

                </div>

        @endforeach
    </div>
@endsection

