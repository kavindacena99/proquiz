<?php
    require_once 'connection/connection.php';
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header('Location: login.php');
    }

    $marks = $_POST['marks'];

    $sql = "UPDATE users SET marks=marks+$marks WHERE userid={$_SESSION['user_id']}";
    $result = mysqli_query($connection,$sql);

?>
