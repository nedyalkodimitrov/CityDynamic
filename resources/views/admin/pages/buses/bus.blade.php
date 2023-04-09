@extends('admin.layouts.master')

@component("title")@endcomponent

@component("content")

    <h1>Name: {{$bus->name}}</h1>
    <h1>Model: {{$bus->model}}</h1>
    <h1>Seats: {{$bus->seats}}</h1>
    <h1>Current station:{{$bus->currentStation}}</h1>

@endcomponent
