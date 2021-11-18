<?php
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
    <div class="container-fluid">
      <a class="navbar-brand" href="/forum/index.php">Q&A.com</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Category
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql = "SELECT `cat_name`  FROM `category`";
        $result = mysqli_query($cont , $sql);
        while($row = mysqli_fetch_assoc($result)){
          echo '
          <li><a class="dropdown-item" href="#">'.$row['cat_name'].'</a></li>';
        }
        echo '</ul>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Action</a></li>
        </ul>';
        echo'
        <li class="nav-item">
        <a class="nav-link" href="contact.php">Contectus</a>
      </li>
      </li>
    </ul>
        <form class="d-flex">
          <input class="form-control me-2 small " type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-danger" type="submit">Search</button>
        </form>
        <div class="mx-1">
          <!-- <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#login"
            type="submit">Login</button>
          <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#singup"
            type="submit" href="/login/signup.php">Singup</button> -->';
            if(isset($_SESSION['login']) && $_SESSION['login']==true){
              echo '<a class="btn btn-outline-danger" href="element/_logout.php" role="button">Logout</a>';
            }
            else{
              echo '
              <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#loginmodal""
              type="submit">Login</button>
            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#signmodal"
              type="submit">Singup</button>';
            }
        echo '
        </div>
      </div>
    </div>
  </nav>';
include 'element/loginmodal.php';
include 'element/signmodal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>success!</strong>  You can now login
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
}
?>