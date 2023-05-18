@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")
    <div class="col-12 row">
        <div class="col-12">
            <h1 class="col-12 text-center mb-4">Нашите дестинации</h1>
        </div>
        @foreach($destinations as $destination)
       <div class="col-3">
           <div class="card col-11">
               <div class="card-body">
                   <h3>За {{$destination->getEndBusStation->getCity->name}}</h3>
                   <h6>От {{$destination->getStartBusStation->getCity->name}}</h6>
                   <a href="{{route("user.showCourses", ["id" => $destination->id])}}" class="btn btn-primary">Вижте курсове</a>
               </div>

           </div>
       </div>

        @endforeach
    </div>
@endsection

