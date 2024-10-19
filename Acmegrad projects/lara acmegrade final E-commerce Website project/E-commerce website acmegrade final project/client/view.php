<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        body {
            background-color: #3f51b5;
            padding: 0px;
            margin: 1px 3px;
        }

        img {
            width: 100%;
            padding: -2px;
            margin: 0px;
            border: 1px solid mediumblue;
        }

        .parent {
            display: inline-block;
            width: 253px;
            background-color: aqua;
            margin: 44px 35px;
            border: 2px solid;
            padding: 14px;
        }

        .name {
            font-size: 31px;
            font-family: fantasy;
            font-weight: inherit;
        }

        .price {
            font-size: 27px;
            font-weight: 500;
            font-family: revert;
        }

        .price::before {
            content: "Rs ";
        }

        .delete-parent {
            text-align: right;
        }

        .btn btn-primary {
            width: fit-content;
            height: 30px;
            border-radius: 50%;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
        }

        .button-style {
            padding: 9px;
            background-color: yellowgreen;
            border: 2px slid;
            border-radius: 2px;
        }

        h1 {
            font-size: xxx-large;
            font-family: cursive;
            font-weight: 600;
        }

        p {

            margin-top: 4px;
            margin-bottom: 3rem;
            font-size: large;
            font-family: emoji;

        }
    </style>
</head>

<body>
    <div style="text-align:right" class="button-style">
        <a href="viewcart.php" class="btn btn-primary">View Cart</a>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</body>

</html>


<?php

session_start();
if ($_SESSION['login']==false) 
{
    echo "Invalid Access";
    die;
}
$username = $_SESSION['username'];
echo "<h1>$username</h1>";


//connect to db
$conn = new mysqli('localhost', 'root', '', 'acme_aug_project');

// Read product table
$sql_obj = mysqli_query($conn, "select * from products");

// Fetch each row Trough Looping
while ($row = mysqli_fetch_assoc($sql_obj)) 
{
    //Extract Product fields
    $pid = $row['pid'];
    $name = $row['name'];
    $price = $row['price'];
    $details = $row['details'];
    $impath = $row['impath'];

    //render it as HTML
    echo "<div class='parent'>
            <div class='delete-parent'>     
               <a href='addtocart.php?id=$pid'>
               <button class='btn btn-dark'>Add products</button>
               </a>
             </div>
        
        <div class='name'>$name</div>
        <div class='price'>$price</div>
        <img src='$impath'>
        <p class='details'>$details</p>
    
    </div>";
}

?>