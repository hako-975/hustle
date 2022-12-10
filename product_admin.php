<?php 
    require_once 'connection.php';

    // check login
    if (!isset($_SESSION['status'])) {
        header('Location: login.php');
        exit;
    }

    $product_admin = mysqli_query($conn, "SELECT * FROM product");
 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hustle - Product Admin</title>
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

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h2 align-self-center" href="admin.php">
                Hustle Admin
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="product_admin.php">Product</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <li class="nav-icon dropdown position-relative list-unstyled">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i> <?= $_SESSION['username']; ?>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><?= $_SESSION['username']; ?></a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                      </ul>
                    </li>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Start Brands -->
    <section>
        <div class="container">
            <div class="row my-4">
                <div class="col text-end">
                    <a href="add_product_admin.php" class="btn btn-success">Add Product</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="text-center table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Product Stock</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($product_admin as $product): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $product['product_name']; ?></td>
                                        <td><?= $product['product_stock']; ?></td>
                                        <td><?= $product['product_price']; ?></td>
                                        <?php 
                                            $desc = $product['product_description'];
                                            if (strlen($desc) > 150) {
                                                $desc = substr($desc, 0, 150) . '...';
                                            }
                                         ?>
                                        <td class="text-start" width="300px"><?= $desc; ?></td>
                                        <td><a href="assets/img/<?= $product['product_img']; ?>" target="_blank">
                                            <img width="75" src="assets/img/<?= $product['product_img']; ?>" alt="<?= $product['product_img']; ?>"></td>
                                        </a>
                                        <td>
                                            <a class="btn btn-sm btn-success m-1" href="edit_product_admin.php?product_id=<?= $product['product_id']; ?>">Edit</a>
                                            <a class="btn btn-sm btn-danger m-1" href="delete_product_admin.php?product_id=<?= $product['product_id']; ?>&product_name=<?= $product['product_name']; ?>" onclick="return confirm('Are you sure want to delete product <?= $product['product_name']; ?>?')">Delete</a>
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