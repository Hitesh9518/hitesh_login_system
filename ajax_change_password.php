<?php 
    require('config.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $error = array();

        $customer_email = $_POST['email'];
        $current_password = $_POST['current_password'];
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
            
            $OldPassword = "select customer_email,customer_password from customer_login where customer_email = '$customer_email'";
            $result = mysqli_query($con,$OldPassword);
            $row = mysqli_fetch_assoc($result);

            if($current_password != $row['customer_password']){
                echo "<span class='error'>Old Password does not match...!</span>";
            }else{
                if($new_password != $confirm_password){
                    echo "<span class='error'>New Password and Confirm Password Not Match...!</span>";
                }else{
                    if($new_password == $confirm_password){
                        $update = "update customer_login set customer_password = '$new_password' where customer_email = '$customer_email'";

                        $result = mysqli_query($con,$update);

                        echo "<span class='success'>Update Password...!</span>";
                    }else {
                        echo "<span class='error'>Failed..!</span>";
                    }
                }
            }
        } 

    }
?>