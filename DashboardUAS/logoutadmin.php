<?php
     session_start();
     session_unset();
     session_destroy();
     setcookie('email', '', 0, '/');
     setcookie('password', '', 0, '/');
     header('location:loginadmin.php');
?>
