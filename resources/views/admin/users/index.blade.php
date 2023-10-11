@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Users Test</h1>
@stop
@section('content')
    @php
        $heads = [
            'Nombre',
            'Email',
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
        #medio rara forma de hacerlo pero se ve un poco mas limpio diria
    @endphp
{{--     Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="tablaUsuario" :heads="$heads" striped hoverable with-buttons beautify>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{route('users.edit', $user)}}" class="btn btn-xs btn-default text-primary mx-1 shadow"
                          title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <form action="{{  route('users.destroy', $user) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-xs btn-default text-danger p-1 mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{route('users.show', $user)}}" class="btn btn-xs btn-default text-teal mx-1 shadow"
                           title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

@stop



