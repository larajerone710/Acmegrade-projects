<?php

include_once "../shared/config.php";

$uname=$_POST['uname'];
$pass1=$_POST['pass1'];
$mobile=$_POST['mobile'];

//Check if username is already exists

$query="insert into users(username,password,mobile) values('$uname','$pass1','$mobile')";

echo $query;


$sql_result=mysqli_query($conn,$query);
if($sql_result)
{
    echo "Registration is successful!!";
    header('location:login.html');
}
else
{
     echo "Registration failed";
}

?>