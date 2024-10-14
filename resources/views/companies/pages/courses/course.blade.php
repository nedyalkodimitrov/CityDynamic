@extends('companies.layouts.master')

@section('title')
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Редактирай курс</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" action="{{route("company.editCourse", ["id" => $course->id])}}"
          method="post">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Дестинация</label>
            <select class="form-select" name="destination" id="">
                <option value="" disabled selected>Избери дестинация</option>
                @foreach($destinations as $destination)
                    <option
                        @selected($destination->id == $course->destination_id) value="{{$destination->id}}">{{$destination->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Автобус </label>
            <select class="form-select" name="bus" id="">
                <option value="" disabled selected>Избери автобус</option>
                @foreach ($buses as $bus)
                    <option @selected($course->bus_id == $bus->id) value="{{$bus->id}}">{{$bus->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Дата </label>
            <input type="date" name="date" class="form-control" id="exampleInputPassword1" placeholder="Избрете дата"
                   value="{{$course->date}}">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Време на тръгване</label>
            <input type="time" name="startTime" class="form-control" id="startTime" placeholder="Избрете време"
                   value="{{$course->start_time}}">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Време на пристигане</label>
            <input type="time" name="endTime" class="form-control" id="endTime"
                   placeholder="Избрете време" value=" value="{{$course->end_time}}">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Цена на билетите </label>
            <input type="number" name="price" step="0.1" class="form-control" id="exampleInputPassword1"
                   placeholder="Каква е цената на билетите" value="{{$course->price}}">
        </div>
        @error('')
        @foreach($errors->all() as $error)
            <div class="alert alert-danger col-12 mt-3" role="alert">
                {{$error}}
            </div>
        @endforeach
        @enderror
        <button type="submit" class="btn btn-primary col-12 mt-3">Запази промените</button>
    </form>

    <script>
        document.getElementById("startTime").value = "{{$course->start_time}}";
        document.getElementById("endTime").value = "{{$course->endTime}}";
    </script>
@endsection

