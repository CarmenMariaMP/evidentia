<h3>Evidencias totales</h3>
<br>
<div class="d-flex flex-wrap align-items-start">
    <table id='dataset' class="table statistics table-hover table-responsive">
        <thead>
            <tr>
                <th class="d-md-table-cell d-lg-table-cell">Métrica</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">Evidencias creadas durante el año escolar</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$evidences['total_evidences']}}</td>
            </tr>
        </tbody>
    </table>
</div>
<hr>
<h3>Evidencias por Comité</h3>
<br>
<div class="d-flex flex-wrap align-items-start">
    <table id='dataset' class="table  table-hover table-responsive">
        <thead>
            <tr>
                <th class="d-md-table-cell d-lg-table-cell">Comité</th>
                <th>Número de envidencias</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evidences['evidences_by_commitee'] as $evidence_commitee)
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">{{$evidence_commitee['comittee_id']}}</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$evidence_commitee['total']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <canvas id="totalCtx_evidencesC" width="500" height="400"></canvas>
</div>
<hr>
<h3>Evidencias por Estado</h3>
<br>
<div class="d-flex flex-wrap">
    <table id='dataset' class="table statistics table-hover table-responsive">
        <thead>
            <tr>
                <th class="d-md-table-cell d-lg-table-cell">Estado</th>
                <th>Número de envidencias</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evidences['evidences_by_status'] as $evidence_status)
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">{{key($evidence_status)}}</td>
                <td class="d-md-table-cell d-lg-table-cell">{{current($evidence_status)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <canvas id="totalCtx_evidencesS" width="500" height="400"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    window.addEventListener('load', () => {
        const totalCtx = document.getElementById('totalCtx_evidencesC');
        const totalChart = new Chart(totalCtx, {
            type: 'bar',
            data: {
                labels: JSON.parse("{{ $evidences['comittee_names_json'] }}".replace(/&quot;/g, '"')),
                datasets: [{
                    label: 'Evidencias por comité',
                    data: JSON.parse("{{ $evidences['comittee_values_json'] }}")
                }]
            },
            options: {
                responsive: false
            }
        });
    });
</script>
<script>
    window.addEventListener('load', () => {
        const totalCtx = document.getElementById('totalCtx_evidencesS');
        const totalChart = new Chart(totalCtx, {
            type: 'bar',
            data: {
                labels: ['Draft', 'Pending', 'Accepted', 'Rejected'],
                datasets: [{
                    label: 'Evidencias por estado',
                    data: [{
                            {
                                current($evidences['evidences_by_status'][0])
                            }
                        },
                        {
                            {
                                current($evidences['evidences_by_status'][1])
                            }
                        },
                        {
                            {
                                current($evidences['evidences_by_status'][2])
                            }
                        },
                        {
                            {
                                current($evidences['evidences_by_status'][3])
                            }
                        }

                    ]
                }]
            },
            options: {
                responsive: false
            }
        });
    });
</script>
