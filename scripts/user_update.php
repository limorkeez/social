<?php 
session_start();
require_once "../db_inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['userid'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['emailAddress'];
    
    $sql = "UPDATE users SET first_name='$fname', last_name='$lname', email='$email' WHERE id=$id";

    $query = $conn->prepare($sql);
    $query->execute();

    $_SESSION['userFname'] = $fname;
    $_SESSION['userLname'] = $lname;

    header('Location: ../');
} else {
    header('Location: ../index.php');
    die();
}


?>