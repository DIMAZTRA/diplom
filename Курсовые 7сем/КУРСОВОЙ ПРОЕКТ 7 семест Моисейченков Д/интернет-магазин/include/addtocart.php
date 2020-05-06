<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    session_start();
    include('../include/dbconnect.php');
    $id = $_POST['id'];
    

    $result = mysqli_query($link, "SELECT * FROM table_products WHERE products_id='$id'");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        mysqli_query($link, 
        "INSERT INTO cart(cart_id_products,cart_price,cart_datetime,cart_ip) VALUES('".$row['products_id']."','".$row['price']."',NOW(),'".$_SERVER['REMOTE_ADDR']."')");
    }
    $count=mysqli_query($link, "SELECT * FROM cart  WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}'");
    echo mysqli_num_rows($count);
  
}
?>
