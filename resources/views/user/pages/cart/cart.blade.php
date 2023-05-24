@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")

    <div class="card">
        <div class="card-title">
            <h3 class="p-3 pb-0 text-center">
                Количка
            </h3>
        </div>
        <div class="card-body">
            @if(count($items) > 0)

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Дестинация</th>
                        <th scope="col">Начална автогара</th>
                        <th scope="col">Начална автогара</th>
                        <th scope="col">Дата и час на тръгване</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Деиствие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1;
                        $totalPrice = 0
                    @endphp
                    @foreach($items as $item)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$item->getTicket->getCourse->getDestination->name}}</td>
                            <td>{{$item->getTicket->getCourse->getDestination->getStartBusStation->name}}</td>
                            <td> {{$item->getTicket->getCourse->getDestination->getStartBusStation->name}}</td>
                            <td> {{$item->getTicket->getCourse->date}} {{$item->getTicket->getCourse->startTime}}</td>
                            <td> {{$item->getTicket->price}} лв.</td>
                            <td> <form action="{{route("user.removeFromCart", ["id" => $item->id])}}" method="post" class="col-12 m-0">
                                    @csrf
                                    <button class="btn btn-danger col-12"><i class="fa fa-minus"></i></button>
                                </form></td>

                        </tr>
                        @php
                            $i++;
                            $totalPrice += $item->getTicket->price;
                        @endphp

                    @endforeach

                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Общо</td>
                        <td> {{$totalPrice}} лв.</td>
                        <td> </td>

                    </tr>
                    </tbody>
                </table>
                <div>
                    <form action="{{route("user.buy")}}" method="post" class="col-12">
                        @csrf
                        <button class="btn btn-success col-12">Завърши поръчката</button>
                    </form>
                </div>

            @else
                <p class="col-12 text-center">Количката е празна</p>
            @endif

        </div>

    </div>

@endsection
