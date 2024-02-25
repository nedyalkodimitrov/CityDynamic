@extends('companies.layouts.master')

@section("title")
    Вашите автобуси
@endsection

@section("content")

    <h1 class="col-12 text-center mb-2 " style="position: relative;">Вашите автобуси <a style="position: absolute; right: 0" class="btn btn-success"
                                                           href="{{route("company.showBusCreateForm")}}">Добави автобус</a></h1>

    <div class="col-12 card">

        <table class="table ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Име</th>
                <th scope="col">Модел</th>
                <th scope="col">Места</th>
                <th scope="col">Деиствие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($buses as $bus)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$bus->name}}</td>
                    <td>{{$bus->model}}</td>
                    <td>{{$bus->seats}}</td>
                    <td>
                        <a href="{{route("company.showBus", ["id" => $bus->id])}}" class="btn btn-primary col-12">Виж още</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Няма добавени автобуси</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
