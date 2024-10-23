@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")
    <div class="mt-5">
        <hr>
    </div>
    <div class="card col-11 col-md-9 col-lg-7 mx-auto mt-5">
        <div class="card-title">
            <h3 class="pt-3 text-center">
                {{$course->destination->startStation->city?->name}}
                - {{$course->destination->endStation->city?->name}}
            </h3>
            <p class="col-12  p-0 m-0 text-center" style="align-self: center"><b>{{$course->date}} <i
                        class="fas fa-calendar"></i></b></p>

        </div>
        <div class="card-body">
            <p class="col-12    p-0 m-0 " style="align-self: center"><b>Час на тръгване:</b> {{$course->startTime}} <i
                    class="fas fa-clock"></i></p>
            <p class="col-12    p-0 m-0" style="align-self: center"><b>Час на пристигане:</b> {{$course->endTime}} <i
                    class="fas fa-clock"></i></p>
            <p class="col-12    p-0 m-0 " style="align-self: center"><b>Превозващ автобус:</b> {{$course->bus->name}}
                ({{$course->bus->model}}) - {{$course->bus->seats}} места </p>
            <p class="col-12  p-0 m-0" style="align-self: center">
                <b>Компания:</b> {{$course->destination->company->name}} </p>
            <p class="col-12  p-0 m-0" style="align-self: center"><b>Цена:</b> {{$course->price}} лв.</p>

            <div class="mt-1 row justify-content-center col-12">
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if($boughtCourseTicketNumbers >= $course->bus->seats)
                        <button class="btn btn-danger">Изчерпана наличност</button>
                    @else
                        <form action="{{route("user.putInCart", ["id"=>$course->id, "startPointId" => $course->destination->points->first()->id,"endPointId" => $course->destination->points->last()->id])}}" method="post">
                            @csrf
                            <button class="btn btn-success">Сложи в количката</button>
                        </form>

                    @endif

                @else
                    <b class="mt-5 col-12 text-center">Искаш да може да резервираш? </b><br>
                    <a class="btn btn-primary mx-auto col-3" href="{{route("login")}}">Влез в профила </a>
                @endif
            </div>
        </div>
    </div>
@endsection
