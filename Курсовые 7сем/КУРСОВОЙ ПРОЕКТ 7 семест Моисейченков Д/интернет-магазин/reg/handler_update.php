<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../include/dbconnect.php');
    session_start();
    $login = $_POST['login'];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $update = mysqli_query($link, "UPDATE reg_user SET name='$login',surname=3,email=4 WHERE id=11");
    $error = array();
    $pass = md5($_POST["prevpassword"]);
    $pass = strrev($pass);

    if ($_SESSION['auth_pass'] != $pass) {
        $error[] = "Incorrect previous password";
    } else {
        $newpass = md5($_POST["up_password"]);
        $newpass = strrev($newpass);
        $newpassquery = "pass='$newpass'";
    }

    $dataquery = "'$newpassquery',name='$fname',surname='$lname',email='$email',country='$country'";
   
    if ($newpass) {
        $_SESSION['auth_pass'] = $newpass;
    }

    $_SESSION['auth_name'] = $_POST["up_fname"];
    $_SESSION['auth_surname'] = $_POST["up_lname"];
    $_SESSION['auth_email'] = $_POST["up_email"];
    echo 'yes_auth';
    $_SESSION['auth'] = 'yes_auth';
}
