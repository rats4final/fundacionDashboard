@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Users Create Test</h1>
@stop
@section('content')
    <form action="{{route("users.store")}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" autocomplete="true">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" autocomplete="true">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="d-flex align-items-center ">
                <input name="password" type="password" class="form-control" id="password">
                <i class="fas fa-eye px-2" id="eye"></i>
            </div>
            <input type="button" class="mt-2" value="Generate Password" id="generatorButton">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@section('js')
    <script>
        const randomPasswordGenerator = () => Math.random().toString(36).slice(2) + Math.random().toString(36).toUpperCase().slice(2)
        const password = document.querySelector('#password')
        const eye = document.querySelector('#eye')
        const passwordGeneratorButton = document.querySelector('#generatorButton')
        passwordGeneratorButton.addEventListener('click', () =>{
            password.value = randomPasswordGenerator()
        })
        eye.addEventListener("click", ()=>{
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
        })
    </script>
@stop
