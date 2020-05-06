<?php
session_start();
include('include/dbconnect.php');
include('include/unsetauth.php');
include('include/auth.php');

if (isset($_GET['id'])) {
    $id = $_GET["id"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product-one</title>
    <link rel="shortcut icon" href="images/item-cat.jpg" type="image/x-icon">
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
            <section class="search page-search" style=" background-image: url(images/search-bg.jpg);">
                <div class="container">
                    <div class="search__inner">
                        <div class="search__inner-text">
                            Premium WordPress Themes, Web Templates and Many More ...
                        </div>
                        <div class="search__inner-form">
                            <form>
                                <input type="text" placeholder="Search Your Keywords . . ." required>

                                <button type="submit"><img src="images/icons/search.svg" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="breadcrumbs__inner">
                        <div class="breadcrumbs__list">
                            <li>
                                <a href="index.php">Home </a>
                            </li>
                            <li>
                                <a href="products.php">Product Page</a>
                            </li>
                            <li>
                                <a href="#">WordPress - GT Builder Construction</a>
                            </li>

                        </div>
                    </div>
                </div>
            </div>

            <section class="product-one">
                <div class="container">
                    <div class="product-one__inner">
                        <?php
                      
                        $res = mysqli_query($link, "SELECT * FROM table_products WHERE products_id='$id'");
                        if (mysqli_num_rows($res) ==1) {
                            $row = mysqli_fetch_array($res);
                            $img_path = '';
                            if ($row["image"] != "" && file_exists("./upload_images/" . $row["image"])) {
                                $img_path = $row["image"];
                            } else {
                                $img_path = 'no-img.jpg';
                            }
                            echo '
                        <div class="product-one__content">
                            <div class="product-one__images__inner">
                                <div class="product-one__images" style="background-image: url(upload_images/' . $img_path . ');">
                                </div>
                            </div>
                            <div class="product-one__title">
                            ' . $row["title"] . '
                            </div>
                            <div class="product-one__text">
                            ' . $row["description"] . '
                            </div>
                            <div class="product-one__box">
                                
                                <div class="product-one__social">
                                    <a class="icon-facebook" href="#"></a>
                                    <a class="icon-twitter" href="#"></a>
                                    <a class="icon-linkedin" href="#"></a>
                                    <a class="icon-pinterest-p" href="#"></a>
                                </div>
                            </div>
                            <div class="product-one__tabs">

                                <div class="tabs">
                                    <span class="tab active" data-id="1">Item Features</span>
                                    <span class="tab" data-id="2">Comments</span>
                                    <span class="tab" data-id="3">Reviews</span>
                                    <span class="tab" data-id="4">Support</span>
                                </div>
                                <div class="tab_content">
                                    <div class="tab-item active-tab" id="1">
                                        <ul class="tab-items__list">
                                            <li class="angle-right">Bhen an unknown printe</li>
                                            <li class="angle-right">Printing and typesetting industry</li>
                                            <li class="angle-right">Handard dummy text</li>

                                            <li class="angle-right">Printing and typesetting industry</li>
                                            <li class="angle-right">Bhen an unknown printe</li>
                                            <li class="angle-right"> Handard dummy text</li>
                                        </ul>
                                    </div>
                                    <div class="tab-item" id="2">
                                        <ul class="tab-items__list">

                                            <li class="angle-right">Printing and typesetting industry</li>
                                            <li class="angle-right">Bhen an unknown printe</li>
                                            <li class="angle-right"> Handard dummy text</li>
                                        </ul>
                                    </div>
                                    <div class="tab-item" id="3">
                                        <ul class="tab-items__list">
                                            <li class="angle-right">Bhen an unknown printe</li>
                                            <li class="angle-right">Printing and typesetting industry</li>
                                            <li class="angle-right">Handard dummy text</li>

                                            <li class="angle-right">Bhen an unknown printe</li>
                                            <li class="angle-right">Printing and typesetting industry</li>
                                            <li class="angle-right">Bhen an unknown printe</li>
                                            <li class="angle-right"> Handard dummy text</li>
                                        </ul>
                                    </div>
                                    <div class="tab-item" id="4">
                                        <ul class="tab-items__list">
                                            <li class="angle-right">Bhen an unknown printe</li>
                                            <li class="angle-right">Printing and typesetting industry</li>
                                            <li class="angle-right">Handard dummy text</li>
                                            <li class="angle-right">Desktop publishing software</li>
                                            <li class="angle-right">Bhen an unknown printe</li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                           
                        </div>
                        
                        <div class="product-one__aside">
                            <div class="aside__item product-price">
                                <div class="aside__title">Product Price</div>
                                <div class="price__box">
                                    <div class="price__product" style="display:flex;  justify-content: space-between;">' . $row["price"] . '$</div>
                                </div>
                                <button tid=' .$row["products_id"]. ' class="icon-heart-o product__item-btn">Add To Cart</button>


                            </div>

                            <div class="aside__item">
                                <div class="aside__title">Product Information</div>
                                <div class="information__line"><span>Released On: </span>1 January, 2019</div>
                                <div class="information__line"><span>Last Update: </span> 20 April, 2019</div>
                                <div class="information__line"><span>Download: </span> 613</div>
                                <div class="information__line"><span>Version: </span>1.1 </div>
                                <div class="information__line"><span>Compatibility: </span> Wordpress 4+ </div>
                                <div class="information__line"><span>Compatible Browsers: </span><br>IE9, IE10, IE11,
                                    Firefox, Safari, Opera, Chrome</div>
                            </div>
                        </div>';
                    }
                    ?>
                    </div>
                </div>
            </section>










        </div>

        <footer class="footer">
            <div class="footer__content">
                <div class="container">
                    <div class="footer__inner">
                        <div class="footer__col footer__col-address">
                            <div class="footer__col-title">
                                About Company
                            </div>
                            <div class="footer__col-text">
                                Praesent vel rutrum purus. Nam vel dui eu risus duis dignissim digniSuspen disse.Fusce
                                sit amet urna iat.Praesent vel rutrum purus.
                            </div>
                            <div class="footer__info">PO Box 16122 Collins Street West Victoria 8007 Australia</div>
                            <a href="tel:61383766284" class="footer__info footer__info-phone">+61 3 8376 6284</a>
                        </div>
                        <div class="footer__col footer__col-menu">
                            <div class="footer__col-title">
                                Join Our Community
                            </div>
                            <ul class="footer__col-list">
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Forums</a>
                                </li>
                                <li>
                                    <a href="#">Become an Author</a>
                                </li>
                                <li>
                                    <a href="#">Community Meetups</a>
                                </li>
                                <li>
                                    <a href="#">Become an Affiliate</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer__col footer__col-menu">
                            <div class="footer__col-title">
                                Need Help?
                            </div>
                            <ul class="footer__col-list">
                                <li>
                                    <a href="#">Help Center</a>
                                </li>
                                <li>
                                    <a href="#">Foxtar Market Terms</a>
                                </li>
                                <li>
                                    <a href="#">Author Terms</a>
                                </li>
                                <li>
                                    <a href="#">Foxtar Licenses</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer__col footer__col-social">
                            <div class="footer__col-title">
                                Follow Us On
                            </div>
                            <ul class="footer__social-link">
                                <li>
                                    <a class="link-facebook" href="#"></a>
                                </li>
                                <li>
                                    <a class="link-twitter" href="#"></a>
                                </li>
                                <li>
                                    <a class="link-pinterest" href="#"></a>
                                </li>
                                <li>
                                    <a class="link-youtube" href="#"></a>
                                </li>
                                <li>
                                    <a class="link-lindl" href="#"></a>
                                </li>
                            </ul>
                            <div class="footer__form">
                                <div class="footer__form-title">
                                    Newsletter Sign Up!
                                </div>
                                <form action="">
                                    <input type="text" placeholder="E-mail Address">
                                    <button type="submit"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__copy">
                <div class="container">
                    <div class="footer__copy-text">
                        © 2017 Foxtar market place. Trademarks and brands are the property of their respective owners.
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/libs.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>