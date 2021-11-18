<?php
    session_start();
?>
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

    <?php
        $t_id = $_GET['t_id'];
        $sql = "SELECT * FROM `thread` WHERE `t_id` =$t_id";
        $result = mysqli_query($cont , $sql);


        while($row = mysqli_fetch_assoc($result)){
                $t_name = $row['t_name'];
                $t_desc = $row['t_desc'];
                // echo $t_name;

                $t_user_id = $row['t_user_id']; 
                $sql2 = "SELECT user_id FROM `user` WHERE sr_no='$t_user_id'";
                $result2 = mysqli_query($cont, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $post = $row2['user_id'];
        }
    ?>

<?php
    $t_id = $_GET['t_id'];
    $showalert = false; 
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $comment = $_POST['comment'];
            $sr_no = $_POST['sr_no'];
            // $th_desc = $_POST['desc'];

            $sql = "INSERT INTO `cmt` (`cmt_content`, `t_id`, `cmt_by`, `cmt_time`) VALUES ('$comment', '$t_id', '$sr_no', current_timestamp());";
            $result = mysqli_query($cont , $sql);
            $showalert = true;
            if($showalert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>success!</strong> your data submit waiting for responce.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
        
    ?>
    <div class="container my-4">
        <div class="jumbotron bg-dark text-white px-4">
            <h1 class="display-4 mt-3"><?php echo $t_name;?></h1>
            <p class="lead"> <?php echo $t_desc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            <p class="py-2"><b>post by - <?php echo $post; ?></b></p>
        </div>
        <!-- <p><b>post by - miln</b></p> -->
    </div>


    <?php
    if(isset($_SESSION['login']) && $_SESSION['login']==true){
        echo '<div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sr_no" value="'. $_SESSION["sr_no"]. '">
            </div>
            <button type="submit" class="btn btn-success my-2">Post Comment</button>
        </form>
    </div>';
}
else{
    echo '   
        <div class="container">
        <h1 class="py-2">Post a Comment</h1> 
           <p class="lead">You are not logged in. Please login to be able to post comments.</p>
        </div>
        ';
}
?>
    <div class="container">
        <h1 class="py-2">Discussions</h1>
    </div>
    <?php
        $t_id = $_GET['t_id'];
        $sql = "SELECT * FROM `cmt` WHERE `t_id` = $t_id";
        $result = mysqli_query($cont , $sql);
        $no_threadfound = true;

        while($row = mysqli_fetch_assoc($result)){
                $cmt_id = $row['cmt_id'];
                $cmt_content = $row['cmt_content'];
                $time = $row['cmt_time'];

                $cmt_by = $row['cmt_by']; 
                $sql2 = "SELECT user_id FROM `user` WHERE sr_no='$cmt_by'";
                $result2 = mysqli_query($cont, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                $no_threadfound = false;
                echo '<div class="container my-4 contforques">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="element/user.png" width=50px alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                    <p class="font-weight-bold my-0">'.$row2['user_id'].' at '.$time.'</p> '.$cmt_content.'
                    </div>
                </div>
            </div>';
        }

        if($no_threadfound){
            echo  '<div class="container my-4 text-center ">
        <div class="jumbotron bg-dark text-white my-3">
            <h1 class="display-4 mt-3">NO DATA FOUND</h1>
    <p class="lead"> <?php echo $cat_desc;?></p>
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