<?php
$db = mysqli_connect("localhost","root","","idiscuss");
if(!$db){
    echo "<script>alert('DataBase Connection lost')</script>";
}
?>