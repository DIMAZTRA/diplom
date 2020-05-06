<?php
session_start();
include('include/dbconnect.php');
include('include/unsetauth.php');
include('include/auth.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment page</title>
    <link rel="shortcut icon" href="images/item-cat.jpg" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:700|Roboto:500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/libs.min.css">
    <link rel="stylesheet" href="css/style.min.css">

</head>

<body>

    <div class="wrapper">
        <div class="content">
            <?php
            include('include/block-header.php');
            ?>

            <div class="breadcrumbs">
                <div class="container">
                    <div class="breadcrumbs__inner">
                        <div class="breadcrumbs__list">
                            <li>
                                <a href="index.php">Home </a>
                            </li>
                            <li>
                                <a href="#">Payment</a>
                            </li>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="settings__inner about__head" >
                <p class="title">
                            Please, Check Data</p>
                    <div class="settings__line" >
                        <label class="settings__line-text" style="font-size: 25px;">
                            First Name:
                        </label>
                        <?php if($_SESSION['auth']=='yes_auth'){
                        echo'<p>'.$_SESSION["auth_name"].'</p>';}else{
                            echo'<p>'.$_SESSION["fname"].'</p>';
                        }?>
                    </div>

                    <div class="settings__line" >
                        <label class="settings__line-text" style="font-size: 25px;">
                            Last Name:
                        </label>
                        <?php if($_SESSION['auth']=='yes_auth'){
                        echo'<p>'.$_SESSION["auth_surname"].'</p>';}else{
                            echo'<p>'.$_SESSION["lname"].'</p>';
                        }?>
                    </div>
                    <div class="settings__line" >

                        <label class="settings__line-text" style="font-size: 25px;">
                            Email:
                        </label>
                        
                        <?php if($_SESSION['auth']=='yes_auth'){
                        echo'<p>'.$_SESSION["auth_email"].'</p>';}else{
                            echo'<p>'.$_SESSION["email"].'</p>';
                        }?>
 
                    </div>
                    <?php
                                    $result = mysqli_query($link, "SELECT * FROM cart,table_products WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}' AND cart.cart_id_products=table_products.products_id");
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_array($result);
                                        $total_price = 0;

                                        do {
                                            $total_price = $total_price + $row["price"];
                                        } while ($row = mysqli_fetch_array($result));
                                        echo '
                                        <div class="settings__line" >
                                        <label class="settings__line-text" style="font-size: 25px;">
                                            TOTAL:
                                        </label>
                                        <p>'.$total_price.'$</p>
                                    </div>';
                                    }
                                    ?>
                   

                    <div class="settings__line">
                        <button style="margin:0 auto 0 0" id="pay_submit" type="submit" name="pay_submit">PAY ORDER</button>
                    </div>
                </div>
            </div>



        </div>
        <?php
        include('include/block-footer.php');
        ?>
    </div>
    <?php
    include('include/login.php');
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/libs.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/main.js"></script>

</body>

</html>