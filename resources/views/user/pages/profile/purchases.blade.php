@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")

    <h3 class="p-3 mt-4 text-center">
        Направени поръчки
    </h3>

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
        @forelse($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->ticket_numbers}}</td>
                <td>{{$order->total_price}} лв.</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <a href="{{route("user.showPurchase", ["id" => $order->id])}}" class="btn btn-primary">Виж още</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Нямате направени поръчки</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
