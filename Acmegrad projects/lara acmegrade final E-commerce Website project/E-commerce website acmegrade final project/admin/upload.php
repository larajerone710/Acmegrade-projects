<?php

include_once '../shared/config.php';
$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];

$fileobj=$_FILES['imname'];

print_r($fileobj);

$ext=".jpg";

date_default_timezone_set('Asia/Kolkata');
$mydate='..//images//'.date('Y_m_d_h_i_s').$ext;

move_uploaded_file($fileobj['tmp_name'],$mydate);

$conn=new mysqli('localhost','root','','acme_aug_project');

$cmd="insert into products(name,price,details,impath) values('$name','$price','$details','$mydate')";

echo "<br> $cmd <br>";

$sql_res=mysqli_query($conn,$cmd);
if($sql_res)
{
      echo "Product Updated successfully!!";
}
else
{
      echo "Upload Failed";
}


?>