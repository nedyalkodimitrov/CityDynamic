@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")
    <div class="mt-5">
        <hr>
    </div>
    <div class="col-12 text-center">

        <h1>Всички компании, които ни се довериха</h1>
        <div class="col-11 mx-auto row">
            @foreach($companies as $company)
                <div class="col-6 col-md-4 col-lg-2 mt-2 p-0">
                    <div class="col-11 mx-auto" style="border: 1px solid grey; border-radius: 5px">
                        <a href="{{route('user.showCompany', ['id' => $company->id])}}">
                            <img style="width: 100%; height: 100px;object-fit: contain" alt="{{$company->name}}"
                                 src="{{asset("assets/images/".$company->profile_photo)}}"><br>
                        </a>
                        <a href="{{route('user.showCompany', ['id' => $company->id])}}">
                            <p class="text-center">{{$company->name}}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
