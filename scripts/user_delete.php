<?php
session_start();
require_once "../db_inc.php";

if(isset($_GET['userid'])){
    $user = $_GET['userid'];
    if($user == $_SESSION['user'] || $_SESSION['user'] == 9){
        $sql = "DELETE FROM users WHERE id=".$user;
        $query = $conn->prepare($sql);
        $query -> execute();
  
        if($user == $_SESSION['user']){
            session_destroy();
        }
        header("Location: ../index.php");
    } else {
        header('Location: ../index.php');
    }

} else{
    header('Location: ../index.php');
    die();
}

?>