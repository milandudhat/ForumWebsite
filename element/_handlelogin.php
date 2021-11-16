<?php

    if($_SERVER['REQUEST_METHOD']=="POST"){
        include '_database.php';

        $user_id = $_POST['username'];
        $user_pwd = $_POST['password'];

        $sql = "SELECT * FROM `user` WHERE `user_id`='$user_id'";

        $result  = mysqli_query($cont , $sql);

        $numrow = mysqli_num_rows($result);
        if($numrow == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($user_pwd,$row['user_pwd'])){
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $user_id;
                header('Location: /forum/index.php');
            }
            else{
                    echo 'unable to login';
            }
        }
    }

?>