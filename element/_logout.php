<?php
    session_start();
    echo "waiting for sometime";
    // session_unset();
    session_destroy();
    header('location: /forum/index.php');

?>