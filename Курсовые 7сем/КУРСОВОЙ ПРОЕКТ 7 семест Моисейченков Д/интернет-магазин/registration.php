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
    <title>Register page</title>
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
                                <a href="#">Registration</a>
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
                                <span class="tab active angle-right" data-id="1">Authorization</span>

                            </div>
                            <div class="tab_content">
                                <div class="tab-item active-tab" id="1">
                                    <div class="page-box">
                                        <div class="page-box__title">REGISTRATION</div>
                                        <div id="reg_message" style="color: #8bc34a; margin:0 auto;"></div>
                                        <div id="authorization__content" class="page-box__content">
                                            <form id="authorization" method="POST" action="reg/handler_reg.php">
                                                <div class="settings__line">
                                                    <label class="settings__line-text">
                                                        Login
                                                    </label>
                                                    <input id="reg_login" name="reg_login" type="text">
                                                </div>

                                                <div class="settings__line">
                                                    <label class="settings__line-text">
                                                        Password
                                                    </label>
                                                    <input id="reg_password" name="reg_password" type="password">
                                                </div>
                                                <div class="settings__line">
                                                    <label class="settings__line-text">
                                                        First Name
                                                    </label>
                                                    <input id="reg_fname" name="reg_fname" type="text">
                                                </div>

                                                <div class="settings__line">
                                                    <label class="settings__line-text">
                                                        Last Name
                                                    </label>
                                                    <input id="reg_lname" name="reg_lname" type="text">
                                                </div>
                                                <div class="settings__line">
                                                    <label class="settings__line-text">
                                                        E-mail
                                                    </label>
                                                    <input id="reg_email" name="reg_email" type="text">
                                                </div>
                                                <div class="settings__line">
                                                    <label class="settings__line-text">
                                                        Country
                                                    </label>
                                                    <select id="reg_country" name="reg_country">
                                                        <option>Select your country</option>
                                                        <option>Belarus</option>
                                                        <option>Russia</option>
                                                        <option>Estonia</option>
                                                    </select>
                                                </div>
                                                <div class="settings__line">
                                                    <button type="submit" name="reg_submit">REGISTER</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
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
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(function() {
            $('#authorization').validate({
                rules: {
                    'reg_login': {
                        required: true,
                        minlength: 5,
                        maxlength: 15
                    },
                    'reg_password': {
                        required: true,
                        minlength: 6,
                        maxlength: 15,
                    },
                    'reg_fname': {
                        required: true,
                        minlength: 2,
                        maxlength: 15
                    },
                    'reg_lname': {
                        required: true,
                        minlength: 6,
                        maxlength: 15,
                    },
                    'reg_email': {
                        required: true,
                        email: true
                    },
                    'reg_country': {
                        required: true,
                    }
                },
                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        success: function(data) {

                            if (data.trim() == 'true') {
                                $('#authorization__content').fadeOut(300, function() {
                                    $('#reg_message').addClass('reg_message-good').fadeIn(400).html("You are successfully registered!")
                                })
                                

                            } else {
                                $('#reg_message').addClass('reg_message-error').fadeIn(400).html(data)

                            }
                        }
                    })

                }
            })

           


        })
    </script>


</body>

</html>