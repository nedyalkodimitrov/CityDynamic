@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")

    <div class="card">
        <div class="card-title">
            <h3 class="p-3">
                {{$course->getDestination->getStartBusStation->getCity->name}} - {{$course->getDestination->getEndBusStation->getCity->name}}

            </h3>
        </div>
        <div class="card-body">
            <p class="col-3 p-0 m-0" style="align-self: center">Ден: {{$course->date}} <i class="fas fa-calendar"></i></p>
            <p class="col-3 p-0 m-0"  style="align-self: center">Час на тръгване: {{$course->startTime}} <i class="fas fa-clock"></i></p>
            <p class="col-3 p-0 m-0"  style="align-self: center">Час на пристигане: {{$course->endTime}} <i class="fas fa-clock"></i></p>
            <p class="col-3 p-0 m-0"  style="align-self: center">Цена: {{$course->getTicket->price}} лв.</p>
            <p class="col-3 p-0 m-0 mb-5"  style="align-self: center">{{$course->getBus->name}} ({{$course->getBus->model}}) - {{$course->getBus->seats}} места </p>
            <p class="col-3 p-0 m-0"  style="align-self: center">Компания: {{$course->getDestination->getCompany->name}} </p>

            @if(\Illuminate\Support\Facades\Auth::check())
                @if($boughtCourseTicketNumbers >= $course->getBus->seats)
                    <button class="btn btn-danger">Изчерпана наличност</button>
                @else
                    <form action="{{route("user.putInCart", ["id"=>$course->id])}}" method="post">
                        @csrf
                        <button class="btn btn-success">Сложи в количката</button>
                    </form>


                @endif


            @else
                <b class="mt-5">Искаш да може да резервираш? </b><br>
                <a class="btn btn-primary" href="{{route("login")}}">Влез в профила </a>
            @endif

        </div>

    </div>

@endsection
