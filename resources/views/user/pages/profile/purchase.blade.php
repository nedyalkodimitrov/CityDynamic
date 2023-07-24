@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")

    {{--    <div class="card">--}}
    {{--        <div class="card-title">--}}
    {{--            <h3 class="p-3 text-center">--}}
    {{--                Поръчка #{{$order->id}}--}}
    {{--            </h3>--}}
    {{--        </div>--}}
    {{--        <div class="card-body">--}}

    {{--            <table class="table">--}}
    {{--                <thead>--}}
    {{--                <tr>--}}
    {{--                    <th scope="col">#</th>--}}
    {{--                    <th scope="col">Дестинация</th>--}}
    {{--                    <th scope="col">Начална автогара</th>--}}
    {{--                    <th scope="col">Начална автогара</th>--}}
    {{--                    <th scope="col">Дата и час на тръгване</th>--}}
    {{--                    <th scope="col">Цена</th>--}}
    {{--                </tr>--}}
    {{--                </thead>--}}
    {{--                <tbody>--}}
    {{--                @php--}}
    {{--                $i = 1;--}}

    {{--                @endphp--}}
    {{--                @foreach($order->getShoppingCarts as $item)--}}
    {{--                    <tr>--}}
    {{--                        <th scope="row">{{$i}}</th>--}}
    {{--                        <td>{{$item->getTicket->getCourse->getDestination->name}}</td>--}}
    {{--                        <td>{{$item->getTicket->getCourse->getDestination->getStartBusStation->name}}</td>--}}
    {{--                        <td> {{$item->getTicket->getCourse->getDestination->getStartBusStation->name}}</td>--}}
    {{--                        <td> {{$item->getTicket->getCourse->date}} {{$item->getTicket->getCourse->startTime}}</td>--}}
    {{--                        <td> {{$item->getTicket->price}} лв.</td>--}}

    {{--                    </tr>--}}
    {{--                    @php--}}
    {{--                        $i++;--}}

    {{--                    @endphp--}}

    {{--                @endforeach--}}


    {{--                </tbody>--}}
    {{--            </table>--}}

    {{--        </div>--}}

    {{--    </div>--}}

    <hr>
    <h1 class="text-center">Поръчка #{{$order->id}}</h1>
    <div class="col-12 row m-0 mt-5">
        @php
            $i = 1;

        @endphp
        @foreach($order->getShoppingCarts as $item)
            <div class=" col-12  col-md-4 col-lg-4 mt-3">
                <div class="card col-11 mx-auto p-3">
                    <div class="card-title text-center">
                        <b>#{{$i}}</b> {{$item->getTicket->getCourse->getDestination->name}} </div>
                    <hr class="p-0  m-0">
                    <div class="card-body">
                        <p>{{$item->getTicket->getCourse->getDestination->getStartBusStation->name}}
                            - {{$item->getTicket->getCourse->getDestination->getEndBusStation->name}}</p>
                        <p>Тръгване: {{\Carbon\Carbon::parse($item->getTicket->getCourse->date)->format("m.d.Y")}} </p>
                        <p><b>{{\Carbon\Carbon::parse($item->getTicket->getCourse->startTime)->format("H:i")}} - {{\Carbon\Carbon::parse($item->getTicket->getCourse->endTime)->format("H:i")}}</b></p>

                        <p>{{$item->getTicket->price}} лв</p>
                        @php
                            $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                        @endphp
                        {{--                        <div>--}}
                        <img style="    position: relative;
    left: 50%;
    transform: translate(-50%,0);"
                             src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($item->id, $generatorPNG::TYPE_CODE_128)) }}">

                        {{--                        </div>--}}
                    </div>

                    {{--                <th scope="row">{{$i}}</th>--}}
                    {{--                <td>{{$item->getTicket->getCourse->getDestination->name}}</td>--}}
                    {{--                <td>{{$item->getTicket->getCourse->getDestination->getStartBusStation->name}}</td>--}}
                    {{--                <td> {{$item->getTicket->getCourse->getDestination->getStartBusStation->name}}</td>--}}
                    {{--                <td> {{$item->getTicket->getCourse->date}} {{$item->getTicket->getCourse->startTime}}</td>--}}
                    {{--                <td> {{$item->getTicket->price}} лв.</td>--}}

                </div>
            </div>
            @php
                $i++;

            @endphp

        @endforeach

    </div>

@endsection
