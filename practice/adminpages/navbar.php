<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />


    <title>Dashboard</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap");

        body,
        button {
            font-family: "Inter", sans-serif;
        }

        :root {
            --offcanvas-width: 210px;
            --topNavbarHeight: 68px;
        }

        .sidebar-nav {
            width: var(--offcanvas-width);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
        }

        .sidebar-nav .nav-link {
            color: white;
            /* Set the default color */
            transition: color 0.3s ease;
            /* Add a smooth transition effect */
        }

        .navbar:hover {
            background-color: rgb(255, 255, 255);
            /* Slight white background color on hover */
        }

        .sidebar-nav .nav-link:hover {
            text-decoration: none;
            background-color: rgba(238, 229, 229, 0.552);
        }

        .sidebar-link .right-icon {
            display: inline-flex;
        }

        .sidebar-link[aria-expanded="true"] .right-icon {
            transform: rotate(180deg);
        }

        @media (min-width: 992px) {
            body {
                overflow: auto !important;
            }

            main {
                margin-left: var(--offcanvas-width);
            }

            /* this is to remove the backdrop */
            .offcanvas-backdrop::before {
                display: none;
            }

            .sidebar-nav {
                -webkit-transform: none;
                transform: none;
                visibility: visible !important;
                height: calc(100% - var(--topNavbarHeight));
                top: var(--topNavbarHeight);
            }
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!--offcanvas trigger-->
            <button class="navbar-toggler border-0 me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon me-2" data-bs-target="#offcanvasExample"></span>
            </button>

            <!--offcanvas trigger-->
            <a class="navbar-brand me-auto" href="admindashboard.php">Fire fighting</a>




            <?php
            session_start();
            if (isset($_SESSION['user_id']) && ($_SESSION['usernamee'] != ''))
                include('../login/connect.php');


            $userId = $_SESSION['user_id'];
            $sql = "SELECT * FROM addadminn WHERE id = '$userId'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {
                    // echo $row['id'];
            ?>


                    <!-- You can customize this part based on your database schema -->
                    <img src="../uploads/<?php echo $row['image']; ?>" class="navbar-toggler border-0 rounded-circle float-end mt-1 me-1 ms-1  " alt="..." height="48px" width="58px" data-bs-toggle="dropdown" role="button" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <?php
                }
            }

            ?>


            <ul class="dropdown-menu dropdown-menu-end d-lg-none">
                <li><a class="dropdown-item" href="../login/logout.php">Logout</a></li>
                <li><a class="dropdown-item" href="#">Change Details</a></li>
            </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                </ul>



                <div class="details d-flex d-flex flex-sm-column flex-wrap me-3 " style="border-left: 1px solid white; border-right:1px solid white;">
                    <p class="text-white  nav-item mt-0 p-0 mb-0 ms-2 me-2"><?php echo $row['name'] ?> </p><span style="font-size: 10px; color:white; margin:0px;padding:0px;" class="ms-2 me-2">Super Admin</span>
                </div>
                <!-- <div class="d-flex flex-column">
                    <div class="p-2">Flex item 1</div>
                    <div class="p-2">Flex item 2</div>
                    <div class="p-2">Flex item 3</div>
                </div> -->


                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">


                        <img src="../uploads/<?php echo $row['image']; ?>" class="nav-link rounded-circle float-end mt-1 me-1 ms-1 dropdown-toggle " alt="..." height="48px" width="48px" data-bs-toggle="dropdown" aria-expanded="false" role="button">


                        <!-- <a class="nav-link dropdown-toggle ms-2 fs-5 mb-2" href="#" role="button" aria-expanded="false"> -->



                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="../login/logout.php">Logout</a></li>
                            <li><a class="dropdown-item" href="#">Change Details</a></li>

                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- navbar -->

    <!-- OFFCANVAS-->



    <div class="offcanvas offcanvas-start sidebar-nav  text-white bg-dark  fs-6 " tabindex="-1" id="offcanvasExample" style=" width: 200px;" aria-labelledby="offcanvasExampleLabel">

        <div class="offcanvas-body p-0">
            <nav class="navbar-white">
                <ul class="navbar-nav ">
                    <li>
                        <a href="admindashboard.php" class="nav-link px-3 active mt-2 ">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseAdmin" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="me-2"> <i class="bi bi-person-circle"></i></span>
                            <span>Admins</span>
                            <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
                        </a>

                        <!-- making the options inside the link of admin -->
                        <div class="collapse" id="collapseAdmin">
                            <div>
                                <ul class="navbar-nav ps-3" style="font-size: 14px;">
                                    <li>
                                        <a href="adminlist.php" class="nav-link px-3">
                                            <span><i class="bi bi-chevron-double-right"></i></span>
                                            <span>Admin list</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="addadmin.php" class="nav-link px-3">
                                            <span><i class="bi bi-chevron-double-right"></i></span>
                                            <span>Add Admin Details</span>
                                        </a>
                                    </li>



                                </ul>
                            </div>
                        </div>
                    </li>
















                    <li>
                        <a href="missions.php" class="nav-link px-3">
                            <span><i class="bi bi-megaphone-fill"></i></span>
                            <span>Missions</span>
                        </a>
                    </li>



                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseStaffs" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="me-2"> <i class="bi bi-people-fill"></i></span>
                            <span>Staff
                            </span>
                            <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
                        </a>

                        <!-- making the options inside the link of admin -->
                        <div class="collapse" id="collapseStaffs">
                            <div>
                                <ul class="navbar-nav ps-3" style="font-size: 14px;">
                                    <li>
                                        <a href="employee.php" class="nav-link px-3">
                                            <span><i class="bi bi-chevron-double-right"></i></span>
                                            <span>Employee</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="staffadd.php" class="nav-link px-3">
                                            <span><i class="bi bi-chevron-double-right"></i></span>
                                            <span>Add Staffs</span>
                                        </a>
                                    </li>



                                </ul>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseWebsite" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="me-2">
                                <!-- <i class="bi bi-gear-wide-connected"></i> -->
                                <i class="bi bi-globe2"></i>
                            </span>
                            <span>Website</span>
                            <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
                        </a>

                        <!-- making the options inside the link of admin -->
                        <div class="collapse" id="collapseWebsite">
                            <div>
                                <ul class="navbar-nav ps-3" style="font-size: 14px;">
                                    <li>
                                        <a href="../pagesadminsuper/adminlist.php" class="nav-link px-3">
                                            <span><i class="bi bi-card-image"></i></span>
                                            <span>Slidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../pagesadminsuper/adminlist.php" class="nav-link px-3">
                                            <span><i class="bi bi-person-x"></i></span>
                                            <span>Testimonial</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../pagesadminsuper/adminlist.php" class="nav-link px-3">
                                            <span><i class="bi bi-file-image"></i></span>
                                            <span>Photo Gallery</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../pagesadminsuper/adminlist.php" class="nav-link px-3">
                                            <span><i class="bi bi-camera-reels"></i></span>
                                            <span>Video Gallery</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../pagesadminsuper/addadmin.php" class="nav-link px-3">
                                            <span><i class="bi bi-file-earmark"></i></span>
                                            <span>Notice</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../pagesadminsuper/addadmin.php" class="nav-link px-3">
                                            <span><i class="bi bi-file-earmark-medical"></i></span>
                                            <span>Blog</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../pagesadminsuper/addadmin.php" class="nav-link px-3">
                                            <span><i class="bi bi-app-indicator"></i></span>
                                            <span>Service</span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseSetup" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="me-2">
                                <i class="bi bi-gear-wide-connected"></i>
                                <!-- <i class="bi bi-globe2"></i> -->
                            </span>
                            <span>Setup</span>
                            <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
                        </a>

                        <!-- making the options inside the link of admin -->
                        <div class="collapse" id="collapseSetup">
                            <div>
                                <ul class="navbar-nav ps-3" style="font-size: 14px;">
                                    <li>
                                        <a href="../pagesadminsuper/adminlist.php" class="nav-link px-3">
                                            <span><i class="bi bi-house-fill"></i></span>
                                            <span>School</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../pagesadminsuper/addadmin.php" class="nav-link px-3">
                                            <span><i class="bi bi-calendar2-plus"></i></span>
                                            <span>Academic Year</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../pagesadminsuper/addadmin.php" class="nav-link px-3">
                                            <span><i class="bi bi-calculator"></i></span>
                                            <span>Bank Accounts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../pagesadminsuper/addadmin.php" class="nav-link px-3">
                                            <span><i class="bi bi-fullscreen-exit"></i></span>
                                            <span>Address</span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>

                    </li>

                </ul>

            </nav>

            <div class="dropdown mt-3">

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!--OFF CANVAS-->

    <!-- making the main body inside the admin panel-->

</body>
<script src="../js/bootstrap.bundle.min.js"></script>

<script src="../js/jquery-3.5.1.js"></script>
<!-- <script src="../js/jquery.dataTables.min.js"></script> -->





</html>