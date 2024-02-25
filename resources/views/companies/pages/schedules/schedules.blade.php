@extends('companies.layouts.master')

@section("title")
    Вашите автогари
@endsection

@section("content")

    <div class="col-12">
        <h1 class="col-12 text-center mb-2" style="position: relative;"> Предписание <a style="position: absolute; right: 0" class="btn btn-success"
                                                           href="{{route("company.showDestinationsForm")}}">Създай предписание</a></h1>
    </div>
    <div class="col-12 card mt-5">

        <table class="table ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Цена</th>
                <th scope="col">Час</th>
                <th scope="col">Автобус</th>
                <th scope="col">Шофьор</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($destination->getSchedules as $schedule)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$schedule->price}}</td>
                    <td>{{$schedule->hour}}</td>
                    <td>{{$schedule->getBus->name}}</td>
                    <td>{{$schedule->getDriver[0]->name}}</td>
                    <td>
                        <i class="fa fa-pen"></i>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center col-12">Няма добавени</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
