@extends('companies.layouts.master')

@section("title")
    Вашите курсове
@endsection

@section("content")

    <div class="col-12">
        <h1 class="col-12 text-center mb-2" style="position: relative"> Курсове <a style="position: absolute; right: 0"
                                                                                   class="btn btn-success"
                                                                                   href="{{route("company.showCoursesForm")}}">
                Създай курс </a></h1>
    </div>
    <div class="col-12 row">
        @forelse($courses as $course)
            <div class="col-4">
                <div class="card col-11 row mx-auto">
                    <div class="card-body col-12">
                        <h5 class="card-title">{{$course->destination->name}}</h5>
                        <p class="card-text">{{$course->destination->startStation->name}}
                            <br> {{$course->destination->endStation->name}} <i
                                    class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <br>
                            {{$course->date}} <i class="fas fa-calendar" aria-hidden="true"></i><br>
                            {{$course->startTime}} <i class="fas fa-clock" aria-hidden="true"></i>
                            - {{$course->endTime}} <i class="fas fa-clock" aria-hidden="true"></i>
                        </p>
                        <a href="{{route("company.showCourse", ["id" => $course->id])}}"
                           class="btn btn-primary col-12">Виж още</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center" style="width: 100%; font-size: 1.1em;">Нямате наличи дестинации</p>
        @endforelse
    </div>
@endsection
