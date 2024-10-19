<html>

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

        .btn btn-danger {
            width: fit-content;
            height: 30px;
            border-radius: 50%;
            background-color: red;
            color: black;
            border: none;
            cursor: pointer;
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

        .mid {
            
            display: table-cell;
            width: 23%;
            background-color: yellowgreen;
            border: 2px solid;
           
        }

        .navbar li {
            display: inline-block;
        }

        .navbar li a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="mid">
        <ul class="navbar">
            <li><a href="upload.html"><button type="button" class="btn btn-primary">Add Products</button></a></li>
            <li><a href="view.php"><button type="button" class="btn btn-primary">View Products</button></a></li>
            <li><a href="#"><button type="button" class="btn btn-primary">View Orders</button></a></li>
        </ul>
    </div>
</body>

</html>


<?php

include_once '../shared/config.php';
//connect to db
$conn = new mysqli('localhost', 'root', '', 'acme_aug_project');
// Read product table
$sql_obj = mysqli_query($conn, "select * from products");

// Fetch each row Trough Looping
while ($row = mysqli_fetch_assoc($sql_obj)) {
    //Extract Product fields
    $pid = $row['pid'];
    $name = $row['name'];
    $price = $row['price'];
    $details = $row['details'];
    $impath = $row['impath'];

    //render it as HTML
    echo "<div class='parent'>
            <div class='delete-parent'>     
               <a href='delete_product.php?id=$pid'>
               <button class='btn btn-danger'>X</button>
            
               </a>
             </div>
        
        <div class='name'>$name</div>
        <div class='price'>$price</div>
        <img src='$impath'>
        <p class='details'>$details</p>
    
    </div>";

    
}

?>