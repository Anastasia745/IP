<?php
    unset($_COOKIE['user_id']);
    unset($_COOKIE['username']);
    setcookie('user_id', '', time()-10000);
    setcookie('username', '', time()-10000);
    $home_url = 'http://8180979.ru/IP_Lab4/IPLab4.php';
    header('Location:'.$home_url);
?>