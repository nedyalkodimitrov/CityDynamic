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

        #tracks-container {
            transition: max-height 0.5s ease-out;
            overflow: hidden;
            max-height: 0;
        }

        #tracks-container.show {
            max-height: 1000px; /* Adjust this value based on the content height */
        }

        .statistic-container p {
            padding: 0;
            margin: 0;
        }
    </style>
    <h1 class="col-12 text-center mb-2">Дестинация</h1>

    <div class="container p-2 mb-2 col-12 card statistic-container">
        <div class="col-12 row ">
            <div class="col-4 text-center">
                <p><b>10</b></p>
                <p>Закупени билета</p>
            </div>
            <div class="col-4 text-center">
                <p><b>15лв</b></p>
                <p>Оборот</p>
            </div>
            <div class="col-4 text-center">
                <p><b>100км</b></p>
                <p>Разтояние</p>
            </div>

        </div>

    </div>
    <div class="card col-12 mb-2 ">
        <div class="col-12 col-md-9 mx-auto col-lg-12 p-2 px-4" method="post">
            <div class="predefined-container mt-2">
                <div class="row">
                    <h3 class="col-11 m-0">{{$destination->startStation->name}}
                        - {{$destination->endStation->name}}</h3>
                    <i class="fas fa-arrow-down col align-self-center" style="cursor: pointer"
                       onclick="toggleTracks()"></i>
                    <i class="fas fa-pen col align-self-center" style="cursor: pointer"></i>
                </div>
                <div id="tracks-container" class="destinations row"
                     style="border-left: 4px solid green; margin-left: 1em;">
                    <hr>

                    @foreach($destination->points as $point)
                        <div
                            class="col-12 row mx-auto mt-3 p-0 destination @if($loop->iteration == count($destination->points)) last @endif"
                            id="destination-{{$loop->iteration}}">
                            <div class="p-0 col-12 pl-0 mb-0 pb-0"
                                 style="display: flex; justify-content: space-between">
                                <div style="display: flex; align-items: center; gap: 5px">
                                    <div class="arrow-right"></div>
                                    <b><p class="p-0 m-0">№{{$loop->iteration}}</p></b>
                                </div>
                            </div>
                            <div class="pl-2 form-group col-12" style="padding-left: 1.5em;">
                                <label for="exampleInputEmail1">@if($loop->iteration == 1)
                                        Начална
                                    @elseif($loop->iteration == count($destination->points))
                                        Крайна
                                    @else
                                        Проходна
                                    @endif</label>
                                <input type="text" class="form-control" value="{{$point->station->name}}" readonly>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 row p-0 m-0 mb-2">
        <div class="card col-6 mx-auto">
            <div class="col-11 p-2">
                <h3 class="text-center">Предписания</h3>
                <p class="text-center"><a
                        href="{{route("company.showDestinationSchedules", ["destinationId"=> $destination->id])}}">{{count($destination->schedules)}}</a>
                </p>
            </div>
        </div>
        <div class="col-6">
            <div class="col-11 p-2 mx-auto card">
                <h3 class="text-center">Предстоящи курсове </h3>
                <p class="text-center"><a href="">{{count($destination->courses)}}</a></p>
            </div>
        </div>
    </div>



    <script>
        function toggleTracks() {
            let container = document.getElementById('tracks-container');
            container.classList.toggle('show');
        }
    </script>
@endsection

