@extends('stations.layouts.master')

@section("title")
    Заявки от автобусни компании
@endsection

@section("content")

    <h1 class="col-12 text-center mb-2">Заявки от автобусни компании</h1>
    <div class="col-10 mx-auto">
        @forelse($companies as $company)

            <div class="card col-12 row" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <img style="width: 100%" src="{{asset("assets/images/".$company->profilePhoto)}}" alt="">
{{--                        {{$company->name}}--}}
                    </h5>
                    <p class="text-center">{{$company->name}}</p>
                    <a href="{{route("station.showCompanyRequest", ["id" => $company->id])}}"
                       class="btn btn-danger col-12">Виж заявката</a>
                </div>
            </div>
        @empty
            <p class="text-center" style="width: 100%; font-size: 1.1em;">Няма налични заявки</p>
        @endforelse</div>
@endsection
