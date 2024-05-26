@extends('companies.layouts.master')

@section("title")
    Вашите курсове
@endsection

@section("content")

    <div class="col-12">
        <h1 class="col-12 text-center mb-2" style="position: relative"> Работници <a
                style="position: absolute; right: 0"
                class="btn btn-success"
                href="{{route("company.showCoursesForm")}}">
                Добави Работник </a></h1>
    </div>



    <div class="col-12 card">

        <table class="table ">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Име</th>
                <th scope="col">Роля</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($employees as $employee)
                <tr>
                    <th scope="row"></th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->getRoleNames()[0]}}</td>
                    <td><i class="fa fa-pen"></i></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Няма добавени работници</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
