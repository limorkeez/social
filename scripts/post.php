<?php
session_start();
require_once("../db_inc.php");


if(!empty($_POST['postText'])){
    $current_user = $_SESSION['user'];
    $text = $_POST['postText'];


    try{
        $sql = "INSERT INTO posts(user_id, text) VALUES ($current_user,'$text')";
        $query = $conn->prepare($sql);
        $query->execute();
        header("Location: ../index.php");
        die;
    } catch(PDOException $e){
        echo 'Error in inserting data: '.$e->getMessage();
    }
} else {
    header("Location: ../index.php");
    die;
}


?>