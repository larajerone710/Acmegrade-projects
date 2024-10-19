<?php

$conn=new mysqli('localhost','root','','acme_aug_project');

if($conn->connect_error)
{
    echo "Error in Connection";
    die;
}

?>