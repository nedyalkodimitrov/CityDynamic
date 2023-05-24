@extends('admin.layouts.master')

@section("title")
    Вашите автобуси
@endsection

@section("content")

    <h1 class="col-12 text-center mb-4" style="position:relative;">Комапнии <a style="position: absolute; right: 0" class="btn btn-success"  href="{{route("admin.showCompanyCreate")}}"> Създай компания </a></h1>
    {{----}}
    <div class="col-12 row ">

        @foreach($companies as $company)
            <div class="col-4 mb-3 ">
                <div class="card col-11" >
                    <div class="card-body">
                        <h5 class="card-title">{{$company->name}}</h5>
                        <a href="{{route("admin.showCompany", ["id" => $company->id])}}" class="btn btn-primary col-12">Виж още</a>
                    </div>
                </div>

            </div>
        @endforeach

    </div>
@endsection
