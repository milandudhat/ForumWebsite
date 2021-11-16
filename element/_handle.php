<?php
    $showerror = "false";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        include '_database.php';

        $user_id = $_POST['username'];
        $user_pwd = $_POST['password'];
        $user_cpwd = $_POST['cpassword'];


        $existsql = "SELECT * FROM `user` WHERE `user_id`='$user_id'";

        $result = mysqli_query($cont , $existsql);
        $numrows = mysqli_num_rows($result);
        if($numrows > 0){
            $showerror = "your Email is already exist";
        }
        else{
            echo 'yes';
            if($user_pwd == $user_cpwd)
            {

                $hash_pwd = password_hash($user_pwd , PASSWORD_DEFAULT);
                $sql = "INSERT INTO `user` (`user_id`, `user_pwd`, `timestamp`) VALUES ('$user_id', '$hash_pwd', current_timestamp());";

                $result = mysqli_query($cont , $sql);
                if($result){
                    $showalert = true;
                    header("Location: /forum/index.php?signupsuccess=true");
                    exit();
                }
            }
            else{
                $showerror = "password do not match";
                // header("Location: /forum/index.php?signupsuccess=false&error=$showerror")
            }
        }
        header("Location: /forum/index.php?signupsuccess=false&error=$showerror");
    }

?>