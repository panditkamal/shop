<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include '_db.php';
        $user_email = $_POST['user_email'];
        $user_pass = $_POST['user_pass'];
        $user_cpass = $_POST['user_cpass'];

        // check wether this mail exists
        $existSql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
        $result = mysqli_query($db, $existSql);
        $numRows = mysqli_num_rows($result);
        if($numRows > 0){
            echo '<script>alert("Email already in use")</s/opt/lampp/htdocs/Work/Forums/threadslist.phpcript>';
        }else{
            if($user_pass == $user_cpass){
                $hash = password_hash($user_pass, PASSWORD_DEFAULT);
                $insert = "INSERT INTO `users` (user_email, user_pass) VALUES ('$user_email', '$hash')";
                $res = mysqli_query($db, $insert);
                if($res){
                    // echo '<script>alert("User id created Successfully")</script>';
                    header("location: ../index.php?signup=true");
                    exit();
                }else{
                    echo '<script>alert("Unable to create user id")</script>';
                    echo mysqli_error($db);
                }
            }else{
                echo "<script>alert('Password do not match')</script>";
            }
        }
        header("location: ../index.php?signup='Unable to create user id'");
    }
?>