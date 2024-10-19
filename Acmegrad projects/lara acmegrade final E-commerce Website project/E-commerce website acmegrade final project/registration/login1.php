<?php

$uname=$_POST['username'];
$upass=$_POST['password1'];

$conn=new mysqli('localhost','root','','registration');


//checking if the username is already available
$sql_object = mysqli_query($conn,"select * from users where username='$uname' and password='$upass'");

$total_rows = mysqli_num_rows($sql_object);
if($total_rows==0)
{
    echo "invalid Credentials";
    die;
}


echo "Login Success!!";
