<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include('navbar.php');
    ?>
    <?php
    session_start();
    include('../login/connect.php');

    $sl = "SELECT * FROM addadminn";
    $resulting = mysqli_query($conn, $sl);
    if (mysqli_num_rows($resulting) > 0) {

        $rowCount = mysqli_num_rows($resulting);

        $_SESSION['totalrowstd'] = $rowCount;
    } else {

        echo "No rows found";
    }

    $sll = "SELECT * FROM addstaff ";
    $resultin = mysqli_query($conn, $sll);
    if (mysqli_num_rows($resultin) > 0) {

        $rowCount = mysqli_num_rows($resultin);

        $_SESSION['totalrowad'] = $rowCount;
    }
    $fetchdata = "SELECT * FROM  mission";
    $fetchqueryrun = mysqli_query($conn, $fetchdata);
    if (mysqli_num_rows($fetchqueryrun) > 0) {

        $rowCount = mysqli_num_rows($fetchqueryrun);

        $_SESSION['totalrr'] = $rowCount;
    }

    mysqli_close($conn);
    ?>






    <main class="mt-5 pt-5 me-5">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-primary  h-100">
                        <div class="card-header mt-3 fs-4 text-center">Staffs</div>
                        <div class="card-body">
                            <h5 class="card-title text-center fs-1"><i class="bi bi-people-fill"></i></h5>
                            <p class="card-text text-center fs-1 fw-bold">
                                <?php
                                if (isset($_SESSION['totalrowad'])) {
                                    echo  $_SESSION['totalrowad'];
                                }

                                ?>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-warning h-100 ">
                        <div class="card-header mt-3 fs-4 text-center">Admin</div>
                        <div class="card-body">
                            <h5 class="card-title text-center fs-1"><i class="bi bi-person-square"></i></h5>
                            <p class="card-text text-center fs-1 fw-bold">
                                <?php


                                if (isset($_SESSION['totalrowstd'])) {
                                    echo  $_SESSION['totalrowstd'];
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-danger  h-100">
                        <div class="card-header mt-3 fs-4 text-center">Missions</div>
                        <div class="card-body">
                            <h5 class="card-title text-center fs-1"><i class="bi bi-book"></i></h5>
                            <p class="card-text text-center fs-1 fw-bold">
                                <?php
                                if (isset($_SESSION['totalrr'])) {
                                    echo  $_SESSION['totalrr'];
                                }

                                ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-info  h-100">
                        <div class="card-header mt-3 fs-4 text-center">Awards</div>
                        <div class="card-body">
                            <h5 class="card-title text-center fs-1 "><i class="bi bi-trophy"></i></h5>
                            <p class="card-text text-center fs-1 fw-bold"> 50+</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="border: 1px solid red;">
                        <div class="card-header">
                            Charts
                        </div>
                        <div class="card-body" style="height: 255px;">
                            <canvas id="myChart" class="chart" role="img" style="width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="border: 2px solid green;">
                        <div class="card-header">
                            Charts
                        </div>
                        <div class="card-body float-end" style="height: 255px;">

                            <canvas id="pie-chart" style="width: 100%;"></canvas>
                            </canvas>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="card" style="border: 1px solid blue;">
                        <div class="card-header">
                            Charts
                        </div>
                        <div class="card-body float-end" style="height: 255px;">

                            <canvas id="line"></canvas>
                            </canvas>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row">


                <div class="col-md-12 mt-3">
                    <div class="card" style="border: 1px solid blue;">
                        <div class="card-header">
                            Line Chart
                        </div>
                        <div class="card-body">
                            <canvas id="line" style="width: 100%;"></canvas>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </main>
    <?php
    include('../login/connect.php');
    $sqll = "SELECT title as title, time as time FROM mission GROUP BY Title ORDER BY id DESC LIMIT 10";

    $sqllr = mysqli_query($conn, $sqll);
    if (mysqli_num_rows($sqllr) > 0) {
        foreach ($sqllr as $row) {
            $title[] = $row['title'];
            $time[] = $row['time'];
        }
    }

    $sqlll = "SELECT created as created, value as value FROM data GROUP BY created ORDER BY id DESC LIMIT 8";
    $sqllrr = mysqli_query($conn, $sqlll);
    if (mysqli_num_rows($sqllrr) > 0) {
        foreach ($sqllrr as $rows) {
            $value[] = $rows['value'];
            $created[] = $rows['created'];
        }
    }
    $sqlllk = "SELECT created as created, SUM(value) as value FROM data GROUP BY created ORDER BY id DESC LIMIT 8";
    $sqllrrk = mysqli_query($conn, $sqlllk);
    if (mysqli_num_rows($sqllrrk) > 0) {
        foreach ($sqllrrk as $rowsk) {
            $valuek[] = $rowsk['value'];
            $createdk[] = $rowsk['created'];
        }
    }

    ?>

</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');



    const labelsss = <?php echo json_encode($created) ?>;
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labelsss,
            datasets: [{
                label: '# value',
                data: <?php echo json_encode($value) ?>,
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)'

                ],

                borderWidth: 1,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)'

                ],
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
</script>

<script>
    const labelss = <?php echo json_encode($title) ?>;
    new Chart(document.getElementById('pie-chart'), {
        type: 'pie',
        data: {
            labels: labelss,

            datasets: [{

                data: <?php echo json_encode($time) ?>,
            }]
        },
        options: {


            responsive: true
        }
    });
</script>
<script>
    new Chart(document.getElementById('line'), {
        type: 'line',
        data: {
            labels: labelsss,

            datasets: [{
                    label: 'sum of humidity',
                    data: <?php echo json_encode($valuek) ?>,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'sum of temperature',
                    data: <?php echo json_encode($valuek) ?>, // Replace $value2 with your second set of data
                    borderColor: 'rgba(0, 255, 0, 1)', // Change color for the second line
                    borderWidth: 2,
                    fill: false
                }
            ],


        },
        options: {
            scales: {
                y: {
                    max: 80, // Set your desired maximum value here
                    beginAtZero: true // Set to false if you don't want the y-axis to always start at zero
                }
            },


            responsive: true
        }
    });
</script>


</html>