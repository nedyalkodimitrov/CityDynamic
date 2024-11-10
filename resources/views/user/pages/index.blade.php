@extends('user.layouts.master')

@section('title')
    User
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{asset("assets/css/searchBar.css")}}"
@endsection

@section("content")
    <livewire:destination-search :cities="$cities"/>
    <div class="col-12 row m-0 ">
        <h2 class="text-center mb-4 mt-4">Нашите предложения</h2>
       <div class="col-11 col-md-10 mx-auto row">
        @foreach($destinations as $destination)
            <div class="col-12 p-0  col-md-4 col-lg-3 mt-4 mb-2 mt-md-0">
                <div class="card col-11 mx-auto">
                    <div class="card-body">
                        <h3>За {{$destination->startStation->name}}</h3>
                        <h6>От {{$destination->endStation->name}}</h6>
                        <a href="{{route("user.showCourses", ["id" => $destination->id])}}" class="btn btn-primary col-12 ">Вижте
                            курсове</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-11 mx-auto row mt-5">
        <h2 class="text-center">Компаниите, които ни се довериха</h2>
        @foreach($companies as $company)
            <div class="col-6 col-md-4 col-lg-2 mt-2 p-0">
                <div class="col-11 mx-auto" style="border: 1px solid grey; border-radius: 5px">
                    <img style="width: 100%; height: 100px;object-fit: contain" src="{{asset("assets/images/".$company->profilePhoto)}}"><br>
                    <p class="text-center">{{$company->name}}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection



