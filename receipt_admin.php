<?php 
    require_once 'connection.php';

    // check login
    if (!isset($_SESSION['status'])) {
        header('Location: login.php');
        exit;
    }

    $totalReceipt = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM receipt"));
    $receipt = mysqli_query($conn, "SELECT * FROM receipt INNER JOIN product ON receipt.product_id = product.product_id");
 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hustle - Receipt Admin</title>
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

    <?php include 'header_admin.php'; ?>

    <!-- Start Brands -->
    <section class="py-5">
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Total Receipt</h5>
                        <p class="card-text"><?= $totalReceipt; ?></p>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No. Receipt</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Email</th>
                                    <th>Customer Address</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Qty</th>
                                    <th>Size</th>
                                    <th>Total</th>
                                    <th>Note</th>
                                    <th>Date Checkout</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($receipt as $receipt): ?>
                                    <tr>
                                        <td><?= $receipt['no_receipt']; ?></td>
                                        <td><?= $receipt['customer_name']; ?></td>
                                        <td><?= $receipt['customer_phone']; ?></td>
                                        <td><?= $receipt['customer_email']; ?></td>
                                        <td><?= $receipt['customer_address']; ?></td>
                                        <td><?= $receipt['product_name']; ?></td>
                                        <td><?= $receipt['product_price']; ?></td>
                                        <td><?= $receipt['qty']; ?></td>
                                        <td><?= $receipt['size']; ?></td>
                                        <td><?= $receipt['total']; ?></td>
                                        <td><?= $receipt['note']; ?></td>
                                        <td><?= $receipt['date_checkout']; ?></td>
                                        <td class="align-middle">
                                            <?php if ($receipt['status'] == 'process'): ?>
                                                <a href="change_status.php?no_receipt=<?= $receipt['no_receipt']; ?>" class="text-white btn btn-sm btn-danger" onclick="return confirm('Are you sure want to change status to completed?')">Process</a>
                                            <?php else: ?>
                                                <span class="btn btn-sm btn-success">Completed</span>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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