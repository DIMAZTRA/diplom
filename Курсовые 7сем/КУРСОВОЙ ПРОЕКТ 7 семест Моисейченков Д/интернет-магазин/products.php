<?php
session_start();
include('include/dbconnect.php');
include('include/unsetauth.php');
include('include/auth.php');

$sorting = 'products_id';
if (isset($_GET['sort'])) {
    $sorting = $_GET["sort"];

    switch ($sorting) {
        case 'asc';
            $sorting = 'price ASC';
            break;
        case 'desc';
            $sorting = 'price DESC';
            break;
        case 'alf';
            $sorting = 'title';
            break;
        default:
            $sorting = 'products_id';
            break;
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Products</title>
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
         
                <div class="breadcrumbs">
                    <div class="container">
                        <div class="breadcrumbs__inner">
                            <div class="breadcrumbs__list">
                                <li>
                                    <a href="index.php">Home </a>
                                </li>
                                <li>
                                    <a href="products.php">Products Page</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="product-page">
                    <div class="container">
                        <div class="product-page__inner">
                            <aside class="product-page__aside">
                                <div class="category  aside__item">
                                    <div class="aside__title">Categories</div>

                                    <ul class="category__list">
                                        <li>
                                            <a href="#" class="all"> All</a>
                                        </li>

                                        <?php
                                        $res = mysqli_query($link, "SELECT type FROM table_products GROUP BY type");
                                        $count = mysqli_query($link, "SELECT COUNT(*) as count FROM table_products GROUP BY type");
                                        if (mysqli_num_rows($res) > 0) {
                                            $row = mysqli_fetch_array($res);
                                            $row2 = mysqli_fetch_array($count);


                                            do {

                                                echo '
                        
                                        <li>
                                            <a href="#"  class="' . strtolower($row['type']) . '"> ' . $row['type'] . '</a>
                                            <span>(' . $row2['count'] . ')</span>
                                        </li>
                                    
                                        ';
                                                $row2 = mysqli_fetch_array($count);
                                            } while ($row = mysqli_fetch_array($res));
                                        }

                                        ?>
                                    </ul>
                                </div>
                                <div class="price-range  aside__item">
                                    <div class="aside__title">Price Range</div>
                                    <form method="GET" action="search-filter.php">
                                        <input type="text" class="js-range-slider" name="my_range" value="" />
                                        <a class="rangebtn">Search</a>
                                    </form>
                                </div>
                            </aside>


                            <div class="product-page__content">
                                <div class="product-page__filter">

                                    <div class="product-page__filter-sort">

                                        <a href="products.php?sort=alf" class="icon-sort-amount-desc"></a>
                                        Sort by price

                                        <a href="products.php?sort=desc" class="icon-caret-down"></a>
                                        <a href="products.php?sort=asc" class="icon-caret-down icon-caret-up" style="transform:rotate(180deg);"></a></div>

                                    <div>
                                        <button class=" active icon-th-large"></button>
                                        <button class="icon-th-list"></button>
                                    </div>
                                </div>
                                <div class="product-page__items">

                                    <?php
                                    $num = 3;
                                    $count = mysqli_query($link, "SELECT COUNT(*) FROM table_products ");
                                    $temp = mysqli_fetch_array($count);
                                    $tempcount = $temp[0];
                                    $total = intval((($tempcount - 1) / $num) + 1);
                                    
                                    $result = mysqli_query($link, "SELECT * FROM table_products ORDER BY $sorting");
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_array($result);

                                        $numb=1;
                                        do {
                                            $img_path = '';
                                            if ($row["image"] != "" && file_exists("./upload_images/" . $row["image"])) {
                                                $img_path = $row["image"];
                                            } else {
                                                $img_path = 'no-img.jpg';
                                            }
                                          
                                            echo '
                                        
                                        <div id="1" class="show product__item ' . strtolower($row["type"]) . '">
                                        <a href="view_content.php?id=' .$row["products_id"]. '" class="product__item-img" style="background-image: url(upload_images/' . $img_path . ')">
    
                                        </a>
                                        <div class="product__item-content">
                                            <div class="product__item-name">
                                                <a href="view_content.php?id=' .$row["products_id"]. '" class="product__item-title">
                                                ' . $row["title"] . '
                                                </a>
                                                <a href="view_content.php?id=' .$row["products_id"]. '" class="product__item-category">
                                                ' . $row["type"] . '
                                                </a>
                                                <div class="product__item-text"> ' . $row["mini_description"] . ' </div>
                                            </div>
                                            <div class="product__item-price">
                                            <div class="product__item-price-inner">$' . $row["price"] . '</div>
                                            <span>Sales ( ' . $row["sales"] . ' ) </span>
                                            </div>
                                        </div>
    
                                        <div class="product__item-info">
    
    
                                            <a tid="' .$row["products_id"]. '" href="#" class="product__item-btn">
                                                <span>Buy</span>
                                            </a>
    
                                            <div class="product__item-star">
                                                <div class="ret-star"></div><span>(' . $row["votes"] . ')</span>
    
                                            </div>
                                            <div class="product__item-list">
                                                <a href="#" class="icon-comment-o">(<span>10</span>)</a>
                                                <span class="icon-heart-o">(<span>20</span>)</span>
                                            </div>
                                        </div>
                                    </div>
                                        ';
                                        $numb++;
                                        } while ($row = mysqli_fetch_array($result));
                                    }

                                    ?>





                                </div>
                                <div class="pagination">
                                    <ul class="pagination__list">
                                        <?php
                                        $i = 1;
                                        do {
                                            echo '<li><a class="pagination__list-link hide" href="#">'.$i.'</a></li>';
                                            $i++;
                                            $total--;
                                        } while ($total > 0)


                                            ?>
            
                                    </ul>
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