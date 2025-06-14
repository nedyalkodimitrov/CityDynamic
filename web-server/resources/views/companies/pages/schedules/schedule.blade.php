@extends('companies.layouts.master')

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/weekCheckboxStyle.css")}}">
    <link rel="stylesheet" href="{{asset("assets-company/css/schedule/scheduleStyle.css")}}">
@endsection

@section('content')
    <h1 class="col-12 text-center mb-2">Предписание</h1>

    <div class=" col-12 mb-2 ">
        <div class="col-12 col-md-9 mx-auto col-lg-12  p-4" method="post">
            <form class="col-12 col-md-9 mx-auto col-lg-9 "
                  action="{{route("company.editDestinationSchedule", ["destinationId" => $destinationId, "scheduleId" => $schedule->id])}}" method="post">
                @csrf
                <div class="form-group col-12">
                    <label for="exampleInputEmail1">Цена</label>
                    <input type="number" step="0.1" class="form-control" name="price" id="exampleInputEmail1"
                           placeholder="Въведете цена" value="{{$schedule->price}}">
                </div>
                <div class="form-group col-12">
                    <label for="exampleInputEmail1">Начален час</label>
                    <input type="time" class="form-control" name="hour" id="exampleInputEmail1"
                           placeholder="Въведете цена" value="{{$schedule->hour}}">
                </div>
                <div class="form-group col-12">
                    <label for="exampleInputEmail1">Начална автобус</label>
                    <select class="form-select" name="bus" id="">
                        <option value="" disabled selected>Избери автобус</option>
                        @forelse($buses as $bus)
                            <option value="{{$bus->id}}" @selected($bus->id == $schedule->bus_id)>{{$bus->name}}</option>
                        @empty
                            <option value="" disabled>Нямате автобуси</option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group col-12">
                    <label for="exampleInputEmail1">Избери шофьор</label>
                    <select class="form-select" name="driver" id="">
                        <option value="" disabled selected>Избери шофьор</option>
                        @forelse($drivers as $driver)
                            <option value="{{$bus->id}}" @selected($bus->id == $schedule->bus_id)>{{$bus->name}}</option>
                        @empty
                            <option value="" disabled>Нямате шофьор</option>
                        @endforelse
                    </select>
                </div>

                <div id="dateRange">
                    <div class="col-12 row">
                        <div class="col-6">
                            <label for="isRepeatable">Началната дата</label>
                            <input type="date" class="form-control" name="startDate" id="isRepeatable" value="{{$schedule->start_date}}">
                        </div>
                        <div class="col-6">
                            <label for="isRepeatable">Крайна Дата</label>
                            <input type="date" class="form-control" name="endDate" id="isRepeatable" value="{{$schedule->end_date}}">
                        </div>
                    </div>
                </div>

                @php($days = is_null($schedule->week_days)? [] : json_decode($schedule->week_days))
                <div class="weekdays mt-2" id="weekdays">
                    <label>В кой дни от седмицата да се изпълнява <br>
                        <span style="font-size: 12px;padding-left: 1em;">* ако не е избран специфичен ден, предписанието ще се повтаря през всеки ден от избрания период</span>
                    </label>
                    <br>
                    <label class="weekday">
                        <input type="checkbox" name="days[]" value="M" @checked(in_array('M', $days))>
                        <span>M</span>
                    </label>
                    <label class="weekday">
                        <input type="checkbox" name="days[]" value="T" @checked(in_array('T', $days))>
                        <span>T</span>
                    </label>
                    <label class="weekday">
                        <input type="checkbox" name="days[]" value="W" @checked(in_array('W', $days))>
                        <span>W</span>
                    </label>
                    <label class="weekday">
                        <input type="checkbox" name="days[]" value="T" @checked(in_array('T', $days))>
                        <span>T</span>
                    </label>
                    <label class="weekday">
                        <input type="checkbox" name="days[]" value="F" @checked(in_array('F', $days))>
                        <span>F</span>
                    </label>
                    <label class="weekday">
                        <input type="checkbox" name="days[]" value="S" @checked(in_array('S', $days))>
                        <span>S</span>
                    </label>
                    <label class="weekday">
                        <input type="checkbox" name="days[]" value="S" @checked(in_array('S', $days))>
                        <span>S</span>
                    </label>
                </div>

                @component("admin.components.messages")@endcomponent

                <button type="submit" class="btn btn-primary col-12 mt-3">Редактирай предписание</button>
            </form>
            <form class="col-12 row" method="post" action="{{route('company.deleteDestinationSchedule', ['destinationId' => $destinationId, 'scheduleId' => $schedule->id])}}">
                @csrf
                <button type="submit" class="btn btn-danger col-9 mt-3 mx-auto">Изтрий предписание</button>
            </form>
        </div>
    </div>

@endsection

