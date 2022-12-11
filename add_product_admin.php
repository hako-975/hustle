<?php 
    require_once 'connection.php';

    // check login
    if (!isset($_SESSION['status'])) {
        header('Location: login.php');
        exit;
    }

    // btn Add Product Admin
    if (isset($_POST['btnAddProductAdmin'])) {
		$product_name = htmlspecialchars($_POST['product_name']);
		$product_stock = htmlspecialchars($_POST['product_stock']);
        $product_price = htmlspecialchars($_POST['product_price']);
		$product_description = htmlspecialchars($_POST['product_description']);

        $product_img = $_FILES['product_img']['name'];

		if($product_img != '')
        {
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
            move_uploaded_file($file_tmp, 'assets/img/'. $product_img_new_name);
        }

        $sql = mysqli_query($conn, "INSERT INTO product VALUES ('', '$product_name', '$product_stock', '$product_price', '$product_description', '$product_img_new_name')");
        if($sql) {
            echo "<script>
            alert('Add Product Admin Success!');
            document.location.href='product_admin.php'
            </script>";
        } else {
            echo "<script>
            alert('Add Product Admin failed!');
            document.location.href='add_product_admin.php'
            </script>";
        }
    }

 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hustle - Add Product Admin</title>
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
    <section>
        <div class="container">
            <div class="row my-4">
                <div class="col text-center">
                	<h1>Add Product</h1>
                </div>
            </div>
            <div class="row">
            	<div class="col-6">
            		<form method="post" enctype="multipart/form-data">
            			<div class="mb-3">
						  <label for="product_name" class="form-label">Product Name</label>
						  <input type="text" class="form-control" id="product_name" name="product_name" required>
						</div>
						<div class="mb-3">
						  <label for="product_stock" class="form-label">Product Stock</label>
						  <input type="number" min="1" step="1" class="form-control" id="product_stock" name="product_stock" required>
						</div>
						<div class="mb-3">
						  <label for="product_price" class="form-label">Product Price</label>
						  <input type="number" min="1" step="1" class="form-control" id="product_price" name="product_price" required>
						</div>
                        <div class="mb-3">
                          <label for="product_description" class="form-label">Product Description</label>
                          <textarea class="form-control" id="product_description" name="product_description" required></textarea>
                        </div>
						<div class="mb-3">
						  <label for="product_img" class="form-label">Product Image</label>
						  <input class="form-control" type="file" id="product_img" name="product_img" required>
						</div>
						<div class="col-auto">
					    	<button type="submit" name="btnAddProductAdmin" class="btn btn-primary mb-3">Add Product</button>
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