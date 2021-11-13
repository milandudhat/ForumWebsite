<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>forum website</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php 
      require 'element/_header.php';
      ?>
    <?php 
      require 'element/_database.php';
      ?>
    <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner carousel-fade">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="element/image/1.jpg" class="d-block w-100" alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light">Welcome to code-liner</h5>
                    <p class="text-light">Starategic Design And Technology Agency.</p>
                    <button class="btn btn-primary btn-sm">Start project with us</button>
                    <button class="btn btn-danger btn-sm">Contect me</button>
                </div> -->
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="element/image/2.jpg" class="d-block w-100" alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light">One Stop Solution For All Your Business Needs</h5>
                    <p class="text-light">We know that good design means good business.</p>

                    <button class="btn btn-primary btn-sm">Start project with us</button>
                    <button class="btn btn-danger btn-sm">Contect me</button>
                </div> -->
            </div>
            <div class="carousel-item">
                <img src="element/image/3.jpg" class="d-block w-100" alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light">Thinking The High Quality Software</h5>
                    <p class="text-light">services in close partnership with our clients is the only way to have a real
                        impact on
                        their business.</p>
                    <button class="btn btn-primary btn-sm">Start project with us</button>
                    <button class="btn btn-danger btn-sm">Contect me</button>
                </div> -->
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container mx-auto">
        <h2 class="text-center my-2">Welcome to Q&A.com</h2>
        <div class="row my-2">


            <?php

            $sql = 'SELECT * FROM `category`';
            $result = mysqli_query($cont , $sql);

            while($row = mysqli_fetch_assoc($result)){
                // echo $row['cat_id'];
                $cat_id = $row['cat_id'];
                $cat_name = $row['cat_name'];
                $cat_desc = $row['cat_desc'];
                echo '<div class="col-md-4 my-4">
                <div class="card" style="width: 15rem;">
                    <img src="https://source.unsplash.com/collection/190727/500x400" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-dark"><a class="text-dark" href="threadlist.php?cat_id=' . $cat_id . '">' . $cat_name . '</a></h5>
                        <p class="card-text">'.$cat_desc.'</p>
                        <a href="threadlist.php?cat_id=' . $cat_id . '"" class="btn btn-primary ">view more</a>
                    </div>
                </div>
            </div>';
            }


        ?>
        </div>
    </div>
    <?php 
      require 'element/_footer.php';
      ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>