<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Pie Chart</h1>
    <canvas id="pieChart" width="400" height="400"></canvas>

    <h1>Bar Chart</h1>
    <canvas id="barChart" width="400" height="400"></canvas>

    <script>
        // Fetch data for pie chart
        fetch('/charts/pie-data')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('pieChart').getContext('2d');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Fresh', 'Critical', 'Non-Critical'],
                        datasets: [{
                            label: 'Parts Status',
                            data: [data.fresh, data.critical, data.non_critical],
                            backgroundColor: ['#4CAF50', '#FF9800', '#F44336']
                        }]
                    }
                });
            });

        // Fetch data for bar chart
        fetch('/charts/bar-data')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('barChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Fresh', 'Critical', 'Non-Critical'],
                        datasets: [{
                            label: 'Parts Status',
                            data: [data.fresh, data.critical, data.non_critical],
                            backgroundColor: ['#4CAF50', '#FF9800', '#F44336']
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
</body>
</html>
