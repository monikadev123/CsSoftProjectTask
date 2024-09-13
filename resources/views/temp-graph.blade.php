<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Chart</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
        }
        canvas {
            max-width: 100%;
            height: 400px;
        }
    </style>
</head>
<body>
    <h1>Temperature On Hourly Basis For Mohali</h1>
    <canvas id="temperatureChart"></canvas>

    <script>
        $(document).ready(function() {
        // json encode laravel data
            var temperatureData = {!! json_encode($temperatures) !!};

            var labels = [];
            var temperatures = [];

            temperatureData.forEach(function(data) {
                labels.push(new Date(data.temp_timestamp).toLocaleString());
                temperatures.push(data.temperature);
            });

            // Create the line chart using Chart.js
            var ctx = document.getElementById('temperatureChart').getContext('2d');
            var temperatureChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Temperature',
                        data: temperatures,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Time'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Temperature (°C)'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
