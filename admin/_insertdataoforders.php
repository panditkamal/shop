<?php
        include 'conn.php';
        session_start();
        $no = $_SESSION['sno'];
        $p_id = $_GET['p_id'];
        $random_value = rand(111111111111, 999999999999);
        $sql =  "INSERT INTO `orders` (`order_id`, `Customer_id`, `product_no`) VALUES ('$random_value', '$no', '$p_id')";
        $res = mysqli_query($conn, $sql)or die('querry failed');
        header('Location: http://localhost/workspace/new files/lighten/coustmour_cart.php');
?>
        