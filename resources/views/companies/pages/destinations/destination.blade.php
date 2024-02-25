@extends('companies.layouts.master')


@section("content")
    <style>


        .arrow-right {
            width: 0;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;

            border-left: 20px solid green;
        }
    </style>
    <h1 class="col-12 text-center mb-2">Дестинация</h1>
    <div class="card col-12 ">
        <div class="col-12 col-md-9 mx-auto col-lg-12  p-4" method="post">
            <div class="predefined-container  mt-4">
                <div class="row">
                    <h3 class="col-12 m-0">{{$destination->getStartBusStation->name}}
                        - {{$destination->getEndBusStation->name}}</h3>
                </div>
                <hr>
                @php
                    $trackNumber = 1;
                @endphp
                <div class="destinations row" style="border-left: 4px solid green; margin-left: 1em ">
                    @foreach($tracks as $track)
                        <div
                            class="col-12 row mx-auto mt-3 p-0 destination @if($trackNumber == count($tracks)) last @endif"
                            id="destination-{{$trackNumber}}">
                            <div class="p-0 col-12 pl-0 mb-0 pb-0"
                                 style="display: flex; justify-content: space-between">
                                <div style="display: flex; align-items: center; gap: 5px">
                                    <div class="arrow-right"></div>
                                    <b><p class="p-0 m-0">№{{$trackNumber}}</p></b>
                                </div>
                            </div>
                            <div class=" pl-2 form-group col-12" style="padding-left: 1.5em;">
                                <label for="exampleInputEmail1">@if($trackNumber == 1)
                                        Начална
                                    @elseif($trackNumber == count($tracks))
                                        Крайна
                                    @else
                                        Проходна
                                    @endif</label>
                                <input type="text" class="form-control" value="{{$track->name}}" readonly>
                            </div>

                        </div>
                        @php
                            $trackNumber++;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 card mt-5">

        <table class="table ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Цена</th>
                <th scope="col">Час</th>
                <th scope="col">Автобус</th>
                <th scope="col">Шофьор</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($destination->getSchedules as $schedule)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$schedule->price}}</td>
                    <td>{{$schedule->hour}}</td>
                    <td>{{$schedule->getBus->name}}</td>
                    <td>{{$schedule->getDriver[0]->name}}</td>
                    <td>
                        <i class="fa fa-pen"></i>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center col-12">Няма добавени</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection

