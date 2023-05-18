@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")
    <div class="col-12 row">
        <div class="col-12">
            <h1 class="col-12 text-center mb-4">{{$destination->getStartBusStation->getCity->name}} - {{$destination->getEndBusStation->getCity->name}}</h1>
        </div>
        @foreach($courses as $course)
            <div class="col-12">
                <div class="card col-11">
                    <div class="card-body row align-center">
                        <p class="col-3 p-0 m-0" style="align-self: center">Ден: {{$course->date}} <i class="fas fa-calendar"></i></p>
                        <p class="col-3 p-0 m-0"  style="align-self: center">Час на тръгване: {{$course->startTime}} <i class="fas fa-clock"></i></p>
                        <p class="col-3 p-0 m-0"  style="align-self: center">Час на пристигане: {{$course->endTime}} <i class="fas fa-clock"></i></p>
                        <a href="{{route("user.showCourse", ["id"=>$course->id])}}" class="btn btn-primary col-3">Резервирай</a>
                    </div>

                </div>
            </div>

        @endforeach
    </div>
@endsection

