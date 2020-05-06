<?php
session_start();

include('../include/dbconnect.php');
include('../functions/functions.php');
$error = array();
$login = $_POST["reg_login"];

$pass = $_POST['reg_password'];
$fname = $_POST['reg_fname'];
$lname = $_POST['reg_lname'];
$email = $_POST['reg_email'];
$country = $_POST['reg_country'];

if (strlen($login) < 5 or strlen($login) > 15) {
    $error[] = 'LOGIN: 5-15 symbols!'.$login.'';
} else {
    $result = mysqli_query($link, "SELECT login FROM reg_user WHERE login='$login'");
    if (mysqli_num_rows($result) > 0) {
        $error[] = 'Login already exists';
    }
}

if(count($error)){
    echo implode('<br/>',$error);
}else{
    $pass=md5($pass);
    $pass=strrev($pass);
    $ip=$_SERVER['SERVER_ADDR'];
    mysqli_query($link,"INSERT INTO reg_user(login,password,name,surname,email,country,ip) VALUES('".$login."','".$pass."','".$fname."','".$lname."','".$email."','".$country."','".$ip."')");echo 'true';
}
session_reset();
?>
