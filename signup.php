<?php

session_start();

include "config.php";

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (fullname, email, password)
VALUES ('$fullname', '$email', '$hashedPassword')";

if (mysqli_query($conn, $sql)) {

    $_SESSION['fullname'] = $fullname;
    $_SESSION['email'] = $email;

    header("Location: index.php");
    exit();

} else {

    echo "Error: " . mysqli_error($conn);

}

?>