<?php
session_start();
include("../components/connection.php");
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "UPDATE `admin_login` SET `status` = 'active' WHERE `token`='$token'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (isset($_SESSION['msg'])) {
            $_SESSION['msg'] = "Account updated successfully you can now login";
            header('location:login.php');
        } else {
            $_SESSION['msg'] = "You are logged out";
            header('location:login.php');
        }
    } else {
        $_SESSION['msg'] = "Account not updated";
        header('location:signup.php');
    }
}
