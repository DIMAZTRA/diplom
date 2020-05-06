<?php
session_start();
include('include/dbconnect.php');
include('include/unsetauth.php');
include('include/auth.php');

$id = isset($_GET["id"]);
$action = isset($_GET["action"]);


if (isset($_POST["buy_submit"])) {
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['email'] = $_POST['email'];
    header("Location:payment.php");
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cart page</title>
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
                                    <a href="#">My cart</a>
                                </li>

                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            
                if ($action == 'click')
                switch ($action) {
                    case 'delete':
                        $delete = mysqli_query($link, "DELETE FROM cart WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}' AND cart_id='$id'");
                        break;
                        

                }
                 if($action=='click' OR 0){ ?>
                <section class="settings">
                    <div class="container">
                        <div class="settings__inner">
                          
                                <div class="product-one__tabs settings__tabs">

                                    <div class="tabs">
                                        <span class="tab active angle-right active" data-id="1">My Order</span>



                                    </div>
                                    <div class="tab_content">
                                        <div class="tab-item active-tab" id="1">
                                            <div class="page-box">
                                                <div class="page-box__title">MY PRODUCTS</div>
                                                <div id="reg_message" style="color: #8bc34a; margin:0 auto;"></div>
                                                <div class="product__wrapper">

                                                    <div class="container-fluid" style="padding-top: 20px;">
                                                        <div class="products__inner">

                                                            <div class="products__inner-box">

                                                                <?php


                                                                    $result = mysqli_query($link, "SELECT * FROM cart,table_products WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}' AND cart.cart_id_products=table_products.products_id");
                                                                    if (mysqli_num_rows($result) > 0) {
                                                                        $row = mysqli_fetch_array($result);
                                                                        $total_price = 0;

                                                                        do {
                                                                            $total_price = $total_price + $row["price"];
                                                                            $img_path = '';
                                                                            if ($row["image"] != "" && file_exists("./upload_images/" . $row["image"])) {
                                                                                $img_path = $row["image"];
                                                                            } else {
                                                                                $img_path = 'no-img.jpg';
                                                                            }

                                                                            if ($row["new"] == 1) {
                                                                                $new = 'new';
                                                                            } else {
                                                                                $new = '';
                                                                            }

                                                                            if ($row["leader"] == 1) {
                                                                                $leader = 'popular';
                                                                            } else {
                                                                                $leader = '';
                                                                            }

                                                                            echo '  
                                                                    <div style="margin-left:10px;"class="product__item">
                                                                
                                                                    <a href="#" class="product__item-img" style="background-image: url(upload_images/' . $img_path . ')">
                                                
                                                                    </a>
                                                                    <div class="product__item-content">
                                                                        <div class="product__item-name">
                                                                            <a href="#" class="product__item-title">
                                                                            ' . $row["title"] . '
                                                                            </a>
                                                                            <a href="#" class="product__item-category">
                                                                            ' . $row["type"] . '
                                                                            </a>
                                                                        </div>
                                                                        <div class="product__item-price">
                                                                            $' . $row["price"] . '
                                                                        </div>
                                                                    </div>
                                                                    <div class="product__item-info">
                                                                        <a href="cart.php?id=' . $row["cart_id"] . '&action=delete" class="product__item-btn" style="background-color:#e74c3c;">
                                                                            <span>DELETE</span>
                                                                        </a>
                                                                        <div class="product__item-star">
                                                                            <div class="ret-star"></div>(<span>' . $row["votes"] . '</span>)
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                
                                                                    ';
                                                                        } while ($row = mysqli_fetch_array($result));
                                                                    }

                                                                    if (mysqli_num_rows($result) == 0) {
                                                                        echo '  <div style="flex-direction: column; margin:0 auto;" class="product__item-info">
                                                                <p class="title" style="margin:0 auto;color:#e74c3c;">SORRY! No items in your cart.</p>
                                                               
                                                                <a style="width:100px; display:block;" href="index.php" class="product__item-btn">
                                                                    <span>HOME PAGE</span>
                                                                </a>
                                                                </div>';
                                                                    }

                                                                    ?>

                                                            </div>
                                                            <?php echo '
                                                        <div class="title" style="display:block;margin:0 auto;">Total: ' . $total_price . '$</<div>
                                                        ';
                                                                if ($_SESSION['auth'] == 'yes_auth') {
                                                                    echo ' <div class="settings__line">
                                                            <button id="buy_submit" style="display:block;margin:0 auto; type="submit" name="buy_submit">BUY PRODUCTS</button>
                                                        </div>';
                                                                }
                                                                ?>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <?php

                                        if ($_SESSION['auth'] != 'yes_auth') {
                                            echo '
                               
                                <div>
                                        <div class="page-box">
                                            <div class="page-box__title">INFORMATION</div>
                                            <div id="reg_message" style="color: #8bc34a; margin:0 auto;"></div>
                                            <div id="information__content" class="page-box__content">
                                                <form id="information" method="POST">
                                                  

                                                
                                                    <div class="settings__line">
                                                        <label class="settings__line-text">
                                                            First Name
                                                        </label>
                                                        <input id="fname" name="fname" type="text">
                                                    </div>

                                                    <div class="settings__line">
                                                        <label class="settings__line-text">
                                                            Last Name
                                                        </label>
                                                        <input id="lname" name="lname" type="text">
                                                    </div>
                                                    <div class="settings__line">
                                                        <label class="settings__line-text">
                                                            E-mail
                                                        </label>
                                                        <input id="email" name="email" type="text">
                                                    </div>
                                                    
                                                    <div class="settings__line">
                                                        <button id="buy_submit" type="submit" name="buy_submit">BUY PRODUCTS</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        </div>';
                                        }
                                        ?>
                                </div>
                           


                        </div>
                        
                    </div>
            </div>
            </section>
        
                                    <?php } ?>
        


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
        <script>
        $(function() {
            $('#information').validate({
                rules: {
                    
                    'fname': {
                        required: true,
                        minlength: 2,
                        maxlength: 15
                    },
                    'lname': {
                        required: true,
                        minlength: 6,
                        maxlength: 15,
                    },
                    'email': {
                        required: true,
                        email: true
                    }
                   
                }
                
            })

           


        })
    </script>


    </body>

    </html>