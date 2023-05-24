@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")

    <div class="card">
        <div class="card-title">
            <h3 class="p-3 text-center">
                Поръчка #{{$order->id}}
            </h3>
        </div>
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Дестинация</th>
                    <th scope="col">Начална автогара</th>
                    <th scope="col">Начална автогара</th>
                    <th scope="col">Дата и час на тръгване</th>
                    <th scope="col">Цена</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i = 1;

                @endphp
                @foreach($order->getShoppingCarts as $item)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$item->getTicket->getCourse->getDestination->name}}</td>
                        <td>{{$item->getTicket->getCourse->getDestination->getStartBusStation->name}}</td>
                        <td> {{$item->getTicket->getCourse->getDestination->getStartBusStation->name}}</td>
                        <td> {{$item->getTicket->getCourse->date}} {{$item->getTicket->getCourse->startTime}}</td>
                        <td> {{$item->getTicket->price}} лв.</td>

                    </tr>
                    @php
                        $i++;

                    @endphp

                @endforeach


                </tbody>
            </table>

        </div>

    </div>

@endsection
