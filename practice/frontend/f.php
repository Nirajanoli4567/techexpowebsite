<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Pie Chart for Web Development</h1>
        <div>
            <canvas id="pie-chart"></canvas>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('pie-chart'), {
        type: 'pie',
        data: {
            labels: ["HTML", "CSS", "JavaScript", "PHP", "MySql"],
            datasets: [{
                backgroundColor: ["#e63946", "#254BDD",
                    "#ffbe0b", "#1d3557", "#326998"
                ],
                data: [418, 263, 434, 586, 332]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Pie Chart for admin panel'
            },
            responsive: true
        }
    });
</script>

</html>