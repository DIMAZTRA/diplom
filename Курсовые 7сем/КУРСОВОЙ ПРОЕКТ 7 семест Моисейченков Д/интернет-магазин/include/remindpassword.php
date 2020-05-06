<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../include/dbconnect.php');
    include('../functions/functions.php');

    $email = $_POST['email'];

    $result = mysqli_query($link, "SELECT email FROM reg_user WHERE email='$email'");
    if (mysqli_num_rows($result) > 0) {
        $newpass = generate_password();
        $pass = md5($newpass);
        $pass = strrev($pass);
        $update = mysqli_query($link, "UPDATE reg_user SET email='.$email.' WHERE email='.$email.'");
        //send_email('Moderno@gmail.com', $email, 'New PASSWORD for Moderno.com', 'Your new password:' . $newpass);
        echo 'yes';
    } else {
        echo 'no';
    }
}
