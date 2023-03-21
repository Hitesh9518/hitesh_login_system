<?php
require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $error = array();

    $id = $_POST['id'];
    // customerfname
    if (empty($_POST['customer_fname'])) {

        $error[] = "First Name is Required";
    } else {
        $customer_fname = $_POST['customer_fname'];

        if (!preg_match("/^[a-zA-z]*$/", $customer_fname)) {
            $error[] = "Only alphabets and whitespace are allowed.";
        } else {
            $customer_fname = $_POST['customer_fname'];
        }
    }

    // customermname
    if (empty($_POST['customer_mname'])) {

        $error[] = "Middle Name is Required";
    } else {
        $customer_mname = $_POST['customer_mname'];

        if (!preg_match("/^[a-zA-z]*$/", $customer_mname)) {
            $error[] = "Only alphabets and whitespace are allowed.";
        } else {
            $customer_mname = $_POST['customer_mname'];
        }
    }

    // customerlname
    if (empty($_POST['customer_lname'])) {

        $error[] = "Last Name is Required";
    } else {
        $customer_lname = $_POST['customer_lname'];

        if (!preg_match("/^[a-zA-z]*$/", $customer_lname)) {
            $error[] = "Only alphabets and whitespace are allowed.";
        } else {
            $customer_lname = $_POST['customer_lname'];
        }
    }

    // dob
    if (empty($_POST['customer_dob'])) {
        $error[] = "DOB is Required";
    } else {
        $customer_dob = $_POST['customer_dob'];
    }

    // gender
    if (empty($_POST['customer_gender'])) {
        $error[] = "Gender is Required";
    } else {
        $customer_gender = $_POST['customer_gender'];
    }

    // hobbies
    if (empty($_POST['customer_hobbies'])) {
        $error[] = "Hobbies is Required";
    } else {
        $customer_hobbies = implode(",", $_POST['customer_hobbies']);
    }

    // address
    if (empty($_POST['customer_address'])) {
        $error[] = "Address is Required";
    } else {
        $customer_address = $_POST['customer_address'];
    }

    // mobile
    if (empty($_POST['customer_mobile'])) {
        $error[] = "Mobile No is Required";
    } else {
        $customer_mobile = $_POST['customer_mobile'];

        if (!preg_match("/^[0-9]*$/", $customer_mobile)) {
            $error[] = "Only Numeric Value Allowed";
        }
        if (strlen($customer_mobile) != 10) {
            $error[] = "Mobile no must contain 10 digits";
        }
    }

    // email
    if (empty($_POST['customer_email'])) {
        $error[] = "Email is Required";
    } else {
        $customer_email = $_POST['customer_email'];

        if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Invalid Email Format";
        }
    }

    // city
    if (empty($_POST['customer_city'])) {
        $error[] = "City is Required";
    } else {
        $customer_city = $_POST['customer_city'];
    }

    // state
    if (empty($_POST['customer_state'])) {
        $error[] = "State is Required";
    } else {
        $customer_state = $_POST['customer_state'];
    }

    // pincode
    if (empty($_POST['customer_pincode'])) {
        $error[] = "Pincode No is Required";
    } else {
        $customer_pincode = $_POST['customer_pincode'];

        if (!preg_match("/^[0-9]*$/", $customer_pincode)) {
            $error[] = "Only Numeric Value Allowed";
        }
        if (strlen($customer_pincode) != 6) {
            $error[] = "Pincode no must contain 6 digits";
        }
    }

    $count = count($error);
    if ($count > 0) {
        foreach ($error as $value) {
            echo "<span class='error'>" . $value . "</span><br>";
        }
    } else {

        $update = "update customer_login set customer_fname = '$customer_fname',customer_mname = '$customer_mname',customer_lname = '$customer_lname',customer_dob = '$customer_dob',customer_gender = '$customer_gender',customer_hobbies = '$customer_hobbies',customer_address = '$customer_address',customer_mobile = '$customer_mobile',customer_email = '$customer_email',customer_city = '$customer_city',customer_state = '$customer_state',customer_pincode = '$customer_pincode' where id='$id'";

        $result = mysqli_query($con, $update);

        echo "<span class='success'>Data Updated...!</span>";
    }
}
