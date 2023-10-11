@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Permissions Show</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $role->name }}</h3>
            <p class="card-text">{{ $role->guard_name  }}</p>
            <p class="card-text">Permisos</p>
            @foreach($role->permissions as $permission)
                <p>{{$permission->description}}</p>
            @endforeach
        </div>
    </div>

@stop



