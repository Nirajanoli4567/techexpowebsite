<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #cccccc;
        }

        .container {
            width: 100vw;
            height: 100vh;
        }

        .box {
            width: 400px;
            position: relative;
            top: 60%;
            left: 60%;
            transform: translate(-60%, -60%);
            box-shadow: 2px 2px 5px #89c9f3, -2px -2px 5px #89c9f3;
            padding: 20px 40px;
            background-color: #FFFFFF;
            border-radius: 13px;
        }

        .header h1 {
            font-size: 2.2rem;
            text-align: center;
            padding: 5px 8px;
        }

        .body p {
            margin-top: 20px;
        }

        .body p label {
            font-size: 18px;
            font-weight: 600;
        }

        .body p input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            font-size: 16px;
            margin-block: 4px;
            border: 0.5px solid grey;
            color: #000;
        }

        .body p input[type="submit"] {
            border: none;
            background-color: #4398db;
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            padding: 15px;
            border-radius: 6px;
            margin-top: 19px;
        }

        #seimg {
            width: 100%;
            height: 70px;
        }

        @media (max-width:450px) {

            .box {
                width: 350px;
                position: relative;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                box-shadow: 2px 2px 5px #89c9f3, -2px -2px 5px #89c9f3;
                padding: 20px 40px;
                background-color: #FFFFFF;
                border-radius: 13px;
            }

            .body p input[type="submit"] {
                padding: 9px;
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include("connect.php");
    // include("logincheck.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // $sql = "SELECT * FROM adminlogin WHERE username='" . $username . "' AND password='" . $password . "'";
        $sql = "SELECT * FROM addadminn WHERE username='" . $username . "' AND password='" . $password . "'";
        echo $sql; // Print the query for debugging

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);


        if ($row) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['usernamee'] = $username;
            // echo "Before header redirect";
            // echo $_SESSION['username'];
            header("Location: ../adminpages/admindashboard.php");
            exit();
        } else {

            $_SESSION['loginmessage'] = "Invalid username or password.";
            header("Location: adminlogin.php");

            exit();
        }
    }
    ?>





    <div class="container">
        <div class="box">
            <header class="header">
                <img id="seimg" src="../images/image.png" alt="">

            </header>
            <!-- <div class="alert alert-danger mt-3" role="alert"> -->
            <?php

            if (isset($_SESSION['loginmessage'])) {
                echo $_SESSION['loginmessage'];
                unset($_SESSION['loginmessage']); // Clear the message after displaying it
            }
            ?>
            <!-- </div> -->
            <main class="body">

                <form action="adminlogin.php" method="POST">

                    <p>
                        <label for="email">Emails</label>
                        <input type="email" placeholder="Email here" name="username" required>
                    </p>
                    <p>
                        <label for="password">Password </label>
                        <input type="password" placeholder="Enter password here" name="password" required>
                    </p>
                    <p>
                        <input type="submit" value="login" name="login">
                    </p>
                </form>

            </main>

        </div>
    </div>
</body>
<script src="../js/dataTables.bootstrap5.min.js"></script>

</html>