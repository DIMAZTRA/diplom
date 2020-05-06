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
    <title>Contact US</title>
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
                                <a href="contact.php">Contact US</a>
                            </li>

                        </div>
                    </div>
                </div>
            </div>
            <section class="contact">
                <div class="container">
                    <div class="contact__wrapper">
                        <div class="contact__head">
                            Contact With Us
                        </div>
                        <div class="contact__inner">
                            <div class="contact__map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28747.6342735825!2d-73.96740330031157!3d40.76812060884211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258d3dabc4587%3A0x84a9b7411256ea93!2sBest%20Western%20Plus%20Plaza%20Hotel!5e0!3m2!1sru!2sby!4v1569935744995!5m2!1sru!2sby"
                                    frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                            <div class="contact__box">
                                <div class="contact__info">
                                    <div class="contact__info-item">
                                        <div class="contact__info-title icon-map-marker ">
                                            Our Office Address
                                        </div>
                                        <div class="contact__info-content">PO Box 16122 Collins Street West Victoria 8007 Australia</div>
                                    </div>
                                    <div class="contact__info-item">
                                        <div class="contact__info-title icon-phone">
                                            Phone
                                        </div>
                                        <a href="tel:61383766284" class="contact__info-content">+61 3 8376 6284</a>
                                    </div>
                                    <div class="contact__info-item">
                                        <div class="contact__info-title icon-envelope-o">
                                            E-mail
                                        </div>
                                        <div class="contact__info-content">info@foxtar.com</div>
                                    </div>
                                </div>
                                <div class="contact__form">
                                    <div class="contact__form-title">Drop Us A Message</div>
                                    <form>
                                        <div class="contact__form-row">
                                            <input placeholder="Name*" type="text" required>
                                            <input placeholder="Email*" type="text" required>
                                        </div>
                                        <textarea placeholder="Message*"></textarea>
                                        <button type="submit">Send Message</button>
                                    </form>
                                </div>
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