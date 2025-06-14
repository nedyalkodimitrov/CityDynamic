@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")
    <div class="card col-10 mx-auto" style="margin-top: 5em;">
        <div class="card-body col-12">
            <h1 class="text-center">Поръчка #{{$order->id}}</h1>
            <div class="col-12 row m-0 mt-5">
                @foreach($order->tickets as $ticket)
                    <div class="col-12  col-md-4 col-lg-4 mt-3">
                        <div class="col-11 mx-auto p-3" style="border: 1px solid rgba(128,128,128,0.63)">
                            <div class="card-title text-center">
                                <b>#{{$loop->iteration}}</b> {{$ticket->course->destination->name}} </div>
                            <hr class="p-0  m-0">
                            <div class="card-body">
                                <p class="text-center">От {{$ticket->course->destination->startStation->name}}
                                    до {{$ticket->course->destination->endStation->name}}</p>
                                <p>Дата: {{\Carbon\Carbon::parse($ticket->course->date)->format("m.d.Y")}} </p>
                                <p>Цена: {{$ticket->price}} лв</p>
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
        </div>
    </div>
@endsection
