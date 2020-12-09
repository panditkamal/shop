<?php
include 'conn.php';
if(isset($_FILES['image'])){
    $file_name = $_FILES['image']['name'];
    $file_type = $_FILES['image']['type'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];
        
    $name = rand().$file_name;
    if(move_uploaded_file($file_tmp, "../images/".$name)){
        if(isset($_POST['send'])){
        $pname = $_POST['p_name'];
        $price = $_POST['p_price'];
        $price_q = $_POST['p_q'];
        $p_detail = $_POST['p_detail'];
        $cat_id = $_POST['cat_id'];
        // $insert = "INSERT INTO `img` (img_name, p_name, p_price ) VALUE ('$name' '$pname' '$price')";
        $insert = "INSERT INTO `img` (`img_name`, `p_name`, `p_price`, `p_q`, `cat_id`, `pro_detail`) VALUES ('$name', '$pname', '$price', '$price_q','$cat_id', '$p_detail')";
        $res = mysqli_query($conn, $insert);
        echo 'images loded succussfully';
        };
    }else{
        echo 'Data sent unscussfull';
    }
}
?>
<!Doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .Kdes {
        border: 2px solid rgb(221, 235, 26);
        padding: 8px 32px;
    }
    </style>
</head>
<body>
    <div class=".container-fluid">
        <div class="row">
            <div class="row col-4">
            </div>
            <div class="row col-4 border border-warning K_desined d-flex justify-content-center my-5">
                <h1 class="my-4">Add products</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image" />
                    <br><br>
                    <input type="text" placeholder="product Name" name="p_name">
                    <input type="text" placeholder="product price" name="p_price">
                    <input type="text" placeholder="product Quantity" name="p_q">
                    <input type="text" placeholder="product detail" name="p_detail">
                    <input type="text" placeholder="cat_id" name="cat_id">

                    <input type="submit" class="Kdes my-2" name="send">
                </form>
            </div>
            <div class="row col-4">
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> -->
</body>
</html>