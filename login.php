<?php 
    require_once 'connection.php';

    // check login
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 'login') {
            header('Location: admin.php');
            exit;
        }
    }

    // btn Login
    if (isset($_POST['btnLogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $check = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'"));
        if ($check) {
            if (password_verify($password, $check['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['status'] = 'login';
                header('Location: admin.php');
                exit;
            } else {
                echo "password salah";
            }
        } else {
            echo 'username tidak ditemukan!';
        }
    }

 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hustle - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Hustle

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <?php include 'header.php'; ?>
    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-4 m-auto border bg-success rounded p-4">
                    <h1 class="text-white">Login</h1>
                     <form class="form-signin w-100 m-auto" method="post">

                        <div class="form-floating">
                            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" name="btnLogin" type="submit"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->


    <!-- Start Footer -->
    <?php include 'footer.php'; ?>

    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>