@extends('companies.layouts.master')

@section("title")
    Вашите автобуси
@endsection

@section("content")

    <h1 class="col-12 text-center mb-2 " style="position: relative;">Вашите автобуси <a style="position: absolute; right: 0" class="btn btn-success"
                                                           href="{{route("company.showBusCreateForm")}}">Добави автобус</a></h1>

 <div class="row col-12">
     @foreach($buses as $bus)
         <div class="col-3 ">
             <div class="card col-11 mx-auto">
                 <div class="card-body">
                     <h5 class="card-title">{{$bus->name}}</h5>
                     <p class="card-text">{{$bus->model}} | {{$bus->seats}} <i
                             class="fas fa-users"></i></p>
                     <a href="{{route("company.showBus", ["id" => $bus->id])}}" class="btn btn-primary col-12">Виж още</a>
                 </div>
             </div>

         </div>
     @endforeach
 </div>
@endsection
