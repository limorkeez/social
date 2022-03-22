<?php
session_start();
require_once("../db_inc.php");


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $postId = $_GET['post'];
    $userId = $_GET['user'];

    try{
        $sql = "INSERT INTO post_likes(user_id, post_id) 
                SELECT $userId, $postId
                FROM posts
                WHERE NOT EXISTS (
                    SELECT id
                    FROM post_likes
                    WHERE user_id = $userId
                    AND post_id = $postId)
                LIMIT 1;
                ";
        $query = $conn->prepare($sql);
        $query->execute();
        header("Location: ../index.php");
        die;
    } catch(PDOException $e){
        echo 'Error in gettting data: '.$e->getMessage();
    }




} else {
    header("Location: ../index.php");
    die;
}


?>
