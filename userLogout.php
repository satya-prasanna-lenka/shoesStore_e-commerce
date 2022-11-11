<?php
session_start();

// if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
//     header(location: login.php);
//     exit;
// }else
$email = $_SESSION['email'];
unset($_SESSION['userlogin']);
session_unset();
session_destroy();
header("location: index.php");
setcookie("login", "$email", time() - (86400 * 30), "/");
exit;
