<?php

$pid=$_GET['id'];

echo "Received Id=$pid";

session_start();

// get cart from session
//     add the new pid inside the cart
//     and update the session with new cart info

$local_cart=$_SESSION['cart'];

array_push($local_cart,$pid);

//insert into cart

print_r($local_cart);

$_SESSION['cart']=$local_cart;

// session_destroy()

?>