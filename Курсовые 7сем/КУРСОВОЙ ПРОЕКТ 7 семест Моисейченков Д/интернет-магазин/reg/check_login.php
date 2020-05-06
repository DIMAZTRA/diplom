<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include('../include/dbconnect.php');
    include('../functions/functions.php');
    $login=$_POST['reg_login'];
    echo $login;
    $result=mysqli_query($link,"SELECT login FROM reg_user WHERE login='$login'");
    echo '<script>console.log('.$login.')</script>';
    if(mysqli_num_rows($result)>0){
        echo 'false';
       
    }else{
        echo 'true';
        echo $result;
    }
}
?>
