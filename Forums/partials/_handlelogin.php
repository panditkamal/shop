<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_db.php';
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];

    $sql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($db, $sql);
    $rows = mysqli_num_rows($result);
    $loggedin = false;
    if($rows==1){
        $data = mysqli_fetch_assoc($result);
        if(password_verify($user_pass, $data['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $data['sno'];
            $_SESSION['user_email'] = $user_email;
            header('Location: ../index.php?userlogin=true');
        }else{
            header('Location: ../index.php?userlogin=false');
            echo mysqli_error($db);
        }
    }
}
?>