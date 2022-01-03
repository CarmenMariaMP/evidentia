
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
                <div class="col-sm">
                <div class="card-body">
                    <table id="dataset" class="table table-hover table-responsive">
                        <thead>
                        <tr>
                            <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Métrica</th>
                            <th>Estadística</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Número total de alumnos</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$student_users_count}}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>

                <div class="card-body">
                    <table id="dataset" class="table table-hover table-responsive">
                        <thead>
                        <tr>
                            <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Participación</th>
                            <th>Número de alumnos</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Organización</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$participations[0]->count()}}</td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Intermedio</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$participations[1]->count()}}</td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Asistencia</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$participations[2]->count()}}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection
