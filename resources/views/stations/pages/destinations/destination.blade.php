@extends('stations.layouts.master')

@section("title")
    Дестинация
@endsection

@section("content")
    <div class="card col-12 row p-0 m-2">
        <div class="card-body ">
            <div class="card-title row justify-content-between">
                <h4 class="col-12 text-center">{{$destination->name}} </h4>

            </div>
            <h5>Курсове:</h5>
            @forelse($destination->getCourses()->where("date", ">=", date("Y-m-d")) as $course)

                <p class="card-text"><i class="fas fa-bus" aria-hidden="true"></i>  {{$course->getBus->name}} ({{$course->getBus->model}})
                    <br>
                    <i class="fas fa-calendar"></i> {{$course->date}} <br>
                    Тръгване: {{$course->startTime}} <i class="fas fa-clock"></i><br>
                    Пристигане: {{$course->endTime}} <i class="fas fa-clock"></i><br>
                    Цена на билети: {{$course->getTicket->price}} лв.<br>
                    Места: {{$course->getBus->seats}}<br>

                </p>
            @empty
                <p class="text-center" style="width: 100%; font-size: 1.1em;">Няма предсотоящи курсове</p>

            @endforelse


        </div>
    </div>

@endsection

