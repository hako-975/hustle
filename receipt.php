<?php 
    require_once 'connection.php';
    
    if (isset($_GET['no_receipt'])) {
        $no_receipt = $_GET['no_receipt'];
        $receipt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM receipt INNER JOIN product ON receipt.product_id = receipt.product_id WHERE no_receipt = '$no_receipt'"));
        if ($receipt == null) {
            header('Location: shop.php');
            exit;
        }
    } else {
        header('Location: shop.php');
        exit;
    }

    
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hustle - Receipt <?= $receipt['no_receipt']; ?></title>
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

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <style>

    @media print {
        .no-print {
            display: none;
        }

        .print-only{
            display: block;
        }
    }
    </style>
<!--
    
TemplateMo 559 Hustle

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <?php include 'header.php' ?>

    
    

    <!-- Open Content -->
    <section class="bg-light ">
        <div class="container pb-5">
            <div class="row py-4 no-print">
                <div class="col text-center">
                    <h1>Receipt</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- col end -->
                <div class="col-lg-7">
                    <div class="card p-5">
                        <div class="card-body print-only">
                            <h4 class="text-center">Order Successfully!</h4>
                            <img style="width: 20%" class="d-block mx-auto my-4" src="assets/img/success.png" alt="Purchase Successfully">
                            <table class="table border-top">
                                <tr>
                                    <tr>
                                        <td class="align-middle my-auto">
                                            <h5>
                                                Status: 
                                                <?php if ($receipt['status'] == 'process'): ?>
                                                    <span class="badge bg-danger">Process</span>
                                                <?php else: ?>
                                                    <span class="badge bg-success">Completed</span>
                                                <?php endif ?>
                                            </h5>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <td>
                                        <h5>No. Receipt:</h5>
                                        <span><?= $receipt['no_receipt']; ?></span>
                                    </td>
                                    <td>
                                        <h5>Date Order:</h5>
                                        <span><?= $receipt['date_checkout']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Product Name:</h5>
                                        <span><?= $receipt['product_name']; ?></span>
                                    </td>
                                    <td>
                                        <h5>Size:</h5>
                                        <span><?= $receipt['size']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Product Price:</h5>
                                        <span>Rp. <?= implode('.', explode(',', number_format($receipt['product_price']))); ?></span>
                                    </td>
                                    <td>
                                        <h5>Qty:</h5>
                                        <span><?= $receipt['qty']; ?></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <h5>Shipping Cost:</h5>
                                        <span>Rp. 15.000</span>
                                    </td>
                                    <td>
                                        <h5>Customer Name:</h5>
                                        <span><?= $receipt['customer_name']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Shipping Insurance:</h5>
                                        <span>Rp. 1.000</span>
                                    </td>
                                    <td>
                                        <h5>Customer Phone:</h5>
                                        <span><?= $receipt['customer_phone']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Application Service Fee:</h5>
                                        <span>Rp. 2.000</span>
                                    </td>   
                                    <td>
                                        <h5>Customer Email:</h5>
                                        <span><?= $receipt['customer_email']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Total Price:</h5>
                                        <span>Rp. <?= implode('.', explode(',', number_format($receipt['total']))); ?></span>
                                    </td>                 
                                    <td>
                                        <h5>Customer Address:</h5>
                                        <span><?= $receipt['customer_address']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Payment Method:</h5>
                                        <span>COD (Cash On Delivery)</span>
                                    </td>
                                    <td>
                                        <h5>Note:</h5>
                                        <span><?= $receipt['note']; ?></span>
                                    </td>
                                </tr>

                            </table>
                            
                            <button onclick="return window.print()" class="no-print btn btn-success"><i class="fas fa-fw fa-print"></i> Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

  


    <!-- Start Footer -->
    <?php include 'footer.php' ?>

    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>