<?php 
    require_once 'connection.php';

    // check login
    if (!isset($_SESSION['status'])) {
        header('Location: login.php');
        exit;
    }

    $no_receipt = $_GET['no_receipt'];

    $sql = mysqli_query($conn, "UPDATE receipt SET status = 'completed' WHERE no_receipt = '$no_receipt'");
    if($sql) {
        echo "<script>
        alert('Status Changed!');
        document.location.href='receipt_admin.php'
        </script>";
    } else {
        echo "<script>
        alert('Status Failed to change!');
        document.location.href='receipt_admin.php'
        </script>";
    }
 ?>