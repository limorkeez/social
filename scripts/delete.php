<?php

require_once "../db_inc.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $entry = $_POST['id'];


    $sql = "DELETE FROM posts WHERE id=".$entry;
    $query = $conn->prepare($sql);
    $query -> execute();

    header("Location: ../index.php");

}

?>