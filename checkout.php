<?php 
    require_once 'connection.php';
    
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $product_size = $_GET['product_size'];
        $product_quantity = $_GET['product_quantity'];
        $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$product_id'"));
    } else {
        header('Location: shop.php');
        exit;
    }

    $no_receipt = date('dmY/') . $product_id .'/'. uniqid();
    
    if (isset($_POST['btnBuy'])) {
        $customer_name = htmlspecialchars($_POST['customer_name']);
        $customer_phone = htmlspecialchars('+62'.$_POST['customer_phone']);
        $customer_email = htmlspecialchars($_POST['customer_email']);
        $customer_address = htmlspecialchars($_POST['customer_address']);
        $qty = $product_quantity;
        $size = $product_size;
        $total = htmlspecialchars($_POST['total']);
        $note = htmlspecialchars($_POST['note']);
        $date_checkout = date('Y-m-d h:i:s');

        $sql = mysqli_query($conn, "INSERT INTO receipt VALUES ('$no_receipt', '$customer_name', '$customer_phone', '$customer_email', '$customer_address', '$product_id', '$qty', '$size', '$total', '$note', '$date_checkout', 'process')");
        if($sql) {
            $descrease_stock = $product['product_stock'] - $qty;
            mysqli_query($conn, "UPDATE product SET product_stock = '$descrease_stock' WHERE product_id = '$product_id'");
            echo "<script>
            alert('Checkout Success!');
            document.location.href='receipt.php?no_receipt=$no_receipt'
            </script>";
        } else {
            echo "<script>
            alert('Checkout Failed!');
            document.location.href='receipt.php?no_receipt=$no_receipt'
            </script>";
        }
    }
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hustle - <?= $product['product_name']; ?></title>
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
<!--
    
TemplateMo 559 Hustle

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <?php include 'header.php' ?>

    <!-- Open Content -->
    <form method="POST">
        <section class="bg-light">
            <div class="container pb-5">
                <div class="row py-4">
                    <div class="col text-center">
                        <h1>Checkout</h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- col end -->
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h4>Customer Details:</h4>
                                <div class="mb-3">
                                  <label for="customer_name" class="form-label">Customer Name:</label>
                                  <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                                </div>
                                <label for="customer_phone" class="form-label">Customer Phone:</label>
                                <div class="input-group mb-3">
                                  <span class="input-group-text">+62</span>
                                  <input type="number" class="form-control" id="customer_phone" name="customer_phone" required>
                                </div>
                                <div class="mb-3">
                                  <label for="customer_email" class="form-label">Customer Email:</label>
                                  <input type="email" class="form-control" id="customer_email" name="customer_email" required>
                                </div>
                                <div class="mb-3">
                                  <label for="customer_address" class="form-label">Customer Address:</label>
                                  <textarea class="form-control" id="customer_address" name="customer_address" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- col end -->
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4>Product Details:</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Size</th>
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $product['product_name']; ?></td>
                                                    <td>Rp. <?= implode('.', explode(',', number_format($product['product_price']))); ?></td>
                                                    <?php if ($product_size == 'S'): ?>
                                                        <td>S</td>
                                                    <?php elseif ($product_size == 'M'): ?>
                                                        <td>M</td>
                                                    <?php elseif ($product_size == 'L'): ?>
                                                        <td>L</td>
                                                    <?php elseif ($product_size == 'XL'): ?>
                                                        <td>XL</td>
                                                    <?php endif ?>
                                                    <td><?= $product_quantity; ?></td>
                                                    <td>Rp. <?= implode('.', explode(',', number_format($product['product_price'] * $product_quantity))); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mb-3">
                                      <label for="note" class="form-label">Note (Optional):</label>
                                      <input type="text" class="form-control" id="note" placeholder="(Optional)" name="note">
                                    </div>
                                    <h5>Payment Method:</h5>
                                    <p>COD (Cash On Delivery)</p>
                                    <h5>Shipping Cost:</h5>
                                    <p>Rp. 15.000</p>
                                    <h5>Shipping Insurance:</h5>
                                    <p>Rp. 1.000</p>
                                    <h5>Application Service Fee:</h5>
                                    <p>Rp. 2.000</p>
                                    <hr>
                                    <h3>Total Price:</h3>
                                    <?php 
                                        $total = ($product['product_price'] * $product_quantity) + 15000 + 1000 + 2000;
                                     ?>
                                    <h3>Rp. <?= implode('.', explode(',', number_format($total))); ?></h3>
                                    <input type="hidden" name="total" value="<?= $total; ?>">
                                    <div class="row py-3">
                                        <div class="col d-grid">
                                            <button type="submit" class="btn btn-success btn-lg" name="btnBuy">Buy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </form>
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