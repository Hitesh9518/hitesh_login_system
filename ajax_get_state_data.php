<?php

require ('config.php');

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