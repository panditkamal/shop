<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>iDiscuss</title>
    <style>
    .style-card{
        color:green;
    }
    .cdesine{
    width: 300px;
    min-width: 300px;
    height: auto;
    background-color: #fff;
    border-radius: 30px;
    position: relative;
    z-index: 0;
    margin: 25px;
    min-height: 350px;
    transition: all .25s ease;
    box-shadow: 5px 10px 18px #888888;
    cursor: pointer;
    
}

.cdesine .con-text{
    margin-top: -20px;
    padding: 10px 0 10px 0;



}
.con-text-btn{
    padding: 10px;
    margin-top: 10px;
    color: rgb(101, 128, 218);
    font-weight: 600;
    border: 2px solid #0000002c;
    outline: none;
    border-radius: 5px;
   
}
.heading{
    font-size: 25px;
    padding: 10px 0 10px 0;
    
}
.con-text-btn:hover{
    background-color: rgba(0, 0, 0, 0.404);
    /* border: 2px solid var(--main-color); */
    border: 0;
    box-shadow:  5px 5px 45px 0px rgba(0, 0, 0, 0.342);
    transition: .5s ease;
    outline: none;
    text-decoration: none;

}



    </style>
</head>

<body>
    <?php include 'partials/header.php'; ?>
    <?php include 'partials/_db.php'; ?>

    <!-- Slider start -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="partials/images/slide1.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="partials/images/slider2.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="partials/images/slider3.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Slider End -->

    <!-- Main Data -->
    <div class="container my-4">
        <h2 class="text-center my-4">Categories</h2>
        <div class="row my-4">

            <!-- Use a for loop to iterate through categories -->
            <?php
            $sql = "SELECT * FROM `category` ";
            $result = mysqli_query($db, $sql);
            $rows = mysqli_num_rows($result);
            while($data = mysqli_fetch_assoc($result)){
                $catid = $data['category_id'];
                $category = $data['category_name'];
                $category_desc = $data['category_description'];
                echo '<div class="col-md-4 my-3 style-card">
                <div class="card cdesine">
                    <img  src="https://source.unsplash.com/500x400/?'.$catid.'/php"  height="200px" class="con-img"
                        alt="Here is an image">
                    <div class="card-body ">
                        <h5 class="card-title heading"><a href="threadslist.php?catid=' . $catid . '">' . $category . '</a></h5>
                        <p class="card-text con-text">' . substr($category_desc,0, 80) . '...</p>
                        <a href="threadslist.php?catid=' . $catid . '" class="con-text-btn">Explore Card</a>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
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