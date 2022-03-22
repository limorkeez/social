<?php
require_once("../db_inc.php");


if(isset($_GET['post']) && isset($_GET['user'])){

    $postId = $_GET['post'];
    $userId = $_GET['user'];

    $sql = "SELECT * FROM post_likes WHERE user_id='$userId' AND post_id='$postId'";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query -> fetch();

    if(empty($result)){
        try{
            $sql1 = "INSERT INTO post_likes(user_id, post_id) VALUES ('$userId', '$postId')";
            $query1 = $conn->prepare($sql1);
            $query1->execute();
            header("Location: ../index.php");
            die();
        } catch(PDOException $e){
            echo 'Error in gettting data: '.$e->getMessage();
        }
    }
    else{
        $likeid = $result['id'];
        $sql1 = "DELETE FROM post_likes WHERE id='$likeid'";
        $query1 = $conn->prepare($sql1);
        $query1->execute();
        header("Location: ../index.php");
        die();
    }
} else {
    header("Location: ../index.php");
    die();
}


?>
