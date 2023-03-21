<?php require('config.php');
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $error = array();

    if (empty($_POST['forgot_email'])) {
        $error[] = "Email is Required";
    } else {
        $forgot_email = $_POST['forgot_email'];

        if (!filter_var($forgot_email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Invalid Email Format";
        }
    }

    $count = count($error);
    if ($count > 0) {
        foreach ($error as $value) {
            echo "<span class='error'>" . $value . "</span><br>";
        }
    }else{
        $checkEmail = "select * from customer_login where customer_email = '$forgot_email'";
        $result = mysqli_query($con,$checkEmail);
        $row = mysqli_fetch_assoc($result);

        if($forgot_email != $row['customer_email']){
            echo "<span class='error'>Email Not Found...!</span>";
        }else{
            $token = rand();

            $update = "update customer_login set token = '$token' where customer_email = '$forgot_email'";
            $result = mysqli_query($con,$update);

            echo "<span class='success'>Send Otp...!</span>";
        }
        // echo "<span class='error'>Failed..!</span>";
    }
}
?>