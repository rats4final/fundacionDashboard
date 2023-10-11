@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Users Test</h1>
    <a href="{{route("roles.create")}}" class="btn btn-secondary float-right">Crear Rol</a>
@stop
@section('content')
    @php
        $heads = [
            'Nombre',
            'Nombre de Guardia',
            'Creado el',
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
        #medio rara forma de hacerlo pero se ve un poco mas limpio diria
    @endphp
    {{--     Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="tablaRoles" :heads="$heads" striped hoverable with-buttons beautify>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->guard_name}}</td>
                <td>{{$role->created_at}}</td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{route('roles.edit', $role)}}" class="btn btn-xs btn-default text-primary mx-1 shadow"
                           title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <form action="{{  route('roles.destroy', $role) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-xs btn-default text-danger p-1 mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{route('roles.show', $role)}}" class="btn btn-xs btn-default text-teal mx-1 shadow"
                           title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

@stop



