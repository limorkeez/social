<?php
session_start();
require_once("../db_inc.php");


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $current_user = $_SESSION['user'];
    $text = $_POST['postText'];


    try{
        $sql = "INSERT INTO posts(user_id, text) VALUES ($current_user,'$text')";
        $query = $conn->prepare($sql);
        $query->execute();
        header("Location: ../index.php");
        die();
    } catch(PDOException $e){
        echo 'Error in inserting data: '.$e->getMessage();
    }
} else {
    header("Location: ../index.php");
    die();
}


?>