<?php

include_once '../shared/config.php';
$id=$_GET['id'];

echo "Received value=$id";

$conn = new mysqli('localhost','root','', 'acme_aug_project');

mysqli_query($conn,"DELETE FROM products WHERE pid=$id");

header('location:view.php');

?>