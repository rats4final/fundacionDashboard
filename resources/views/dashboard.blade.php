@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card my-4">
        <div class="card-body">
            {{__("You're logged in!")}}
        </div>
    </div>
@stop
