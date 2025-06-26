@extends('companies.layouts.master')

@section("title")
    Вашите курсове
@endsection

@section("content")

    <div class="col-12">
        <h1 class="col-12 text-center mb-2" style="position: relative"> Курсове
            <a style="position: absolute; right: 0"
               class="btn btn-success"
               href="{{route("company.showCoursesForm")}}">Създай
                курс </a></h1>
    </div>

    <div class="col-12 card">
        <table class="table ">
            <thead>
            <tr>
                <th scope="col">Статус</th>
                <th scope="col">Дестинация</th>
                <th scope="col">Начална точка</th>
                <th scope="col">Крайна точка</th>
                <th scope="col">Дата и час</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($courses as $course)
                <tr>
                    <th scope="row">
                        @if(\Carbon\Carbon::parse($course->date)->isToday() && \Carbon\Carbon::parse($course->start_time)->isPast() && \Carbon\Carbon::parse($course->end_time)->isFuture())
                            <div class="alert alert-success p-1 text-center">
                                Активен
                            </div>
                        @elseif(\Carbon\Carbon::parse($course->date)->isFuture() || \Carbon\Carbon::parse($course->date)->isToday() && \Carbon\Carbon::parse($course->start_time)->isFuture())
                            <div class="alert alert-primary p-1 text-center">
                                Предстоящ
                            </div>
                        @else
                            <div class="alert alert-light p-1 text-center">
                                Изминал
                            </div>
                        @endif
                    </th>
                    <td>{{$course->destination->name}}</td>
                    <td>{{$course->destination->startStation->name}}</td>
                    <td>{{$course->destination->endStation->name}} </td>
                    <td>{{\Carbon\Carbon::parse($course->start_time)->format('H:i')}}
                        - {{\Carbon\Carbon::parse($course->end_time)->format('H:i')}} |
                        {{\Carbon\Carbon::parse($course->date)->format('d/m/Y')}} </td>
                    <td><a href="{{route("company.showCourse", ["id" => $course->id])}}"><i
                                class="fa fa-eye"></i></a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Няма добавени дистанции</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
