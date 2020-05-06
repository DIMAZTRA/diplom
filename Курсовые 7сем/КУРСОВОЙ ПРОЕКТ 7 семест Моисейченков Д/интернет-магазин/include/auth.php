<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../include/dbconnect.php');
    session_start();
    $login = $_POST['login'];
    $pass = md5($_POST['password']);
    $pass = strrev($pass);

    $result = mysqli_query($link, "SELECT * FROM reg_user WHERE login='$login' AND password='$pass'");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $_SESSION['auth_login'] = $row['login'];
        $_SESSION['auth_pass'] = $row['password'];
        $_SESSION['auth_name'] = $row['name'];
        $_SESSION['auth_surname'] = $row['surname'];
        $_SESSION['auth_email'] = $row['email'];
        echo 'yes_auth';
        $_SESSION['auth'] = 'yes_auth';
    }
}
