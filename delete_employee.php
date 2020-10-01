<?php
require 'conn.php';
$id=$_GET['e_id'];
$sql="Delete from employees where e_id='$id'";
if (mysqli_query($conn, $sql)) {
    header('Location: dash.php');
}
else
    {
    echo "Error deleting record". mysqli_connect_error($conn);
    }
?>

