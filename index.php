<?php
    include('header.php');
    if(isset($_SESSION['customer_email'])){
        echo "<script>window.location.href='welcome.php';</script>";
    }
    ?>

    <center>
        <br><br>
        <h2>Customer Login Form</h2>
        <br>
        <p id="msg" class="success error"></p>
        <form method="POST" autocomplete="off" id="login_form">
            <table border="2">
                <tr>
                    <td>UserName</td>
                    <td><input type="text" name="customer_email" id="customer_email"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="customer_password" id="customer_password"></td>
                </tr>
            </table><br>
            <button type="submit" class="btn btn-primary" name="login" id="submit">Login</button>
        </form>
    </center>

<?php include('footer.php'); ?>