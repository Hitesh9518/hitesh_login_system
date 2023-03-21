<?php include ('header.php'); ?>

    <center>
        <br><br>
        <h2>Add Customer Data</h2>
        <p id="msg" class="success error"></p>
        <form method="POST" autocomplete="off" id="registration_form">
            <table border="2">
                <tr>
                    <td>Customer First Name :</td>
                    <td><input type="text" name="customer_fname"></td>
                </tr>
                <tr>
                    <td>Customer Middle Name :</td>
                    <td><input type="text" name="customer_mname"></td>
                </tr>
                <tr>
                    <td>Customer Last Name :</td>
                    <td><input type="text" name="customer_lname"></td>
                </tr>
                <tr>
                    <td>Customer DOB :</td>
                    <td><input type="date" name="customer_dob"></td>
                </tr>
                <tr>
                    <td>Customer Gender :</td>
                    <td><input type="radio" name="customer_gender" value="Male">MALE
                        <input type="radio" name="customer_gender" value="Female">FEMALE
                    </td>
                </tr>
                <tr>
                    <td>Customer Hobbies :</td>
                    <td><input type="checkbox" name="customer_hobbies[]" value="Reading">Reading
                        <input type="checkbox" name="customer_hobbies[]" value="Cycling">Cycling
                        <input type="checkbox" name="customer_hobbies[]" value="Travelling">Travelling
                    </td>
                </tr>
                <tr>
                    <td>Customer Address :</td>
                    <td><textarea cols="21" rows="3" name="customer_address"></textarea></td>
                </tr>
                <tr>
                    <td>Customer Mobile No :</td>
                    <td><input type="text" name="customer_mobile"></td>
                </tr>
                <tr>
                    <td>Customer Email :</td>
                    <td><input type="text" name="customer_email"></td>
                </tr>
                <tr>
                    <td>Customer State :</td>
                    <td>
                        <select id="state" name="customer_state">
                            <option value="">-- Select State --</option>
                            <?php
                            $sql = "select * from state ";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=" . $row['state_id'] . ">" . $row['state_name'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>State not available</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer City :</td>
                    <td>
                        <select id="city" name="customer_city">
                            <option value="">-- Select City --</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer Pincode No :</td>
                    <td><input type="text" name="customer_pincode"></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="customer_password"></td>
                </tr>
                <tr>
                    <td>Confirm Password :</td>
                    <td><input type="password" name="customer_cpassword"></td>
                </tr>
            </table><br>
            <button type="submit" class="btn btn-primary" name="insert" id="submit">Insert</button>
        </form>
    </center>

<?php include ('footer.php'); ?>