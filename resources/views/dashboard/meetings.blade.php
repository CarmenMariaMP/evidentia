<h3>Reuniones totales</h3>
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
            <td class="d-md-table-cell d-lg-table-cell">Reuniones creadas durante el año escolar</td>
            <td class="d-md-table-cell d-lg-table-cell">{{$meetings['meetings_count']}}</td>
        </tr>
        </tbody>
    </table>
</div>
<hr>
<h3>Reuniones por comité</h3>
<br>
<div class="d-flex flex-wrap align-items-start">
    <table id = "dataset" class="table table-hover table-responsive">
        <thead>
            <tr>
                <th class="d-md-table-cell d-lg-table-cell">Comité</th>
                <th>Número de reuniones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($meetings['meeting_by_commitee'] as $meeting_commitee)
        <tr>
            <td class="d-md-table-cell d-lg-table-cell">{{$meeting_commitee['comittee_id']}}</td>
            <td class="d-md-table-cell d-lg-table-cell">{{$meeting_commitee['total']}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <canvas id="totalCtx_meetings" width="500" height="400"></canvas>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    window.addEventListener('load', () => {
        const totalCtx_meetings = document.getElementById('totalCtx_meetings');
        const totalChart = new Chart(totalCtx_meetings, {
            type: 'bar',
            data: {
                labels: JSON.parse("{{$meetings['comittee_names_json']}}".replace(/&quot;/g, '"')),
                datasets: [{
                    label: 'Número de reuniones por comité',
                    data: JSON.parse("{{$meetings['comittee_values_json']}}"),

                }]
            },
            options: {
                responsive: false
            }
        });
    });
</script>
































