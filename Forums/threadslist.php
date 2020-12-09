<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>iDis - ThreadsList</title>
</head>

<body>
    <?php include 'partials/header.php'; ?>
    <?php include 'partials/_db.php'; ?>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE `category_id` = $id";
    $result = mysqli_query($db, $sql);
    $rows = mysqli_num_rows($result);
    while($data = mysqli_fetch_assoc($result)){
        $cat_name = $data['category_name'];
        $cat_desc = $data['category_description'];
    }
    ?>
    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $th_title = $_POST['title'];
        $th_description = $_POST['description'];
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_description', '$id', '$sno', current_timestamp());";
        $result = mysqli_query($db, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your thread has been added successfully. Please wait till than someone respond.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    ?>

    <!-- Main Body -->
    <div class="container">
        <!-- Jumbotron Start -->
        <div class="jumbotron my-3">
            <h1 class="display-4">Welcome to <?php echo $cat_name ?> Forums</h1>
            <p class="lead"><?php echo $cat_desc ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums. Do not post
                copyright-infringing material. Do not cross post questions. Do not PM users asking for help. Remain
                respectful of other members at all times.</p>
            <a class="btn btn-success btn-lg"
                href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwifvITZ8pvsAhXDzjgGHdFJDHkQFjAAegQIBxAD&url=https%3A%2F%2Fwww.python.org%2F&usg=AOvVaw0QREvGsjwHKp2GtoYvs1JH"
                target="_blank" role="button">Learn more</a>
        </div><!-- Jumbotron End -->

        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo '<div class="container">
            <h1 class="py-1">Ask a Questions</h1>
            <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Problem Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Keep your title as crisp and short as
                possible</small>
        </div>
        <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Elaborate your concern</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-success mb-3">Submit</button>
        </form>
    </div>';
    }
    else{
    echo '
    <div class="container">
            <h1 class="py-1">Start a Discussion</h1>
            <p style="color:red;font-size:20px;">You need to login your account, For Discussion.</p>
    </div>';
    }
    ?>
        <div class="container" id="ques">
            <h1 class="py-2">Browse Questions</h1>
            <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id";
            $result = mysqli_query($db, $sql);
            $rows = mysqli_num_rows($result);
            $noResult = true;
            while($data = mysqli_fetch_assoc($result)){
                $noResult = false;
                $thread_id = $data['thread_id'];
                $thread_title = $data['thread_title'];
                $thread_description = $data['thread_description'];
                $time_stamp = $data['timestamp'];
                $thread_user_id = $data['thread_user_id'];
                $sql2 = "SELECT 'user_email' FROM `users` WHERE sno = '$thread_user_id'";
                $result2 = mysqli_query($db, $sql2);
                $rows2 = mysqli_fetch_assoc($result2);
                // echo $rows2['user_email'];
                echo'<div class="media my-4">
                    <img src="partials/images/abc.png" width="45px" class="mr-3" alt="...">
                    <div class="media-body">'.
                    '<h5 class="mt-0 mb-0"><a href="thread.php?threadid='.$thread_id.'">' . $thread_title . '</a></h5>' . $thread_description . '</div>'.'<p class="font-weight-bold my-1">'. $time_stamp .'</p>'.
                    '</div>';
            }
            if($noResult){
                echo '<div class="alert alert-primary mb-5" role="alert">
                Be the first person for ask the question?
              </div>';
            }
        ?>
        </div>
        <!-- <div class="media my-4">
            <img src="partials/images/abc.png" width="45px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Unable to install pyaudio in windows.</h5>
                It show to install pip in python. But i have already install in my system. Any one know about solution.
            </div>
        </div> -->
    </div>
    <?php include 'partials/_footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>
</html>