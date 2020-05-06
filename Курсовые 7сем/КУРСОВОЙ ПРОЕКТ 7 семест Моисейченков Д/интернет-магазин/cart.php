<?php
session_start();
include('include/dbconnect.php');
include('include/unsetauth.php');
include('include/auth.php');
$action = '';
$id = 0;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if (isset($_GET["action"])) {
    $action = $_GET["action"];
    switch ($action) {
        case 'delete':
            $delete = mysqli_query($link, "DELETE FROM cart WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}' AND cart_id='$id'");
            break;
    }
}


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

                                                            $total_price = 0;
                                                            $result = mysqli_query($link, "SELECT * FROM cart,table_products WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}' AND cart.cart_id_products=table_products.products_id");
                                                            if (mysqli_num_rows($result) > 0) {
                                                                $row = mysqli_fetch_array($result);


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
                                                            
                                                                <a href="view_content.php?id=' .$row["products_id"]. '" class="product__item-img" style="background-image: url(upload_images/' . $img_path . ')">
                                            
                                                                </a>
                                                                <div class="product__item-content">
                                                                    <div class="product__item-name">
                                                                        <a href="view_content.php?id=' .$row["products_id"]. '" class="product__item-title">
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
                                                        if ($_SESSION['auth'] == 'yes_auth' && mysqli_num_rows($result) != 0 ) {
                                                            echo ' <div class="settings__line">
                                                        <a style="width:180px; padding:10px; display:block; margin:0 auto;" href="payment.php" class="product__item-btn">
                                                        <span>BUY PRODUCTS</span>
                                                    </a>
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

                                if ($_SESSION['auth'] != 'yes_auth' && mysqli_num_rows($result) != 0) {
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