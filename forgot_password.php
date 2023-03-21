<?php include('header.php');?>

<center>
    <br><br>
    <h2>Forgot Password</h2>
    <br>
    <p id="msg" class="success error"></p>
    <form method="POST" autocomplete="off" id="forgot_form">
        <table border="2">
            <tr>
                <td>Enter Your Email :</td>
                <td><input type="text" name="forgot_email" id="forgot_email"></td>
            </tr>
        </table><br>
        <button type="submit" class="btn btn-primary" name="forgot_pass">Send OTP</button>
    </form>
</center>

<?php include('footer.php'); ?>