<?php 
    require_once 'connection.php';

    $product_best_seller = mysqli_query($conn, "SELECT *, sum(receipt.product_id) FROM receipt INNER JOIN product ON receipt.product_id = product.product_id GROUP BY receipt.product_id ORDER BY sum(receipt.product_id) DESC limit 3");
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hustle</title>
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

    <?php include 'header.php' ?>

    <!-- Start Banner Hero -->
        <img class="img-fluid" src="assets/img/banner_img_01.jpg">
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories of The Month</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($product_best_seller as $product): ?>
                <div class="col-12 col-md-4 p-5 mt-3 text-center">
                    <a href="shop-single.php?product_id=<?= $product['product_id']; ?>"><img style="width: 65%; height:65%" src="assets/img/<?= $product['product_img']; ?>" class="rounded-circle img-fluid border"></a>
                    <h5 class="text-center mt-3 mb-3"><?= $product['product_name']; ?></h5>
                    <p class="text-center"><a href="shop-single.php?product_id=<?= $product['product_id']; ?>" class="btn btn-success">Go Shop</a></p>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <!-- End Categories of The Month -->

    <?php include 'footer.php' ?>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>