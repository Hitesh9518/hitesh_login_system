<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
<?php include('header.php');

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.location.href='index.php';</script>";
} else {
    $email = $_SESSION['customer_email'];
    $sql = "SELECT * FROM customer_login WHERE customer_email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>
<div class="container-fluid mt-2 px-5">
    <h3><?php echo "Welcome " . $email = $row['customer_fname'] . " " . $email = $row['customer_lname']; ?></h3>
</div>

<?php include('footer.php'); ?>