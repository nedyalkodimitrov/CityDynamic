@extends('companies.layouts.master')

@section("title")
    Вашите автогари
@endsection

@section("content")

    <div class="col-12">
        <h1 class="col-12 text-center mb-2" style="position: relative;"> Дестинации <a
                    style="position: absolute; right: 0" class="btn btn-success"
                    href="{{route("company.showDestinationsForm")}}">Създай дестинация</a></h1>
    </div>

    <div class="col-12 card">

        <table class="table ">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Име</th>
                <th scope="col">Начална точка</th>
                <th scope="col">Крайна точка</th>
                <th scope="col">Деиствие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($destinations as $destination)
                <tr>
                    <th scope="row"></th>
                    <td>{{$destination->name}}</td>
                    <td>{{$destination->getStartBusStation()->first()->name}} </td>
                    <td>{{$destination->endBusStation()->first()->name}} </td>
                    <td><a href="{{route("company.showDestination", ["id" => $destination->id])}}"><i
                                    class="fa fa-eye"></i></a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Няма добавени дистанции</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
