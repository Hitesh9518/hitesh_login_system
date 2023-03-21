<?php include('header.php');
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.location.href='index.php';</script>";
}else{
    $email = $_SESSION['customer_email'];
    $sql = "SELECT * FROM customer_login WHERE customer_email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<center>
    <br><br>
    <h2>Change Password</h2>
    <br>
    <p id="msg" class="success error"></p>
    <form method="POST" autocomplete="off" id="change_password_form">
        <table border="2">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <tr>
                <td>Current Password</td>
                <td><input type="text" name="current_password"></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input type="text" name="new_password"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="text" name="confirm_password"></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary" name="change_pass">Submit</button>
    </form>
</center>

<?php include('footer.php'); ?>