<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            margin-bottom: 20px;
        }
        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        canvas {
            display: block;
            height: 300px;
        }
    </style>
</head>
<body>

    <div class="chart-container">
        <h1>Active Users</h1>
        <canvas id="activeUsersChart"></canvas>
    </div>

    <div class="chart-container">
        <h1>Average Cycle Usage</h1>
        <canvas id="averageCycleUsageChart"></canvas>
    </div>

    <div class="chart-container">
        <h1>Cycles Near Limit</h1>
        <canvas id="cyclesNearLimitChart"></canvas>
    </div>

    <div class="chart-container">
        <h1>Total Hours</h1>
        <canvas id="totalHoursChart"></canvas>
    </div>

    <div class="chart-container">
        <h1>Upcoming Events</h1>
        <ul id="upcomingEventsList"></ul>
    </div>

    <script>
        // Active Users
        fetch('/active-users')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('activeUsersChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Active Users'],
                        datasets: [{
                            label: 'Number of Active Users',
                            data: [data],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    }
                });
            });

        // Average Cycle Usage
        fetch('/average-cycle-usage')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.date);
                const usageData = data.map(item => item.avg_usage);

                const ctx = document.getElementById('averageCycleUsageChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Average Cycle Usage',
                            data: usageData,
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 1
                        }]
                    }
                });
            });

        // Cycles Near Limit
        fetch('/cycles-near-limit')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('cyclesNearLimitChart').getContext('2d');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: data.map(item => item.name),
                        datasets: [{
                            label: 'Cycles Near Limit',
                            data: data.map(item => item.current),
                            backgroundColor: data.map(() => 'rgba(255, 99, 132, 0.2)'),
                            borderColor: data.map(() => 'rgba(255, 99, 132, 1)'),
                            borderWidth: 1
                        }]
                    }
                });
            });

        // Total Hours
        fetch('/total-hours')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('totalHoursChart').getContext('2d');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Total Hours'],
                        datasets: [{
                            label: 'Total Hours',
                            data: [data],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    }
                });
            });

        // Upcoming Events
        fetch('/upcoming-events')
            .then(response => response.json())
            .then(data => {
                const list = document.getElementById('upcomingEventsList');
                data.forEach(event => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${event.name} - ${new Date(event.start).toLocaleDateString()}`;
                    list.appendChild(listItem);
                });
            });
    </script>

</body>
</html>
