<?php
session_start();
include('include/dbconnect.php');
include('include/unsetauth.php');
include('include/auth.php');
$search=$_GET["q"];

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
        
            <div class="breadcrumbs">
                <div class="container">
                    <div class="breadcrumbs__inner">
                        <div class="breadcrumbs__list">
                            <li>
                                <a href="index.php">Home </a>
                            </li>
                            <li>
                                <a href="products.php">All Products</a>
                            </li>
                            <li>
                                <a href="#">Products - <?php echo $search;?></a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <section class="products">
                <div class="product__wrapper">

                    <div class="container-fluid">
                        <div class="products__title title">
                            Let’s Check Out Our Release Prodcuts
                        </div>
                        <div class="products__inner">
                        
                            <div class="products__inner-box">
                                <?php
                                $result = mysqli_query($link, "SELECT * FROM table_products WHERE title LIKE '%$search%' OR type LIKE '%$search%'");
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
                                        
                                        <div class="product__item mix category-' . $new . ' category-' . $leader . ' category-' . strtolower($row["type"]) . '">
                                    
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
                                            <a tid=' .$row["products_id"]. ' id=' .$row["products_id"]. ' href="#" class="product__item-btn">
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

                                if(mysqli_num_rows($result) ==0){
                                    echo '
                                    <div style="flex-direction: column; margin:0 auto;" class="product__item-info">
                                    <p class="title" style="margin:0 auto;color:#e74c3c;">SORRy! No such items found</p>
                                   
                                    <a style="width:100px; display:block;" href="index.php" class="product__item-btn">
                                        <span>HOME PAGE</span>
                                    </a>
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
    <script src="js/main.js"></script>

</body>

</html>