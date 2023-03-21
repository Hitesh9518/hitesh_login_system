<?php
    require('config.php');
    error_reporting(0);
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $error = array();

        // otp
        if(empty($_POST['otp'])){
            $error[] = "OTP is Reqired";
        }else{
            $token = $_POST['otp'];
        }

        //new password
        if(empty($_POST['new_password'])){
            $error[] = "Password is Reqired";
        }else{
            $new_password = $_POST['new_password'];
    
            if(!preg_match("#[A-Z]+#",$new_password)) {
                $error[] = "Your Password Must Contain At Least 1 Capital Letter!";
            }
            if(!preg_match("#[a-z]+#",$new_password)) {
                $error[] = "Your Password Must Contain At Least 1 Lowercase Letter!";
            }
            if(!preg_match("#[0-9]+#",$new_password)){
                $error[] = "Your Password Must Contain At Least 1 Number!";
            }
            if (strlen($new_password) != 8) {
                $error[] = "Your Password Must Contain At Least 8 Characters!";
            }
        }

        // confirm password
        if (empty($_POST['confirm_password'])) {
            $error[] = "Confirm Password is Required";
        }else {
            $confirm_password = $_POST['confirm_password'];
        }

        $count = count($error);
        if ($count > 0) {
            foreach ($error as $value) {
                echo "<span class='error'>" . $value . "</span><br>";
            }
        }else{
            $checkOTP = "select * from customer_login where token = '$token'";
            $result = mysqli_query($con,$checkOTP);
            $row = mysqli_fetch_assoc($result);

        if($token != $row['token']){
            echo "<span class='error'>Wrong OTP...!</span>";
        }else{
            if($new_password != $confirm_password){
                echo "<span class='error'>New Password and Confirm Password Not Match...!</span>";
            }else{
                if($new_password == $confirm_password){
                    $update = "update customer_login set customer_password = '$new_password' where customer_email = '$row[customer_email]'";

                    $result = mysqli_query($con,$update);

                    echo "<span class='success'>Update Password...!</span>";
                    if($result){
                        $update2 = "update customer_login set token='' where token = '$token'";
                        $result = mysqli_query($con,$update2);
                    }
                }else {
                    echo "<span class='error'>Failed..!</span>";
                }
            }
        }
    }
}
?>