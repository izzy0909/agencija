<?php
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}else{
    header('Location: admin.php');
}
?>