<?php 
    require_once 'connection.php';

    // check login
    if (!isset($_SESSION['status'])) {
        header('Location: login.php');
        exit;
    }

    $totalProduct = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product"));
    $totalReceipt = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM receipt"));
    $totalReceiptProcess = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM receipt WHERE status = 'process'"));
    $totalReceiptCompleted = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM receipt WHERE status = 'completed'"));
 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hustle - Admin</title>
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
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>

    <?php include 'header_admin.php'; ?>

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 my-2">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Total Product</h5>
                        <p class="card-text"><?= $totalProduct; ?></p>
                        <a href="product_admin.php" class="card-link">Details</a>
                      </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Total Receipt</h5>
                        <p class="card-text"><?= $totalReceipt; ?></p>
                        <a href="receipt_admin.php" class="card-link">Details</a>
                      </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Total Receipt Process</h5>
                        <p class="card-text"><?= $totalReceiptProcess; ?></p>
                        <a href="receipt_admin.php" class="card-link">Details</a>
                      </div>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Total Receipt Completed</h5>
                        <p class="card-text"><?= $totalReceiptCompleted; ?></p>
                        <a href="receipt_admin.php" class="card-link">Details</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->



    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>