<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>iDis - Threads</title>
</head>

<body>
    <?php include 'partials/header.php'; ?>
    <?php include 'partials/_db.php'; ?>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id` = $id";
    $result = mysqli_query($db, $sql);
    $rows = mysqli_num_rows($result);
    while($data = mysqli_fetch_assoc($result)){
        $thread_title = $data['thread_title'];
        $thread_description = $data['thread_description'];
    }
    ?>

    <!-- Main Body -->
    <div class="container">
        <!-- Jumbotron Start -->
        <div class="jumbotron my-4">
            <h1 class="display-4"><?php echo $thread_title ?></h1>
            <p class="lead"><?php echo $thread_description ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam/Advertising/ Self-promote in the forums. Do not post
                copyright-infringing material. Do not cross post questions. Do not PM users asking for help. Remain
                respectful of other members at all times.</p>
            <p>Posted By : <b>Anonymous</b></p>
        </div><!-- Jumbotron End -->

        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo'<div class="container">
        <h1 class="py-1">Post a comment</h1>
        <form action="' . $_SERVER["REQUEST_URI"] .'" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comment</label>
                <textarea class="form-control" id="description" name="comment_content" rows="3"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>
            <button type="submit" name="submit" class="btn btn-success mb-3">Post Comment</button>
        </form>
        </div>';
        }else{
            echo '
            <div class="container">
                <h1 class="py-1">Post a comment</h1>
                <p style="color:red;font-size:20px;">You need to login your account, For post comment on question.</p>
            </div>';
        }
        ?>

        <?php
        $showAlert = false;
        // $id = $_GET['threadid'];
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $comment = $_POST['comment_content'];
            $sno = $_POST['sno'];
            $sql = "INSERT INTO `comments` (`comment_content`, `comment_th_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp());"; 
            $result = mysqli_query($db, $sql);
            $showAlert = true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show mb-5" role="alert" >
                <strong>Success!</strong> Your comment has been added successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }
        }
    ?>
        <h1 class="py-2">Discussions</h1>
        <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE `comment_th_id` = $id";
    $result = mysqli_query($db, $sql);
    $rows = mysqli_num_rows($result);
    $noResult = true;
    while($data = mysqli_fetch_assoc($result)){
        $noResult = false;
        $comment_id = $data['comment_id'];
        $comment_content = $data['comment_content'];
        $comment_time = $data['comment_time'];
        $thread_user_id = $data['comment_by'];

        $sql2 = "SELECT 'user_email' FROM `users` WHERE sno = '$thread_user_id'";
        $result2 = mysqli_query($db, $sql2);
        $rows2 = mysqli_fetch_assoc($result2); 

        echo'<div class="media my-4">
            <img src="partials/images/abc.png" width="45px" class="mr-3" alt="...">
            <div class="media-body mb-3">
                <p class="font-weight-bold my-0">'. $rows2['user_email'] .' at ' . $comment_time . '</p>
                ' . $comment_content . '
            </div>
        </div>';
    }
    if($noResult){
        echo '<div class="alert alert-primary mb-5" role="alert">
        Be the first person for ask the question?
      </div>';
    }
    ?>

        <!-- <?php
        $noResult = false;
        if($noResult){
            echo '<div class="alert alert-primary mb-5" role="alert">
            Be the first person to post a comment..
            </div>';
        } 

     ?> -->
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