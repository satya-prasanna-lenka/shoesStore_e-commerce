<?php
session_start();
include("./components/connection.php");
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "UPDATE `user_login` SET `status` = 'active' WHERE `token`='$token'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (isset($_SESSION['msgg'])) {
            $_SESSION['msgg'] = "Account updated successfully you can now login";
            header('location:userLogin.php');
        } else {
            $_SESSION['msgg'] = "You are logged out";
            header('location:userLogin.php');
        }
    } else {
        $_SESSION['msgg'] = "Account not updated";
        header('location:userSignup.php');
    }
}
