@extends('companies.layouts.master')

@section('title')
    User Panel
@endsection

@section("content")
    <h1 class="col-12 text-center mb-2">Редактирай автобус</h1>
    <form class="col-12 col-md-9 mx-auto col-lg-9" method="post"
          action="{{route("company.editBus",["id" => $bus->id])}}">
        @csrf
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Какво е името на автобуса</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Falcon"
                   value="{{$bus->name}}">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputEmail1">Какъв е модела на автобуса </label>
            <input type="text" class="form-control" name="model" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="{{$bus->model}}" placeholder="Mercedes ">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Колко места общо места предоставя?</label>
            <input type="text" class="form-control" name="seats" id="seats" value="{{$bus->seats}}"
                   placeholder="24">
        </div>
        <div class="form-group col-12 mt-3">
            <label for="exampleInputPassword1">Колко места има на един ред?</label>
            <input type="text" class="form-control" name="seatsPerRow" id="seatsPerRow" value="" placeholder="0">
        </div>
        <p class="text-center ">Интерактивна схема на автобуса</p>
        <div id="bus-seats" class="col-12 mt-2 d-flex"></div>
        <button type="submit" class="btn btn-primary col-12 mt-3">Редактирай автобус</button>
    </form>

<script src="{{asset('assets/js/generateBusSeats.js')}}"></script>
    <script>

        let seats = document.getElementById('seats');
        let seatsPerRow = document.getElementById('seatsPerRow');
        seats.addEventListener('input', function () {
            if (seatsPerRow.value === '' || seatsPerRow.value === '0') {
                return;
            }

            generateSeats(seats.value, seatsPerRow.value);
        });

        seatsPerRow.addEventListener('input', function () {
            if (seatsPerRow.value === '' || seatsPerRow.value === '0') {
                return;
            }

            generateSeats(seats.value, seatsPerRow.value);
        });
    </script>




    <script>


        Echo.private('bus.4')
            .listen('SeatsStatusEvent', (e) => {
                alert(e.message);
            });
    </script>
@endsection

