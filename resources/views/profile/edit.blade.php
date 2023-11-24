@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>{{__("Profile")}}</h1>
@stop
@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4 p-4 bg-white shadow rounded">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4 p-4 bg-white shadow rounded">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4 p-4 bg-white shadow rounded">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
