<?php
    include 'conn.php';
    $o_id = $_POST['id'];
    $del = "DELETE FROM `orders` WHERE `orders`.`order_id` = 'o_id'";
     if(mysqli_query($conn, $del)){
         echo 1;
     }else{
         echo 0;
     }
?>