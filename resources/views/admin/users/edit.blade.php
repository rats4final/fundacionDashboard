@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Users Create Test</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <label for="name">Name</label>
            <input value="{{$user->name}}" type="text" name="name" id="name" disabled>
            <label for="email">Email</label>
            <input value="{{$user->email}}" type="text" name="email" id="email" disabled>
        </div>
    </div>
    <form action="{{route('users.update', $user)}}" class="card" method="post">
        @method('PUT')
        @csrf
        <div class="card-body">
            @foreach($roles as $role)
                <label for="{{'role'.$role->id}}">{{$role->name}}</label>
                <input
                   type="checkbox"
                   value="{{$role->id}}"
                   name="roles[]"
                   id="{{'role'.$role->id}}"
                   {{ in_array($role->id, $user->roles()->pluck('id')->toArray(), true) ? 'checked' : '' }}
                   {{--El tercer parametro tambien asegura que se chequee el tipo--}}
                >
            @endforeach
            <button type="submit">Actualizar</button>
        </div>
    </form>
@endsection
