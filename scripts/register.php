<?php

require_once("../db_inc.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];

} else{
    header("Location: ../");
    die;
}

if($password == $confirmPass){
    $password = password_hash($password, PASSWORD_BCRYPT);
}else{
    header("Location: ../");
    die;
}

try{
    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$password'); ";
    $query = $conn->prepare($sql);
    $query->execute();
    header("Location: ../");
} catch(PDOException $e){
    echo "Insert Failed: ".$e -> getMessage();
}

?>