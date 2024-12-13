<?php
    $hostname = "127.0.0.1";
    $username = "root";
    $password = "mariadb";
    $dbname = "proquiz";
    

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proquiz";

    $connection = mysqli_connect($hostname,$username,$password,$dbname);
?>