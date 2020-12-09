<?php
    if($_FILES['file']['name']){
        $filename = $_FILES['file']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = array("jpg", "jpeng", "png", "gif");
        if(in_array($extension, $valid_extension)){//2 path in in_arry 2st what we searh and wher we search
            $new_name = rand(). "." .$extension;
            $path = "images/". $new_name;
            if(move_uploaded_file($_FILES['file']['tmp_name'], $path )){
                // echo '<img src="'.$path.'" alt=""> <br><br> <button data-path="'.$path.'" id="d_btn">Delte</button>';
                echo "<script>alert('ok..')</script>";
            }
        }else{
            echo '<script>alert("only image allow")</script>';
        }
    }
?>