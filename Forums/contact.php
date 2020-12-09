<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>contect_us_problemsharing</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<style>

.formdesine{
    width:90%;
}
</style>
<body class="bodystyle">

    <?php include 'partials/header.php'; ?>
    <?php include 'partials/_db.php'; ?>

    

    <div class="d-flex flex-column bd-highlight mb-3">
        <div class="row">
            <div class="row col-6  m justify-content-center">
                <img class="my-5" src="https://source.unsplash.com/450x500/?woman" alt="">
            </div>
            <div class="row col-6 justify-content-center">
                <form class="formdesine" method="post" action='handle_conntect.php'>
                <h1 class="d-flex justify-content-center my-4">Contect us</h1>
                    <div class="form-group">
                        <label for="text">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Number</label>
                        <input type="text" class="form-control" id="number" name="number">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                    </div>
                    <button type="submit" name="submit" onclick="kml()" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <script>
    function kml(){
        var $('#name').val();
        var $('#number').val();
        var $('#s').val();
    }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <?php include 'partials/_footer.php'; ?>

</body>

</html>