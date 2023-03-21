<?php include('header.php'); 

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.location.href='index.php';</script>";
}

$email = $_SESSION['customer_email'];
$sql = "SELECT * FROM customer_login WHERE customer_email = '$email'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row['id'];
        $customer_fname = $row['customer_fname'];
        $customer_mname = $row['customer_mname'];
        $customer_lname = $row['customer_lname'];
        $customer_dob = $row['customer_dob'];
        $customer_gender = $row['customer_gender'];
        $customer_hobbies = explode(",", $row['customer_hobbies']);
        $customer_address = $row['customer_address'];
        $customer_mobile = $row['customer_mobile'];
        $customer_email = $row['customer_email'];
        $customer_city = $row['customer_city'];
        $customer_state = $row['customer_state'];
        $customer_pincode = $row['customer_pincode'];
?>

        <center>
            <br><br>
            <h2>Update Customer Data</h2>
            <p id="msg" class="success error"></p>
            <form method="POST" autocomplete="off" id="profile_update_form">
                <table border="2">
                    
                        <!-- <td>Id :</td> -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <!-- <input type="hidden" name="id" value="<?php echo $_SESSION['email']; ?>"> -->
                    
                    <tr>
                        <td>Customer First Name :</td>
                        <td><input type="text" name="customer_fname" value="<?php echo $customer_fname; ?>"></td>
                    </tr>
                    <tr>
                        <td>Customer Middle Name :</td>
                        <td><input type="text" name="customer_mname" value="<?php echo $customer_mname; ?>"></td>
                    </tr>
                    <tr>
                        <td>Customer Last Name :</td>
                        <td><input type="text" name="customer_lname" value="<?php echo $customer_lname; ?>"></td>
                    </tr>
                    <tr>
                        <td>Customer DOB :</td>
                        <td><input type="date" name="customer_dob" value="<?php echo $customer_dob; ?>"></td>
                    </tr>
                    <tr>
                        <td>Customer Gender :</td>
                        <td><input type="radio" name="customer_gender" value="Male" <?php if ($customer_gender == "Male") echo "checked"; ?>>MALE
                            <input type="radio" name="customer_gender" value="Female" <?php if ($customer_gender == "Female") echo "checked"; ?>>FEMALE
                        </td>
                    </tr>
                    <tr>
                        <td>Customer Hobbies :</td>
                        <td><input type="checkbox" name="customer_hobbies[]" value="Reading" <?php if (in_array("Reading", $customer_hobbies)) echo "checked"; ?>>Reading
                            <input type="checkbox" name="customer_hobbies[]" value="Cycling" <?php if (in_array("Cycling", $customer_hobbies)) echo "checked"; ?>>Cycling
                            <input type="checkbox" name="customer_hobbies[]" value="Travelling" <?php if (in_array("Travelling", $customer_hobbies)) echo "checked"; ?>>Travelling
                        </td>
                    </tr>
                    <tr>
                        <td>Customer Address :</td>
                        <td><textarea cols="21" rows="3" name="customer_address"><?php echo $customer_address; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Customer Mobile No :</td>
                        <td><input type="text" name="customer_mobile" value="<?php echo $customer_mobile; ?>"></td>
                    </tr>
                    <tr>
                        <td>Customer Email :</td>
                        <td><input type="text" name="customer_email" value="<?php echo $customer_email; ?>"></td>
                    </tr>
                    <tr>
                        <td>Customer State :</td>
                        <td>
                            <input type="hidden" id="state_id" value="<?php echo $customer_state; ?>">
                            <select id="state_dropdown" name="customer_state">
                                <option value="">-- Select State --</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Customer City :</td>
                        <td>
                            <input type="hidden" id="city_id" value="<?php echo $customer_city; ?>">
                            <select id="city_dropdown" name="customer_city">
                                <option value="">-- Select City --</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Customer Pincode No :</td>
                        <td><input type="text" name="customer_pincode" value="<?php echo $customer_pincode; ?>"></td>
                    </tr>
                </table><br>
                <button type="submit" class="btn btn-primary" name="update" id="submit">Update</button>
            </form>
        </center>
<?php
    }
}
?>
<?php include('footer.php'); ?>