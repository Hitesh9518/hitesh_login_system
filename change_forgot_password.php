<?php include('header.php'); ?>

<center>
    <br><br>
    <h2>Forgot Change Password</h2>
    <br>
    <p id="msg" class="success error"></p>
    <form method="POST" autocomplete="off" id="change_forgot_form">
        <table border="2">
            <tr>
                <td>Enter OTP</td>
                <td><input type="text" name="otp"></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input type="password" name="new_password"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="confirm_password"></td>
            </tr>
        </table><br>
        <button type="submit" class="btn btn-primary" name="change_forgot_pass">Submit</button>
    </form>
</center>

<?php include('footer.php'); ?>