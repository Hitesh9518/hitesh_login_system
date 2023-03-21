<?php
    require('config.php');
    error_reporting(0);
    // session_start();

        $customer_email = $_POST['customer_email'];
        $customer_password = $_POST['customer_password'];

        $sql = "SELECT * FROM customer_login WHERE customer_email = '$customer_email'";
        $result = mysqli_query($con,$sql);

        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){

            if($customer_password == $row['customer_password']){
                
                $_SESSION['customer_email'] = $row['customer_email'];
                echo "<script>window.location.href='welcome.php';</script>";
            }else{
                echo "<span class='error'>Email or Password does not exist..!</span>";
            }
        }else{
            echo "<span class='error'>User not Registered..!</span>";
        }
    
?>