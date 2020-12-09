<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="index.php">Kamal</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
        </li>
   
        <li class="nav-item">
            <a class="nav-link" href="contact.php" tabindex="-1">contact</a>
        </li>
    </ul>
    <div class="row mx-2">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '<form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        <p class="text-light my-0 pl-2">Welcome '. $_SESSION['user_email'] .'</p>
    <a href="partials/_logout.php" class="btn btn-outline-success ml-2" data-target="#loginmodal">Logout</a>
    </form>';
    }else{
        echo'<form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginmodal">Login</button>
    <button class="btn btn-outline-success mx-1" data-toggle="modal" data-target="#signmodal">Sign-up</button>';
    }
    echo '</div>
</div>
</nav>';
include "_loginmodal.php";
include "_signmodal.php";

// echo $_GET['signup'];

if(isset($_GET['signup']) && $_GET['signup']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Signup successfully</strong> Use your email & password to login
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if(isset($_GET['userlogin']) && $_GET['userlogin']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Login successfully!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

// if(isset($_GET['userlogin']) && $_GET['userlogin']=='false'){
//     echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
//     <strong>Unable to login!</strong>
//     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//       <span aria-hidden="true">&times;</span>
//     </button>
//   </div>';
// }

// if(isset($_GET['$signupsuccess']) && $_GET['$signupsuccess']=="true"){
//     echo "yes";
// }

?>