<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $_SESSION['auth']='no-auth';
    echo 'logout';
}
?>