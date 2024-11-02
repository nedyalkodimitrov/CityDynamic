@extends('companies.layouts.master')

@section("title")
    Вашите курсове
@endsection

@section("content")

    <div class="col-12">
        <h1 class="col-12 text-center mb-2" style="position: relative"> Курсове <a style="position: absolute; right: 0"
                                                                       class="btn btn-success"
                                                                       href="{{route("company.showCoursesForm")}}">Създай курс </a></h1>
    </div>

    <div class="col-12 card">
        <table class="table ">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Име</th>
                <th scope="col">Начална точка</th>
                <th scope="col">Крайна точка</th>
                <th scope="col">Дата и час</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($courses as $course)
                <tr>
                    <th scope="row"></th>
                    <td>{{$course->destination->name}}</td>
                    <td>{{$course->destination->startStation->name}}</td>
                    <td>{{$course->destination->endStation->name}} </td>
                    <td>{{$course->date}} {{$course->startTime}}</td>
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
