<?php

$uname=$_POST['username'];
$pass1=$_POST['password1'];
$pass2=$_POST['password2'];
$mobile=$_POST['mobile'];

$conn=new mysqli('localhost','root','','registration');


//checking if the username is already available
$sql_object = mysqli_query($conn,"select * from users where username='$uname'");

$total_rows = mysqli_num_rows($sql_object);
if($total_rows>0)
{
    echo "User name $uname is already exists!";
    die;
}

$cmd="insert into users(username,password,mobile) values('$uname','$pass1','$mobile')";

mysqli_query($conn,$cmd);

echo "Registration Successful!!";

?>