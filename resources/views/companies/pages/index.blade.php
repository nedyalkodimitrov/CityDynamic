@extends('companies.layouts.master')

@section('title')
    Company Panel
@endsection

@section("content")
    <div class="col-12 " style="margin-top: -2em;margin-left: 1em;margin-bottom: 2em;">
        <h2>Начало</h2>
    </div>
    <div class="col-12 row mb-3">
        <div class="col-4">
            <div class="card col-11 mx-auto">
                <div class="card-body">

                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">{{$destinationCount}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b> Дестинации</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card col-11 mx-auto">
                <div class="card-body">
                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">{{$courseCount}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b> Курса</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card col-11 mx-auto">
                <div class="card-body">
                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">{{$soldTickets}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b> Продадени билета</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 card">
        <div class="col-12 card-body">
            <h1 class="col-12 text-center">Курсове</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">По тестинация</th>
                    <th scope="col">Начална точка</th>
                    <th scope="col">Крайна точка</th>
                    <th scope="col">Заминаване</th>
                </tr>
                </thead>
                <tbody>

                @foreach($courses as $course)
                    <tr>
                        <th scope="row"></th>
                        <td>{{$course->destination->name}}</td>
                        <td>{{$course->destination->startStation->name}}</td>
                        <td>{{$course->destination->endStation->name}}</td>
                        <td>{{$course->start_time}} {{$course->date}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
