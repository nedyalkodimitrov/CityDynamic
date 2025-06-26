@extends('companies.layouts.master')

@section("content")
    <h1 class="col-12 text-center mb-2">{{$destination?'Редактирай': 'Създай'}} дестинация</h1>
    <livewire:companies.destinations.destination-form :stations="$busStations" :destination="$destination"/>
@endsection

