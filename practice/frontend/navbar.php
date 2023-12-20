<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: 'Outfit', sans-serif;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }

    .header {
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 100;
        transition: .5s ease;
    }

    header nav {

        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 13px 20px;
        background-color: rgb(79, 83, 83);

    }

    .logo img {
        width: 45px;
        border-radius: 50%;
    }



    nav ul {
        display: flex;
        align-items: center;
        justify-content: end;
        flex-basis: 44%;
    }

    nav ul li a {
        color: white;
        font-size: 20px;
        text-transform: capitalize;
        font-weight: 600px;

    }

    nav ul li a:hover {
        color: aqua;
        text-decoration: underline 2px;
        text-decoration-color: red;
        text-underline-offset: 9px;
    }

    .hamburger {
        color: white;
        font-size: 20px;
        display: none;
    }


    @media(max-width:1024px) {
        nav ul {
            display: none;
        }

        .hamburger {
            display: flex;

        }

        nav ul.ham_active {
            display: flex;
            flex-direction: column;
            top: 60px;
            left: 0;
            gap: 24px;
            font-size: 24px;
            background: grey;
            position: absolute;
            width: 100%;
            justify-content: center;
            align-items: center;
            height: 300px;
            opacity: .9;
        }
    }

    @media(max-width:768px) {
        nav ul {
            display: none;
        }

        .hamburger {
            display: flex;

        }

        nav ul.ham_active {
            display: flex;
            flex-direction: column;
            top: 60px;
            left: 0;
            gap: 22px;
            font-size: 20px;
            background: grey;
            position: absolute;
            width: 100%;
            justify-content: center;
            align-items: center;
            height: 300px;
            opacity: .9;
        }

        @media(max-width:480px) {
            nav ul {
                display: none;
            }

            .hamburger {
                display: flex;

            }

            nav ul.ham_active {
                display: flex;
                flex-direction: column;
                top: 60px;
                left: 0;
                gap: 18px;
                font-size: 11px;
                background: grey;
                position: absolute;
                width: 100%;
                justify-content: center;
                align-items: center;
                height: 240px;
                opacity: .9;
            }
        }
    }
</style>

<body>
    <header class="header">
        <nav>
            <div class="logo">
                <a href="../frontend/Home.php"> <img src="../uploads/logo.png" alt=""></a>
            </div>
            <ul>

                <li><a href="../login/adminlogin.php" id="login">Login</a></li>
            </ul>
            <div class="hamburger">
                <i class='bx bx-menu'></i>
            </div>
        </nav>

    </header>
</body>
<script>
    const hamburger = document.querySelector('.hamburger i');
    const ul = document.querySelector('nav ul');
    hamburger.addEventListener('click', () => {
        ul.classList.toggle('ham_active');
        if (ul.classList.contains('ham_active')) {
            hamburger.classList.replace('bx-menu', 'bxs-x-circle');
        } else {
            hamburger.classList.replace('bxs-x-circle', 'bx-menu');
        }
    })
</script>
<script src="../js/bootstrap.bundle.min.js"></script>

<script src="../js/jquery-3.5.1.js"></script>

</html>