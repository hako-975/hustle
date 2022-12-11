<?php 
    require_once 'connection.php';

    // check login
    if (!isset($_SESSION['status'])) {
        header('Location: login.php');
        exit;
    }

    // get id
    $product_id = $_GET['product_id'];

    // get data by id
    $data_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$product_id'"));



    // btn Edit Product Admin
    if (isset($_POST['btnEditProductAdmin'])) {
		$product_name = htmlspecialchars($_POST['product_name']);
		$product_stock = htmlspecialchars($_POST['product_stock']);
        $product_price = htmlspecialchars($_POST['product_price']);
		$product_description = htmlspecialchars($_POST['product_description']);

        $product_img_update = $data_product['product_img'];

        $product_img = $_FILES['product_img']['name'];

		if ($product_img != '') {
            $acc_extension = array('png','jpg', 'jpeg', 'gif');
            $extension = explode('.', $product_img);
            $extension_lower = strtolower(end($extension));
            $size = $_FILES['product_img']['size'];
            $file_tmp = $_FILES['product_img']['tmp_name'];   
            
            if(!in_array($extension_lower, $acc_extension))
            {
                echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            }
            $product_img_new_name = uniqid() . $product_img;
            $product_img_update = $product_img_new_name; 
            move_uploaded_file($file_tmp, 'assets/img/'. $product_img_new_name);
        }

        $sql = mysqli_query($conn, "UPDATE product SET product_name = '$product_name', product_stock = '$product_stock', product_price = '$product_price', product_description = '$product_description', product_img = '$product_img_update' WHERE product_id = '$product_id'");
        if($sql) {
            echo "<script>
            alert('Edit Product Admin Success!');
            document.location.href='edit_product_admin.php?product_id=".$product_id."'
            </script>";
        } else {
            echo "<script>
            alert('Edit Product Admin failed!');
            document.location.href='edit_product_admin.php?product_id=".$product_id."'
            </script>";
        }
    }


 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hustle - Edit Product Admin | <?= $data_product['product_name']; ?></title>
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
    <section>
        <div class="container">
            <div class="row my-4">
                <div class="col text-center">
                	<h1>Edit Product - <?= $data_product['product_name']; ?></h1>
                </div>
            </div>
            <div class="row">
            	<div class="col-6">
            		<form method="post" enctype="multipart/form-data">
            			<div class="mb-3">
						  <label for="product_name" class="form-label">Product Name</label>
						  <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $data_product['product_name']; ?>">
						</div>
						<div class="mb-3">
						  <label for="product_stock" class="form-label">Product Stock</label>
						  <input type="number" min="1" step="1" class="form-control" id="product_stock" name="product_stock" value="<?= $data_product['product_stock']; ?>">
						</div>
						<div class="mb-3">
						  <label for="product_price" class="form-label">Product Price</label>
						  <input type="number" min="1" step="1" class="form-control" id="product_price" name="product_price" value="<?= $data_product['product_price']; ?>">
						</div>
                        <div class="mb-3">
                          <label for="product_description" class="form-label">Product Description</label>
                          <textarea class="form-control" id="product_description" name="product_description"><?= $data_product['product_description']; ?></textarea>
                        </div>
						<div class="mb-3">
						  <label for="product_img" class="form-label">Product Image</label>
						  <input class="form-control" type="file" id="product_img" name="product_img">
						</div>
						<div class="col-auto">
					    	<button type="submit" name="btnEditProductAdmin" class="btn btn-primary mb-3">Edit Product</button>
					 	</div>
            		</form>
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