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

                <div class="card-body">
                    <table id="dataset" class="table statistics table-hover table-responsive">
                        <thead>
                        <tr>
                            <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Métrica</th>
                            <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Tipo</th>
                            <th>Estadística</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Evidencias creadas durante el año escolar</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Totales</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$total_evidences}}</td>
                            </tr>

                                @foreach($evidences_by_commitee as $evidence_commitee)
                                <tr>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Evidencias por Comité</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$evidence_commitee['comittee_id']}}</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$evidence_commitee['total']}}</td>
                                </tr>
                                @endforeach
                                @foreach($evidences_by_status as $evidence_status)
                                <tr>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Evidencias por estado</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{key($evidence_status)}}</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{current($evidence_status)}}</td>
                                </tr>
                                @endforeach


                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection
