@extends('companies.layouts.master')

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/weekCheckboxStyle.css")}}">
    <link rel="stylesheet" href="{{asset("assets-company/css/schedule/scheduleStyle.css")}}">
@endsection
@section("content")

    <h1 class="col-12 text-center mb-2">Създайте предписание</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9 " action="{{route("company.createDestination")}}" method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Цена</label>
            <input type="number" step="0.1" class="form-control" name="price" id="exampleInputEmail1"
                   placeholder="Въведете цена">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Начален час</label>
            <input type="time" class="form-control" name="hour" id="exampleInputEmail1"
                   placeholder="Въведете цена">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Начална автобус</label>
            <select class="form-select" name="bus" id="">
                <option value="" disabled selected>Избери автобус</option>
                @forelse($buses as $bus)
                    <option value="{{$bus->id}}">{{$bus->name}}</option>
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
                    <option value="{{$bus->id}}">{{$bus->name}}</option>
                @empty
                    <option value="" disabled>Нямате шофьор</option>
                @endforelse
            </select>
        </div>

        <div>
            <label for="isRepeatable">Да се повтаря ли </label>
            <input class="form-check" type="checkbox" name="repeat" id="isRepeatable">
        </div>

        <div id="dateRange">
            <div class="col-12 row">
                <div class="col-6">
                    <label for="isRepeatable">Началната дата </label>
                    <input type="date" class="form-control" name="repeat" id="isRepeatable">
                </div>
                <div class="col-6">
                    <label for="isRepeatable">Крайна Дата </label>
                    <input type="date" class="form-control" name="repeat" id="isRepeatable">
                </div>
            </div>
        </div>

        <div class="weekdays" id="weekdays">
            <label class="weekday">
                <input type="checkbox" name="day" value="M">
                <span>M</span>
            </label>
            <label class="weekday">
                <input type="checkbox" name="day" value="T">
                <span>T</span>
            </label>
            <label class="weekday">
                <input type="checkbox" name="day" value="W">
                <span>W</span>
            </label>
            <label class="weekday">
                <input type="checkbox" name="day" value="T">
                <span>T</span>
            </label>
            <label class="weekday">
                <input type="checkbox" name="day" value="F">
                <span>F</span>
            </label>
            <label class="weekday">
                <input type="checkbox" name="day" value="S">
                <span>S</span>
            </label>
            <label class="weekday">
                <input type="checkbox" name="day" value="S">
                <span>S</span>
            </label>
        </div>

        <button type="submit" class="btn btn-primary col-12 mt-3">Създай предписание</button>
    </form>

    <script src="{{asset("assets-company/js/schedule/isRepeatableActions.js")}}"></script>
@endsection

