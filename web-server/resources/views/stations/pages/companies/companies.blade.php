@extends('stations.layouts.master')

@section("title")
    Автобусни компании
@endsection

@section("content")

    <h1 class="col-12 text-center mb-2">Вашите автобусни компании </h1>
<div class="col-12 mx-auto row">
    @forelse($companies as $company)

       <div class="col-3">
           <div class="card col-11 mx-auto row" style="width: 18rem;">
               <div class="card-body">
                   <h5 class="card-title">{{$company->name}}</h5>
                   <p class="card-text"></p>
                   <a href="{{route("station.showCompany", ["id" => $company->id])}}" class="btn btn-primary col-12">Виж още</a>
               </div>
           </div>
       </div>
    @empty
        <p class="text-center" style="width: 100%; font-size: 1.1em;">Нямате наличи връзки с автогари</p>
    @endforelse
</div>
@endsection
