<?php
    require ('config.php');
    
    if(!isset($_SESSION['customer_email'])){
        echo "<script>window.location.href='index.php';</script>";
    }
    
    session_unset();
    session_destroy();

    echo "<script>window.location.href='index.php';</script>";
?>