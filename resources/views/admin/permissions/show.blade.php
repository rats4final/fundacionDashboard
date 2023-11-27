@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Roles Show</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $permission->name }}</h3>
            <p class="card-text">{{ $permission->description }}</p>
            <p class="card-text">{{ $permission->guard_name  }}</p>
            <p class="card-text">Roles</p>
            @foreach($permission->roles as $role)
                <p>{{$role->name}}</p>
            @endforeach
        </div>
    </div>

@stop



