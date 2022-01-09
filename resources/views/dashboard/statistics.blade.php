@extends('layouts.app')

@section('title', "Estadisticas de 20$instance")

@section('title-icon', 'nav-icon fas fa-clipboard-check')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/{{$instance}}">Home</a></li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-lg">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#users" data-toggle="tab">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#hours" data-toggle="tab">Horas</a></li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="users">
                        @include('dashboard.users', ['users' => $users])
                    </div>
                    <div class="tab-pane" id="hours">
                        @include('dashboard.hours', ['hours' => $hours])
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
