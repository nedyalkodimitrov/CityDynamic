@extends('admin.layouts.master')

@section('title')
    Admin Panel
@endsection

@section("content")
    <div class="col-12 col-md-9 mx-auto mb-4 col-lg-9 p-3 card">
    <h1 class="col-12 text-center mb-2"></h1>

        <div>
            <img src="{{asset("images/".$company->profilePhoto)}}" alt="" style="width: 100%">
        </div>
        <div class="form-group col-12">
            <h1 class="text-center">{{$company->name}}</h1>
        </div>

        <div class="form-group col-12">
        <p><b>Founded At: </b>{{$company->foundedAt}}</p>
        </div>
        <div class="form-group col-12">
            <p><b>Description:</b> {{$company->description}}</p>
        </div>
        <div class="form-group col-12">
            <p><b>Contact Email:</b> {{$company->contactEmail}}</p>
        </div>
        <div class="form-group col-12">
            <p><b>Contact Phone:</b> {{$company->contactPhone}}</p>
        </div>
        <div class="form-group col-12">
            <p><b>Contact Address:</b>: {{$company->contactAddress}}</p>
        </div>
    </div>

@endsection

