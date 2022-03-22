<?php require_once "../db_inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];
    $text = $_POST['text'];
    
    $sql = "UPDATE posts SET text='$text' WHERE id=$id";

    $query = $conn->prepare($sql);
    $query->execute();

    header('Location: ../');
}


?>