@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Roles Edit Test</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <label for="name">Name</label>
            <input value="{{$role->name}}" type="text" name="name" id="name" disabled>
            <label for="guard_name">Guard</label>
            <input value="{{$role->guard_name}}" type="text" name="guard_name" id="guard_name" disabled>
        </div>
    </div>
    <form action="{{route('roles.update', $role)}}" class="card" method="post">
        @method('PUT')
        @csrf
        <div class="card-body">
            @foreach($permissions as $permission)
                <label for="{{'role'.$permission->id}}">{{$permission->name}}</label>
                <input
                        type="checkbox"
                        value="{{$permission->id}}"
                        name="permissions[]"
                        id="{{'permission'.$permission->id}}"
                        {{ in_array($permission->id, $role->permissions()->pluck('id')->toArray(), true) ? 'checked' : '' }}
                        {{--El tercer parametro tambien asegura que se chequee el tipo--}}
                >
            @endforeach
            <button type="submit">Actualizar</button>
        </div>
    </form>
@endsection
