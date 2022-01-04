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
                    <table id="dataset" class="table table-hover table-responsive">
                        <thead>
                        <tr>
                            <th class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Métrica</th>
                            <th>Estadística</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Reuniones realizadas en este año escolar</td>
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$total_meeting}}</td>
                            </tr>
                                @foreach($meeting_by_commitee as $meeting_commitee)
                                <tr>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$meeting_commitee['comittee_id']}}</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$meeting_commitee['total']}}</td>
                                </tr>
                                @endforeach


                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection
