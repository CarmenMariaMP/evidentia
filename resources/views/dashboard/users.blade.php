<h3>Alumnos por nivel de participación</h3>
<br>
<div class="d-flex flex-wrap align-items-start">
    <table class="table statistics table-hover table-responsive">
        <thead>
        <tr>
            <th class="d-md-table-cell d-lg-table-cell">Participación</th>
            <th class="d-md-table-cell d-lg-table-cell">Número de alumnos</th>
        </tr>
        </thead>
        <tbody>

            <tr>
                <td class="d-md-table-cell d-lg-table-cell">Organización</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$users['participations'][0]->count()}}</td>
            </tr>
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">Intermedio</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$users['participations'][1]->count()}}</td>
            </tr>
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">Asistencia</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$users['participations'][2]->count()}}</td>
            </tr>
        </tbody>
    </table>
    <canvas id="totalCtx_users" width="500" height="400"></canvas>
</div>
<hr>
<h3>Total de alumnos</h3>
<br>
<div class="d-flex flex-wrap align-items-start">
    <table class="table statistics table-hover table-responsive">
        <thead>
            <tr>
                <th class="d-md-table-cell d-lg-table-cell">Métrica</th>
                <th class="d-md-table-cell d-lg-table-cell">Estadística</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="d-md-table-cell d-lg-table-cell">Número total de alumnos</td>
                <td class="d-md-table-cell d-lg-table-cell">{{$users['student_users_count']}}</td>
            </tr>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    window.addEventListener('load', () => {
        const totalCtx_users = document.getElementById('totalCtx_users');
        const totalChart = new Chart(totalCtx_users, {
            type: 'bar',
            data: {
                labels: ['Organización', 'Intermedio', 'Asistencia'],
                datasets: [{
                    label: 'Número de alumnos',
                    data: [
                        {{$users['participations'][0]->count()}}, {{$users['participations'][1]->count()}}, {{$users['participations'][2]->count()}}
                    ],
                    backgroundColor: 'rgb(255, 0, 0)'
                }]
            },
            options: {
                responsive: false
            }
        });
    });
</script>

