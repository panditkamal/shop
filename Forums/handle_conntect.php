<?php include 'partials/_db.php'; ?>
<?php
if(isset($_POST['submit'])){
$name=$_POST['name'];
$number=$_POST['number'];
$desc=$_POST['desc'];
 $sql = "INSERT INTO `contect_us` (`name`, `number`, `contect_desc`, `time`) VALUES ('$name', '$number', '$desc', CURRENT_DATE())" or die('sql querry failed');
    $result = mysqli_query($db, $sql);
    if($result){
        echo "your data sent succussfully";
    }else{
        echo "fuck off";
        echo mysqli_error($db);
    }
}
    
?>