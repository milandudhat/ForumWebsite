<?php
    session_start();
    echo "waiting for sometime";
    session_destroy();
    header('location: /forum/index.php');

?>