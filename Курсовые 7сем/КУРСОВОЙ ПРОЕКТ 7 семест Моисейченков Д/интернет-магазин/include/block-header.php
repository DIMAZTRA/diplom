<?php
include('include/dbconnect.php');


?>
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="header__top-inner">
                <div class="header__logo">
                    <a href="#"><img src="images/logo.png" alt=""></a>
                </div>
                <div class="header__text">
                    <a href="">
                        <span>Need help?</span>
                    </a>
                    Talk to an expert:
                    <a class="header__phone" href="tel:61383766284">+61 3 8376 6284</a>
                </div>
                <div class="header__box">


                    <div class="basket__box">
                        <?php 
                         $count=mysqli_query($link, "SELECT * FROM cart  WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}'");
                         $count_num=mysqli_num_rows($count);
                         echo'
                        <a class="basket active icon-shopping-cart header__circle" href="cart.php?action=click"><span id="count_productsincart">'.$count_num.'</span></a>'?>
                        <div class="circle__menu">
                            <?php
                            $result = mysqli_query($link, "SELECT * FROM cart,table_products WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}' AND cart.cart_id_products=table_products.products_id");
                            if (mysqli_num_rows($result) >= 2) {
                                $row = mysqli_fetch_array($result);
                                $count = 2;

                                do {
                                    $count--;
                                    $img_path = '';
                                    if ($row["image"] != "" && file_exists("./upload_images/" . $row["image"])) {
                                        $img_path = $row["image"];
                                    } else {
                                        $img_path = 'no-img.jpg';
                                    }



                                    echo '
                            <div class="circle__item">
                                <img style="width:90px;height:70px" class="circle__images" src="upload_images/' . $img_path . '" alt="">
                                <div class="circle__info">
                                    <div class="circle__info-name">  ' . $row["title"] . '</div>
                                    <div class="circle__info-thema"> ' . $row["type"] . '</div>
                                    <div class="circle__info-date">' . $row["datetime"] . '</div>
                                </div>

                            </div>
                        ';
                        if($count==0)break;
                                } while ($row = mysqli_fetch_array($result));
                            } ?>
                            <div class="basket__summ">
                                <div class="basket__title">
                                    <div class="basket__summ-total">Total</div>
                                    <?php
                                    $result = mysqli_query($link, "SELECT * FROM cart,table_products WHERE cart.cart_ip='{$_SERVER['REMOTE_ADDR']}' AND cart.cart_id_products=table_products.products_id");
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_array($result);
                                        $total_price = 0;

                                        do {
                                            $total_price = $total_price + $row["price"];
                                        } while ($row = mysqli_fetch_array($result));
                                        echo "
                                    <div class='basket__summ-price'>$$total_price</div>";
                                    }
                                    ?>

                                </div>
                                <a class="basket__btn" style="width:100%;" href="cart.php?action=click">Go to Cart</a>

                            </div>
                        </div>
                    </div>
                    <div class="user__box">
                        <a class="user" href="#">
                            <div class="user__inner">
                                <div class="user__images">
                                    <img src="images/user-img.jpg" alt="">
                                </div>
                                <div class="user__info">
                                    <div class="user__name">Dzmitry Mois</div>
                                    <div class="user__money">$171.00</div>
                                </div>
                            </div>
                        </a>

                    </div>

                    <?php



                    if ($_SESSION['auth'] == 'yes_auth') {
                        echo '<a class="user-link" href="#">HI! [' . $_SESSION['auth_name'] . ']</a>
                        <a id="header__btn-logout" class="header__btn header__btn-logout" href="#">Logout</a>';
                    } else {
                        echo '<a data-fancybox data-src="#modal" class="header__btn header__btn-login header__btn-login--off" href="#">SIGN IN</a>
                        <a class="header__btn header__btn-registr header__btn-login--off" href="registration.php">REGISTER</a>';
                    }



                    ?>


                </div>
                <div class="header__btn-menu icon-user">
                </div>
            </div>
        </div>
    </div>
    <div class="header__menu">
        <div class="container">
            <nav class="menu">
                <div class="menu__btn">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <ul class="menu__list">
                    <li>

                        <a href="index.php">HOME</a>
                    </li>
                    <li>
                        <a href="products.php">ALL PRODUCTS</a>
                    </li>
                    <li>
                        <a href="about.php">ABOUT</a>
                    </li>

                    <li>
                        <a href="contact.php">CONTACT US</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


</header>