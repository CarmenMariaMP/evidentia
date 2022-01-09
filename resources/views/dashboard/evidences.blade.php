<h3>Métricas de evidencias</h3>
<br>
<div class="d-flex flex-wrap">
    <table id='dataset' class="table table-hover table-responsive">
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
                                <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$evidences['total_evidences']}}</td>
                            </tr>

                                @foreach($evidences['evidences_by_commitee'] as $evidence_commitee)
                                <tr>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">Evidencias por Comité</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$evidence_commitee['comittee_id']}}</td>
                                    <td class="d-none d-sm-none d-md-table-cell d-lg-table-cell">{{$evidence_commitee['total']}}</td>
                                </tr>
                                @endforeach
                                @foreach($evidences['evidences_by_status'] as $evidence_status)
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
