<?php
include 'conn.php';
$showError = 'false';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['loginemail'];
    $pass = $_POST['loginpass'];
    $sql= "SELECT * FROM `User_signup` WHERE signupEmail  = '$email'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $numRow = mysqli_num_rows($result);
        if ($numRow > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['signuppassword'])) {
                session_start();
                echo 'start session';
                $_SESSION['login'] = true;
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['useremail'] = $email;
                echo 'login';
                // header('Location: http://localhost/workspace/new files/lighten/coustmour_cart.php');
                header('Location: http://localhost/workspace/new files/lighten/index.php?logged_successfully=true'); 
            } else {
                 header('Location: http://localhost/workspace/new files/lighten/index.php?Passwoerd_wrong=false');
            }
        }
    }else{
        echo mysqli_error($conn);
        //  header('Location: http://localhost/workspace/new files/lighten/index.php?end_login');
    }



