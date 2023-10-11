@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Users Show</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{$user->name}}</h3>
            <p class="card-text">{{$user->email}}</p>
            <p class="card-text">Roles</p>
            @foreach($user->roles as $role)
                <p>{{$role->name}}</p>
            @endforeach
        </div>
    </div>

@stop



