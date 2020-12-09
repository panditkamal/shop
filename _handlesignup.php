<?php

include 'conn.php';
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['signupEmail'];
    $user_name = $_POST['user_name'];
    $num = $_POST['signupNumber'];
    $pass = $_POST['signuppassword'];
    $cpass = $_POST['signupcpassword'];

    //check whether this email exists
    $existsql = "SELECT * FROM `User_signup` WHERE signupEmail = '$user_email'";
    $result = mysqli_query($conn, $existsql) or die('Querry run unsuccessfully');
    $numRow = mysqli_num_rows($result);

    if ($numRow == 1) {
        $showError = 'Email already in use';
        header('Location: http://localhost/workspace/new files/lighten/index.php?emailalready_in_use');
    } else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            // $options = [
            //     'cost' => 12,
            // ];
            // $hash = password_hash($pass , PASSWORD_BCRYPT, $options);
            $sql= "INSERT INTO `User_signup` (`user_name`, `signupEmail`, `signupNumber`, `signuppassword`) VALUES ('$user_name', '$user_email', '$num', '$hash')";
            $result = mysqli_query($conn, $sql) or die('Insert querry failed');
            if ($result) {
                $showAlert = true;
                header('Location: http://localhost/workspace/new files/lighten/index.php?ssuccuss=true');
            }
        } else {
            $showError = 'Password do no match';
        }
    }
    // header('Location: http://localhost/workspace/new files/lighten/index.php?password incroccet');
}
