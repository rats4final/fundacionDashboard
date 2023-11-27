@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Permissions Edit</h1>
@stop
@section('content')
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <span>{{$error}}</span>
            @endforeach
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('permissions.update', $permission)}}" class="" method="post">
                <label for="name">Name</label>
                <input value="{{$permission->name}}" type="text" name="name" id="name" readonly>
                <label for="description">Description</label>
                <input value="{{$permission->description}}" type="text" name="description" id="description" readonly>
                <label for="email">Guard</label>
                <input value="{{$permission->guard_name}}" type="text" name="guard_name" id="guard_name" readonly>

                @method('PUT')
                @csrf

                @foreach($roles as $role)
                    <label for="{{'role'.$role->id}}">{{$role->name}}</label>
                    <input
                        type="checkbox"
                        value="{{$role->id}}"
                        name="roles[]"
                        id="{{'role'.$role->id}}"
                        {{ in_array($role->id, $role->permissions()->pluck('id')->toArray(), true) ? 'checked' : '' }}
                        {{--El tercer parametro tambien asegura que se chequee el tipo--}}
                    >
                @endforeach
                <button type="submit">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
