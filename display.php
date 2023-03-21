<?php include('header.php'); 

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.location.href='index.php';</script>";
}
?>

<?php

    $email = $_SESSION['customer_email'];
    // $sql = "SELECT * FROM customer_login WHERE email = '$email'";
    $sql = "SELECT
customer_login.id,customer_login.customer_fname,customer_login.customer_mname,customer_login.customer_lname,customer_login.customer_dob,customer_login.customer_gender,customer_login.customer_hobbies,customer_login.customer_address,customer_login.customer_mobile,customer_login.customer_email,customer_login.customer_state,customer_login.customer_city,customer_login.customer_pincode,customer_login.customer_password,
        state.state_id,state.state_name,
        city.city_id,city.city_name
        FROM customer_login
        INNER JOIN state
        ON customer_login.customer_state = state.state_id
        INNER JOIN city
        ON customer_login.customer_city = city.city_id 
        ";
        
    $result = mysqli_query($con,$sql);

    echo "
    <br>
    <center>
        <h3>Display Customer Data</h3>
    <br>
    </center>";
    echo "<table border='2'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Customer Fname</th>
                    <th>Customer Mname</th>
                    <th>Customer Lname</th>
                    <th>Customer Dob</th>
                    <th>Customer Gender</th>
                    <th>Customer Hobbies</th>
                    <th>Customer Address</th>
                    <th>Customer Mobile</th>
                    <th>Customer Email</th>
                    <th>Customer State</th>
                    <th>Customer City</th>
                    <th>Customer Pincode</th>
                    <th>Customer Password</th>
                </tr>
            </thead>";

        while($row = mysqli_fetch_assoc($result)){

            $id = $row['id'];
            $customer_fname = $row['customer_fname'];
            $customer_mname = $row['customer_mname'];
            $customer_lname = $row['customer_lname'];
            $customer_dob = date("d-m-Y",strtotime($row['customer_dob']));
            $customer_gender = $row['customer_gender'];
            $customer_hobbies = $row['customer_hobbies'];
            $customer_address = $row['customer_address'];
            $customer_mobile = $row['customer_mobile'];
            $customer_email = $row['customer_email'];
            $customer_state = $row['state_name'];
            $customer_city = $row['city_name'];
            $customer_pincode = $row['customer_pincode'];
            $customer_password = $row['customer_password'];

            echo "<tr>
                    <td>$id</td>
                    <td>$customer_fname</td>
                    <td>$customer_mname</td>
                    <td>$customer_lname</td>
                    <td>$customer_dob</td>
                    <td>$customer_gender</td>
                    <td>$customer_hobbies</td>
                    <td>$customer_address</td>
                    <td>$customer_mobile</td>
                    <td>$customer_email</td>
                    <td>$customer_state</td>
                    <td>$customer_city</td>
                    <td>$customer_pincode</td>
                    <td>$customer_password</td>
                </tr>";
        }
        echo "</table>";
?>

<?php include('footer.php'); ?>