@extends('admin.layouts.master')

@section('title')Admin Panel
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
                        <p style="font-size: 1.3em;margin: 0; text-align: center">   {{$stationCount}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b> Автогари</b></p>

                    </div>
                </div>

            </div>

        </div>
        <div class="col-4">
            <div class="card col-11 mx-auto">
                <div class="card-body">


                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">   {{$companyCount}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b> Компании</b></p>

                    </div>
                </div>


            </div>

        </div>
        <div class="col-4">
            <div class="card col-11 mx-auto">
                <div class="card-body">

                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">   {{$destinationCount}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b>Дестинации</b></p>

                    </div>

                </div>


            </div>

        </div>
        <div class="col-4 mt-3">
            <div class="card col-11 mx-auto">
                <div class="card-body">

                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">   {{$coursesCount}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b> Курсове</b></p>

                    </div>
                </div>


            </div>

        </div>
        <div class="col-4 mt-3">
            <div class="card col-11 mx-auto">
                <div class="card-body">


                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">   {{$userCount}} </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center">Потребителя</p>

                    </div>
                </div>


            </div>

        </div>
        <div class="col-4 mt-3">
            <div class="card col-11 mx-auto">
                <div class="card-body">

                    <div style="margin-left: 0.5em;">
                        <p style="font-size: 1.3em;margin: 0; text-align: center">   15 </p>
                        <p style="font-size: 1.1em;margin: 0; text-align: center"><b>Продедени билета</b></p>

                    </div>

                </div>


            </div>

        </div>
    </div>

@endsection
