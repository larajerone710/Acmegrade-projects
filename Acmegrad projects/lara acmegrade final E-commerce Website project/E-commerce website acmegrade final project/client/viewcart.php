<?php

$total = 0;

?>

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

        .order {
            position: absolute;
            top: 60px;
            left: 10px;
            background-color: chocolate;
            margin: 1px 1px;
            border-radius: 2px;
            border: 2px;
            border-style: double;
            padding: 2px;
        }

        .bg-success {
            border: 2px solid black;
            margin: 7px 11px;
            position: absolute;
            right: 0px;
        }

        .price-input {
            padding: 2px;
            margin: 2px 3px;

        }

        .form-control {
            padding: 9px;
            margin: 5px 4px;
            width: 98%;
        }
    </style>
</head>

<body>
    <div style="text-align:right" class="button-style">
        <a href="view.php" class="btn btn-primary">View Products</a>
        <a href="viewcart.php" class="btn btn-primary">View Cart</a>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>

</body>

</html>



<?php

include '../shared/config.php';

session_start();
$local_cart = $_SESSION['cart'];

$pids = implode(",", $local_cart);

$q = "select * from products where pid in ($pids)";

$sql_obj = mysqli_query($conn, $q);

while ($row = mysqli_fetch_assoc($sql_obj)) {
    //Extract Product fields
    $pid = $row['pid'];
    $name = $row['name'];
    $price = $row['price'];
    $details = $row['details'];
    $impath = $row['impath'];

    $total = $price;

    //render it as HTML
    echo "<div class='parent'>
            <div class='delete-parent'>     
               <a href='removecart.php?id=$pid'>
               <button class='btn btn-dark'>Remove Cart</button>
               </a>
             </div>
        
        <div class='name'>$name</div>
        <div class='price'>$price</div>
        <img src='$impath'>
        <p class='details'>$details</p>
    
    </div>";
}

// echo "<div class='order'>
//         <h5>Place order of <span class='total'>$total</span></h5>
//        </div>";

echo "<div class='w-25 bg-success'>

     <form method='post' action='placeorder.php'>

        <h2>Total Price in Rs</h2>
        <input name='total' class='price-input' readonly value='$total'>
        <textarea name='address' class='mt-3 form-control' placeholder='Delivery address'></textarea>
        <input class='mt-3 btn btn-primary' type='submit' value='place Order'>

    </form>
    </div>";
echo "</div>";
?>