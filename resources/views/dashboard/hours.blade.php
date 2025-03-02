<h3>Total de horas</h3>
<br>
<div class="d-flex flex-wrap align-items-start">
    <table class="table statistics table-hover table-responsive">
        <thead>
            <tr>
                <th class="d-md-table-cell d-lg-table-cell">Origen</th>
                <th class="d-md-table-cell d-lg-table-cell">Horas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">Evidencias</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$hours['evidences']['total_hours']}}</td>
            </tr>
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">Reuniones</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$hours['meetings']['total_hours']}}</td>
            </tr>
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">Bonus</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$hours['total_bonus_hours']}}</td>
            </tr>
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">Eventos</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$hours['total_event_hours']}}</td>
            </tr>
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">Total</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$hours['total_hours']}}</td>
            </tr>
        </tbody>
    </table>
    <canvas id="totalCtx_hours" width="500" height="400"></canvas>
</div>
<hr>
<h3>Horas por comité</h3>
<br>
<table class="table statistics table-hover table-responsive">
    <thead>
        <tr>
            <th class="d-md-table-cell d-lg-table-cell">Comité</th>
            <th class="d-md-table-cell d-lg-table-cell">Evidencias</th>
            <th class="d-md-table-cell d-lg-table-cell">Reuniones</th>
            <th class="d-md-table-cell d-lg-table-cell">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hours['comittees'] as $comittee)
        <tr>
            <td class="d-md-table-cell d-lg-table-cell">{{$comittee}}</td>
            <td class="d-md-table-cell d-lg-table-cell">{{$hours['evidences']['hours_by_comittee'][$comittee]}}</td>
            <td class="d-md-table-cell d-lg-table-cell">{{$hours['meetings']['hours_by_comittee'][$comittee]}}</td>
            <td class="d-md-table-cell d-lg-table-cell">{{$hours['evidences']['hours_by_comittee'][$comittee] + $hours['meetings']['hours_by_comittee'][$comittee]}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    window.addEventListener('load', () => {
        const totalCtx_hours = document.getElementById('totalCtx_hours');
        const totalChart = new Chart(totalCtx_hours, {
            type: 'bar',
            data: {
                labels: ['Eventos', 'Bonus', 'Evidencias', 'Reuniones'],
                datasets: [{
                    label: 'Horas',
                    data: [
                        {{$hours['total_event_hours']}}, {{$hours['total_bonus_hours']}}, {{$hours['evidences']['total_hours']}}, {{$hours['meetings']['total_hours']}}
                    ]
                }]
            },
            options: {
                responsive: false
            }
        });
    });
</script>
