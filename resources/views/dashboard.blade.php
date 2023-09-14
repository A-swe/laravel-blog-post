@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="max-width: 600px; margin: 0 auto;">
            <canvas id="postCountChart"></canvas>
        </div>
        <div class="col-md-6" style="max-width: 600px; margin: 0 auto;">
            <canvas id="postCountPieChart"></canvas>
        </div>
    </div>
</div>
@endsection
<script language="JavaScript" type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        const users = <?php echo json_encode($chart_data['name']); ?>;
        const postCounts = <?php echo json_encode($chart_data['post_counts']); ?>;
        const setColor = ['red','blue','green'];

        const ctx = document.getElementById('postCountChart');
        const pie = document.getElementById('postCountPieChart');
        const postCountChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: users,
                datasets: [{
                    label: users,
                    data: postCounts,
                    backgroundColor: setColor,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
        const postCountPieChart = new Chart(pie, {
            type: 'doughnut',
            data: {
                labels: users,
                datasets: [{
                    label: users,
                    data: postCounts,
                    backgroundColor: setColor,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

    });

</script>