@extends('admin.layouts.master')

@section('title')
    Admin Panel
@endsection

@section("content")
    <div class="col-12 col-md-9 mx-auto mb-4 col-lg-9 p-3 card">
    <h1 class="col-12 text-center mb-2"></h1>

        <div class="row">
            <img class="mx-auto" src="{{asset("assets/images/".$company->profile_photo)}}" alt="" style="max-width: 100px; margin: auto">
        </div>
        <div class="form-group col-12">
            <h1 class="text-center">{{$company->name}}</h1>
        </div>

        <div class="form-group col-12">
        <p><b>Founded At: </b>{{$company->founded_at}}</p>
        </div>
        <div class="form-group col-12">
            <p><b>Description:</b> {{$company->description}}</p>
        </div>
        <div class="form-group col-12">
            <p><b>Contact Email:</b> {{$company->contact_email}}</p>
        </div>
        <div class="form-group col-12">
            <p><b>Contact Phone:</b> {{$company->contact_phone}}</p>
        </div>
        <div class="form-group col-12">
            <p><b>Contact Address:</b>: {{$company->contact_address}}</p>
        </div>
    </div>

@endsection

