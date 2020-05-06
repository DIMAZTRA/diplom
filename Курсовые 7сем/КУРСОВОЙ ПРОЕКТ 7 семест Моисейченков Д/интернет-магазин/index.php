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
    <title>Moderno</title>
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
            <section class="search" style=" background-image: url(images/search-bg.jpg);">
                <div class="container">
                    <div class="search__inner">
                        <div class="search__inner-title">
                            Welcome To Foxtar Market Place!
                        </div>
                        <div class="search__inner-text">
                            Premium WordPress Themes, Web Templates and Many More ...
                        </div>
                        <div class="search__inner-form">
                            <form method="GET" action="search.php?q=">
                                <input type="text" name="q" placeholder="Search Your Keywords . . ." required>

                                <button type="submit"><img src="images/icons/search.svg" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="products">
                <div class="product__wrapper">

                    <div class="container-fluid">
                        <div class="products__title title">
                            Let’s Check Out Our Newest Release Prodcuts
                        </div>
                        <div class="products__inner">
                            <div class="products__inner-btn">
                                <button type="button" data-filter="all">All</button>
                                <button type="button" data-filter=".category-plugins">Plugins</button>
                                <button type="button" data-filter=".category-joomla">Joomla</button>
                                <button type="button" data-filter=".category-wordpress">WordPress</button>
                                <button type="button" data-filter=".category-components">Components</button>
                                <button type="button" data-filter=".category-psd">PSD</button>
                            </div>
                            <div class="products__inner-box">
                                <?php
                                $result = mysqli_query($link, "SELECT * FROM table_products");
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);


                                    do {
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
                                        
                                        <div id=' .$row["products_id"]. ' class="product__item mix category-' . $new . ' category-' . $leader . ' category-' . strtolower($row["type"]) . '">
                                    
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
                                            <a tid=' .$row["products_id"]. ' href="#" class="product__item-btn">
                                                <span>Buy</span>
                                            </a>
                                            <div class="product__item-star">
                                                <div class="ret-star"></div>(<span>' . $row["votes"] . '</span>)
                                            </div>
                                        </div>
                                    </div>
                                        
                                        ';
                                    } while ($row = mysqli_fetch_array($result));
                                }

                                ?>

                            </div>
                        </div>
                        <div class="products__bottom-btn">
                            <button type="button" data-filter=".category-new">All New Items</button>
                            <button type="button" data-filter=".category-popular">Popular Items</button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-slider">
                <div class="product-slider__wrapper">
                    <div class="container-fluid">
                        <div class="product-slider__title title">
                            This Week Trending Products
                        </div>
                        <div class="product-slider__inner">
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/content/proditem.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $25
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                        
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr13.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $90
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                       
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr9.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $32
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image:url(images/content/user.jpg);">
                                        </div>
                                      
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr7.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $56
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                    
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr14.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $44
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                        
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr10.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $10
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                        
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr6.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $44
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                        
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr4.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $31
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                        
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr11.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $78
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                       
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr15.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $11
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                       
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr16.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $55
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                       
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>
                            <div class="product__item">
                                <a href="#" class="product__item-img" style="background-image: url(images/pr7.jpg)">

                                </a>
                                <div class="product__item-content">
                                    <div class="product__item-name">
                                        <a href="#" class="product__item-title">
                                            Responsive Mobile APP
                                        </a>
                                        <a href="#" class="product__item-category">
                                            Site Template
                                        </a>
                                    </div>
                                    <div class="product__item-price">
                                        $24
                                    </div>
                                </div>
                                <div class="product__item-info">
                                    <a href="#" class="product__item-author">
                                        <div class="avatar" style="background-image: url(images/content/user.jpg);">
                                        </div>
                                  
                                    </a>
                                    <div class="product__item-star">
                                        <div class="ret-star"></div>(<span>05</span>)
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
            <section class="advantages">
                <div class="container">
                    <div class="advantages__title title">Why You Choose Foxtar Market Place?</div>
                    <div class="advantages__inner">
                        <div class="advantages__item">
                            <div class="advantages__item-img icosvg-1">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock" class="svg-inline--fa fa-lock fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="black" d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z">
                                    </path>
                                </svg>
                            </div>
                            <div class="advantages__item-title">
                                Easily Buy & Sell
                            </div>
                            <div class="advantages__item-text">
                                Dorem Ipsum is simply dummy text of the pring and typesetting industry. Lorem Ipsum has
                                been the industry's standaum.
                            </div>
                        </div>
                        <div class="advantages__item">
                            <div class="advantages__item-img icosvg-2">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="gift" class="svg-inline--fa fa-gift fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="black" d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z">
                                    </path>
                                </svg>
                            </div>
                            <div class="advantages__item-title">
                                Quality Products
                            </div>
                            <div class="advantages__item-text">
                                Dorem Ipsum is simply dummy text of the pring and typesetting industry. Lorem Ipsum has
                                been the industry's standaum.
                            </div>
                        </div>
                        <div class="advantages__item">
                            <div class="advantages__item-img icosvg-3">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" class="svg-inline--fa fa-heart fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="black" d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z">
                                    </path>
                                </svg>
                            </div>
                            <div class="advantages__item-title">
                                100% Secure Payment
                            </div>
                            <div class="advantages__item-text">
                                Dorem Ipsum is simply dummy text of the pring and typesetting industry. Lorem Ipsum has
                                been the industry's standaum.
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="author" style="  background-image: url(images/author-bg.jpg);">
                <div class="author__box">
                    <div class="author__title">
                        Over <span>20,000</span> Author Are Involved Here!
                    </div>
                    <a href="registration.php" class="author__link">
                        Become A Customer
                    </a>
                </div>
            </section>
            <section class="tutorial">
                <div class="container">
                    <div class="tutorial__title title">
                        Free Monthly Tutorials To Help You With Your Project
                    </div>
                    <div class="tutorial__inner">
                        <div class="tutorial__item">
                            <div class="tutorial__item-img" style="   background-image: url(images/tut.jpg);">

                            </div>
                            <div class="tutorial__item-title">
                                Web Design Tutorials
                            </div>

                        </div>
                        <div class="tutorial__item">
                            <div class="tutorial__item-img" style="   background-image: url(images/tut2.png);">

                            </div>
                            <div class="tutorial__item-title">
                                WordPress Tutorials
                            </div>

                        </div>
                        <div class="tutorial__item">
                            <div class="tutorial__item-img" style="   background-image: url(images/tut3.jpg);">

                            </div>
                            <div class="tutorial__item-title">
                                HTML & CSS Tutorials
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
    <script src="js/main.js"></script>

</body>

</html>