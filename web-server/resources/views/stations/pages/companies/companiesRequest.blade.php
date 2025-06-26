@extends('stations.layouts.master')

@section("title")
    Заявки от автобусни компании
@endsection

@section("content")

    <h1 class="col-12 text-center mb-2">Заявки от автобусни компании</h1>
    <div class="col-10 mx-auto row">
        @forelse($companies as $company)
            <div class=" col-4 row m-1" >
               <div class="card">
                   <div class="card-body">
                       <h5 class="card-title">
                           <img style="max-height: 150px; object-fit: cover; width: 100%" src="{{asset("assets/images/".$company->profile_photo)}}" alt="">
                       </h5>
                       <p class="text-center">{{$company->name}}</p>
                       <a href="{{route("station.showCompanyRequest", ["id" => $company->id])}}"
                          class="btn btn-danger col-12">Виж заявката</a>
                   </div>
               </div>
            </div>
        @empty
            <p class="text-center" style="width: 100%; font-size: 1.1em;">Няма налични заявки</p>
        @endforelse</div>
@endsection
