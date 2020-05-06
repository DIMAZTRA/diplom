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
    <title>About</title>
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
                                <a href="about.php">About</a>
                            </li>

                        </div>
                    </div>
                </div>
            </div>
            <div class="about">
                <div class="container">
                    <div class="about__wrapper">
                        <div class="about__head">
                            To Know Who We Are
                        </div>
                        <div class="about__inner">
                            <div class="about__box">
                                <h3>What We Do</h3>
                                <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centurbut a vfrrdyrtfglso survived but also the leap into electronic typesetting, remaining essentially
                                    unchanged. It was popularised in the 1960s with the releas survived not raseth leap into electronic typesetting, remaining essentially unchanged. when an unknown printer took a galley of type and scrambled it to make
                                    a type specimen book. It has survived not only five centurbut a vfrrdyrtfglso survived but also the leap into electronic typesetting, remaining essentially unchanged. It was po pularised in the 1960s with the releas
                                    survived not rasethleap into electronic typesetting, remaining essentially unchanged. </p>
                            </div>
                            <div class="about__box">
                                <h3>Our Mission</h3>
                                <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centurbut a vfrrdyrtfglso survived but also the leap into electronic typesetting, remaining essentially
                                    unchanged. It was popularised in the 1960s with the releas survived not raseth leap into electronic typesetting, remaining essentially unchanged. when an unknown printer took a galley of type and scrambled it to make
                                    a type specimen book. It has survived not only five centurbut a vfrrdyrtfglso survived but also the leap into electronic typesetting, remaining essentially unchanged. It was po pularised in the 1960s with the releas
                                    survived not rasethleap into electronic typesetting, remaining essentially unchanged. </p>
                            </div>
                        </div>
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
    <script src="js/main.js"></script>


</body>

</html>