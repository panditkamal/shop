<?php 
include 'conn.php';
$no_of_order = $_POST['o'];
echo $no_of_order;
$insert = "INSERT INTO `orders` (`number_of_order`) VALUES ('$no_of_order') ";
$res = mysqli_query($conn, $insert);
if($res){
    echo 1;
}else{
    echo mysqli_error($conn);
}
?>