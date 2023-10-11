@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Users Create Test</h1>
@stop
@section('content')
    <form action="{{route("roles.store")}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" autocomplete="true" placeholder="Nombre del Rol">
            @foreach($permissions as $permission)
                <label>
                    {{$permission->name}}
                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                </label>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

