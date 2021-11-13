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
    <style>
    .contforques {
        min-height: 500px;
    }
    </style>
</head>

<body>
    <?php 
      require 'element/_header.php';
      ?>
    <?php 
      require 'element/_database.php';
      ?>

    <?php
        $cat_id = $_GET['cat_id'];
        $sql = "SELECT * FROM `category` WHERE `cat_id` = $cat_id";
        $result = mysqli_query($cont , $sql);


        while($row = mysqli_fetch_assoc($result)){
                $cat_name = $row['cat_name'];
                $cat_desc = $row['cat_desc'];
        }
    ?>
    <div class="container my-4 text-center ">
        <div class="jumbotron bg-dark text-white my-3">
            <h1 class="display-4 mt-3">Welcome to <?php echo $cat_name;?> forums</h1>
            <p class="lead"> <?php echo $cat_desc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            <a class="btn btn-success btn-lgv mb-2" href="#" role="button">Learn more</a>
        </div>
    </div>
    <div class="container">
        <h3>Browse Questions</h3>
    </div>
    <?php
        $cat_id = $_GET['cat_id'];
        $sql = "SELECT * FROM `thread` WHERE `t_cat_id` = $cat_id";
        $result = mysqli_query($cont , $sql);


        while($row = mysqli_fetch_assoc($result)){
                $t_id = $row['t_id'];
                $t_name = $row['t_name'];
                $t_desc = $row['t_desc'];

                echo '<div class="container my-4 contforques">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="element/user.png" width=50px alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h4><a class="text-dark" href="thread.php?t_id=' . $t_id . '">' . $t_name . '</a></h4>
                        '.$t_desc.'
                    </div>
                </div>
            </div>';
        }
    ?>
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