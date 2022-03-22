<?php
session_start();
require_once("../db_inc.php");

//susirenkam login info is formos
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
}
try{
    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetch();
} catch(PDOException $e){
    echo 'Error in gettting data: '.$e->getMessage();
}

if($result){
    $dbPasswordHash = $result['password'];
    if(password_verify($password, $dbPasswordHash)){
        $_SESSION['user'] = $result['id'];
        $_SESSION['userFname'] = $result['first_name'];
        $_SESSION['userLname'] = $result['last_name'];
        header("Location: ../index.php");
        die;
    } else{
        echo "Password is incorrect";
    }
} else{
    echo "Email does not exist";
}

?>