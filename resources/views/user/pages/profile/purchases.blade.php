@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")

            <h3 class="p-3 mt-4 text-center">
                Направени поръчки
            </h3>

            {{--            <table class="table">--}}
            {{--                <thead>--}}
            {{--                <tr>--}}
            {{--                    <th scope="col">#</th>--}}
            {{--                    <th scope="col">Закупени билети</th>--}}
            {{--                    <th scope="col">Крайна цена</th>--}}
            {{--                    <th scope="col">Направена на</th>--}}
            {{--                    <th scope="col">Действие</th>--}}
            {{--                </tr>--}}
            {{--                </thead>--}}
            {{--                <tbody>--}}
            {{--                @foreach($orders as $order)--}}
            {{--                    <tr>--}}
            {{--                        <th scope="row">{{$order->id}}</th>--}}
            {{--                        <td>{{$order->ticketNumbers}}</td>--}}
            {{--                        <td>{{$order->totalPrice}} лв.</td>--}}
            {{--                        <td>{{$order->created_at}}</td>--}}
            {{--                        <td>--}}
            {{--                            <a href="{{route("user.showPurchase", ["id" => $order->id])}}" class="btn btn-primary">Виж още</a>--}}
            {{--                        </td>--}}
            {{--                    </tr>--}}

            {{--                @endforeach--}}


            {{--                </tbody>--}}
            {{--            </table>--}}
            {{--            --}}

            <div class="col-10 mx-auto row">
            @foreach($orders as $order)
                <div class="col-12 col-md-6 m-0 mt-3">
                   <div class="col-11 mx-auto card p-3">
                       <p><b>Номер на поръчка: </b> {{$order->id}}</p>
                       <p><b>Дата на поръчка: </b>{{\Carbon\Carbon::parse($order->created_at)->format("H:i d.m.Y")}}</p>
                       <p><b>Закупени билета: </b>{{$order->ticketNumbers}}</p>
                       <p><b>Крайна цена: </b>{{$order->totalPrice}} лв.</p>
                       <p class="col-12">
                           <a href="{{route("user.showPurchase", ["id" => $order->id])}}" class="btn btn-primary col-12">Виж
                               още</a>
                       </p>

                   </div>

                </div>
            @endforeach
            </div>

@endsection
