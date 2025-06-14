@extends('companies.layouts.master')

@section('title')
    Панел за компания
@endsection

@section("content")
    @if(!$company->stripeAccount?->stripe_account_id)
        <div class="col-12 alert alert-danger">Вашата компания няма настроен stripe акаунт!
            <a href="{{route('company.stripeAccount')}}">Създай stripe</a></div>
    @elseif(!$company->stripeAccount->is_charges_enabled)
        <div class="col-12 alert alert-danger">Вашата компания няма настроен stripe акаунт!
            <a href="{{route('company.stripeAccount')}}">Довършете настройването на stripe</a></div>
    @endif
    <div class="col-12 row mb-3 px-4">
        <h2 class="col-10 m-0 p-0 ">Начало</h2>
        @if($company->stripeAccount?->is_charges_enabled)
            <a class="btn btn-primary col-2" target="_blank" href="{{route('company.openStripeDashboard')}}">Отвори Stripe табло</a>
        @endif
    </div>
    <div class="col-12 row mb-3">
        <div class="col-4">
            <div class="card col-11 mx-auto">
                <div class="card-body">
                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">{{$destinationCount}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b>Дестинации</b></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card col-11 mx-auto">
                <div class="card-body">
                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">{{$courseCount}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b>Курса</b></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card col-11 mx-auto">
                <div class="card-body">
                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">{{$soldTickets}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b>Продадени билета</b></p>
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
