@extends('companies.layouts.master')

@section("content")
    <h1 class="col-12 text-center mb-2">Създайте дестинация</h1>
    <livewire:companies.destinations.destination-form :stations="$busStations"/>
@endsection

