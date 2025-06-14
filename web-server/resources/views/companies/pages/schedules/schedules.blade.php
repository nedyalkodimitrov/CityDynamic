@extends("companies.layouts.master")

@section("title")

@endsection

@section("content")

    <div class="col-12">
        <h1 class="col-12 text-center mb-2" style="position: relative;"> Предписание <a style="position: absolute; right: 0" class="btn btn-success"
                                                           href="{{route("company.showDestinationScheduleForm", ["destinationId" => $destinationId])}}">Създай предписание</a></h1>
    </div>
    <div class="col-12 card mt-5">

        <table class="table ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Диапазон</th>
                <th scope="col">Дни от седмицата</th>
                <th scope="col">Час</th>
                <th scope="col">Автобус</th>
                <th scope="col">Шофьор</th>
                <th scope="col">Цена</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($schedules as $schedule)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$schedule->start_date}} - {{$schedule->end_date}}</td>
                    <td>{{is_null($schedule->week_days)? 'Всички' :  implode(', ',json_decode($schedule->week_days))}}</td>
                    <td>{{$schedule->hour}}</td>
                    <td>{{$schedule->bus?->name}}</td>
                    <td>{{$schedule->driver?->name ?? 'Няма'}}</td>
                    <td>{{$schedule->price}}</td>
                    <td>
                        <a href="{{route("company.editDestinationSchedule", ["destinationId" => $destinationId, "scheduleId" => $schedule->id])}}" class="btn btn-primary">
                            <i class="fa fa-pen"></i>
                        </a>
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
