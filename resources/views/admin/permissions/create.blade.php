@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>{{__("Create Permissions")}}</h1>
@stop
@section('content')
    <form action="{{route("permissions.store")}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{__("Name")}}</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" autocomplete="true" placeholder="{{__("Permission Name")}}">
            <label for="description" class="form-label">{{__("Description")}}</label>
            <input name="description" type="text" class="form-control" id="description" aria-describedby="descriptionHelp" autocomplete="true" placeholder="{{__("Permission Description")}}">
            @foreach($roles as $role)
                <label>
                    {{$role->name}}
                    <input type="checkbox" name="roles[]" value="{{$role->id}}">
                </label>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">{{__("Submit")}}</button>
    </form>
@endsection

