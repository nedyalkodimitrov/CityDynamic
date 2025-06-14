@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")

    <div class="card col-9 mt-5 mx-auto">
        <div class="card-title">
            <h3 class="p-3 pb-0 text-center">
                Количка
            </h3>
        </div>
        <div class="card-body">
            @if($itemsCount > 0)
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
                    @foreach($cart as $ticket)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$ticket?->course->destination->name}}</td>
                            <td>{{$ticket?->startPoint->station?->name}}</td>
                            <td> {{$ticket?->endPoint->station?->name}}</td>
                            <td> {{$ticket?->course->date}} {{$ticket?->course->startTime}}</td>
                            <td> {{$ticket?->price}} лв.</td>
                            <td>
                                <form action="{{route("user.removeFromCart", ["id" => $ticket?->id])}}" method="post"
                                      class="col-12 m-0">
                                    @csrf
                                    <button class="btn btn-danger col-12"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Общо</td>
                        <td> {{\App\Http\Utils\Cart::getInstance(Auth::user())->getTotal()}} лв.</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <div>
                    <form action="{{route("checkout")}}" class="col-12">
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
