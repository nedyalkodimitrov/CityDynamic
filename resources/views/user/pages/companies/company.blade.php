@extends('user.layouts.master')

@section('title')
    {{$company->name}}
@endsection

@section("content")
    <div class="mt-5">
        <hr>
    </div>
    <div class="col-12 text-center">
        <div class="card col-11 mx-auto">
            <div class="card-title mt-2">
                <img src="{{asset('assets/images/'.$company->profile_photo)}}" alt="">
                <h1>{{$company->name}}</h1>
            </div>
            <div class="card-body">
                <div>
                    <p>{{$company->description}}</p>
                </div>
                <hr>
                <div class="col-12 d-flex justify-content-center mx-auto">
                    <p class="p-1 m-0" style="border-right: 1px solid lightgray">Основана през {{\Carbon\Carbon::parse($company->founded_at)->format('d.m.Y')}}</p>
                    <p class="p-1 m-0 " style="border-right: 1px solid  lightgray">Телефон: {{$company->contact_phone}}</p>
                    <p class="p-1 m-0 "> Имейл: {{$company->contact_email}}</p>
                </div>
                <p class="p-1 m-0 flex-grow-1">Адрес: {{$company->contact_address}}</p>
            </div>
        </div>
    </div>
@endsection
