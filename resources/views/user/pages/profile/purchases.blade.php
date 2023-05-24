@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")

    <div class="card">
        <div class="card-title">
            <h3 class="p-3 text-center">
                Направени поръчки
            </h3>
        </div>
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Закупени билети</th>
                    <th scope="col">Крайна цена</th>
                    <th scope="col">Направена на</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->ticketNumbers}}</td>
                        <td>{{$order->totalPrice}} лв.</td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            <a href="{{route("user.showPurchase", ["id" => $order->id])}}" class="btn btn-primary">Виж още</a>
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>

        </div>

    </div>

@endsection
