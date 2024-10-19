<?php
include_once '../shared/config.php';

$client_id=$_GET['client_id'];

$cmd="select name,mail id,mobile from clients where id=$client_id limit 1";

$sql_obj=mysqli_query($conn,$cmd);

$row=mysqli_fetch_assoc($sql_obj);

print_r($sql_obj);

echo "<a href='view orders.php'>Go back<a>";
?>