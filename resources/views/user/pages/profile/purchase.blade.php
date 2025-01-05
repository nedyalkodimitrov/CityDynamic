@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")
    <h1 class="text-center">Поръчка #{{$order->id}}</h1>
    <div class="col-12 row m-0 mt-5">
        @foreach($order->tickets as $ticket)
            <div class=" col-12  col-md-4 col-lg-4 mt-3">
                <div class="card col-11 mx-auto p-3">
                    <div class="card-title text-center">
                        <b>#{{$loop->iteration}}</b> {{$ticket->course->destination->name}} </div>
                    <hr class="p-0  m-0">
                    <div class="card-body">
                        
                        <p>{{$ticket->course->destination->startStation->name}}
                            - {{$ticket->course->destination->endStation->name}}</p>
                        <p>Тръгване: {{\Carbon\Carbon::parse($ticket->course->date)->format("m.d.Y")}} </p>
                        <p><b>{{\Carbon\Carbon::parse($ticket->course->start_time)->format("H:i")}} - {{\Carbon\Carbon::parse($ticket->course->end_time)->format("H:i")}}</b></p>

                        <p>{{$ticket->price}} лв</p>
                        @php
                            $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                        @endphp
                        <img style="    position: relative;
    left: 50%;
    transform: translate(-50%,0);"
                             src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($ticket->id, $generatorPNG::TYPE_CODE_128)) }}">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
