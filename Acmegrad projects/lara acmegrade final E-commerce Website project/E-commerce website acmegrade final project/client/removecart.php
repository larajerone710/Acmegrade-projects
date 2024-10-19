<?php

$pid=$_GET['id'];

session_start();
$local_cart=$_SESSION['cart'];

$index=array_search($pid,$local_cart);
array_splice($local_cart,$index,1);

$_SESSION['cart']=$local_cart;

header('location:viewcart.php');

?>
