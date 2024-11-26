@extends('Admin.layout.layout')
@section('adminContent')

<body class="analytics-body">
    <h1 class="analytics-header">Analytics Dashboard</h1>

    <!-- Summary Cards -->
    <div class="analytics-summary-cards">
        <div class="analytics-summary-card">
            <h2>Total Fresh Parts</h2>
            <p id="analytics-overallFreshTotal"></p>
        </div>
        <div class="analytics-summary-card">
            <h2>Total Critical Parts</h2>
            <p id="analytics-overallCriticalTotal"></p>
        </div>
        <div class="analytics-summary-card">
            <h2>Total Non-Critical Parts</h2>
            <p id="analytics-overallNonCriticalTotal"></p>
        </div>
    </div>

    <!-- Overall Pie Chart -->
    <div class="analytics-overall-pie">
        <h2>Overall Pie Chart</h2>
        <canvas id="analytics-overallPieChart" width="400" height="400"></canvas>
    </div>

    <!-- Plane-Specific Cards -->
    <div id="analytics-planeCards" class="analytics-plane-cards"></div>

    <script>
        // Fetch analytics data
        fetch('/plane-analytics-data')
            .then(response => response.json())
            .then(data => {
                const planes = Object.keys(data);

                // Calculate overall totals
                let overallFresh = 0, overallCritical = 0, overallNonCritical = 0;

                planes.forEach(plane => {
                    const planeData = data[plane];

                    overallFresh += planeData.fresh.cycles + planeData.fresh.hours + planeData.fresh.dates;
                    overallCritical += planeData.critical.cycles + planeData.critical.dates;
                    overallNonCritical += planeData.non_critical.cycles + planeData.non_critical.dates;
                });

                // Update overall summary cards
                document.getElementById('analytics-overallFreshTotal').innerText = overallFresh;
                document.getElementById('analytics-overallCriticalTotal').innerText = overallCritical;
                document.getElementById('analytics-overallNonCriticalTotal').innerText = overallNonCritical;

                // Render overall pie chart
                const overallPieCtx = document.getElementById('analytics-overallPieChart').getContext('2d');
                new Chart(overallPieCtx, {
                    type: 'pie',
                    data: {
                        labels: ['Fresh', 'Critical', 'Non-Critical'],
                        datasets: [{
                            data: [overallFresh, overallCritical, overallNonCritical],
                            backgroundColor: ['#4CAF50', '#FF9800', '#F44336'],
                        }]
                    }
                });

                // Render plane-specific cards
                const planeCardsContainer = document.getElementById('analytics-planeCards');
                planes.forEach(plane => {
                    const planeData = data[plane];

                    // Create a card for each plane
                    const card = document.createElement('div');
                    card.classList.add('analytics-plane-card');

                    // Add the Pie Chart
                    card.innerHTML = `
                        <h3>${plane} - Pie Chart</h3>
                        <canvas id="analytics-pie-${plane}" width="300" height="200"></canvas>
                        <table class="analytics-plane-table">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Cycles</th>
                                    <th>Hours</th>
                                    <th>Dates</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fresh</td>
                                    <td>${planeData.fresh.cycles}</td>
                                    <td>${planeData.fresh.hours}</td>
                                    <td>${planeData.fresh.dates}</td>
                                </tr>
                                <tr>
                                    <td>Critical</td>
                                    <td>${planeData.critical.cycles}</td>
                                    <td>-</td>
                                    <td>${planeData.critical.dates}</td>
                                </tr>
                                <tr>
                                    <td>Non-Critical</td>
                                    <td>${planeData.non_critical.cycles}</td>
                                    <td>-</td>
                                    <td>${planeData.non_critical.dates}</td>
                                </tr>
                            </tbody>
                        </table>
                    `;

                    // Append card to container
                    planeCardsContainer.appendChild(card);

                    // Render the Pie Chart
                    const pieCtx = document.getElementById(`analytics-pie-${plane}`).getContext('2d');
                    new Chart(pieCtx, {
                        type: 'pie',
                        data: {
                            labels: ['Fresh', 'Critical', 'Non-Critical'],
                            datasets: [{
                                data: [
                                    planeData.fresh.cycles + planeData.fresh.hours + planeData.fresh.dates,
                                    planeData.critical.cycles + planeData.critical.dates,
                                    planeData.non_critical.cycles + planeData.non_critical.dates,
                                ],
                                backgroundColor: ['#4CAF50', '#FF9800', '#F44336'],
                            }]
                        }
                    });
                });
            })
            .catch(error => {
                console.error('Error fetching analytics data:', error);
            });
    </script>



@endsection
