<?php
include("../components/connection.php");
$myMsg = false;
session_start();
if (isset($_SESSION['msg'])) {
    $myMsg = $_SESSION['msg'];
} else if (isset($_SESSION['warning'])) {
    $myMsg = $_SESSION['warning'];
}
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin_login` WHERE `email` = '$email' AND `status` = 'active'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['name'] = $row['user'];
            $_SESSION['login'] = true;
            $_SESSION['warning'] = false;
            header("location:table.php");
        } else {
            $myMsg = "Enter the correct password";
        }
    } else {
        $myMsg = "Activate your account or signup this email";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <link rel="icon" href="images/fav.png" type="image/gif" />
    <title>Login</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

        body {
            margin: 0;
            padding: 0;
            background: #fff;

            color: #fff;
            font-family: Arial;
            font-size: 12px;
            overflow: hidden;
        }

        .body {
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-image: url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);
            background-size: cover;
            -webkit-filter: blur(5px);
            z-index: 0;

        }

        .grad {
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(100%, rgba(0, 0, 0, 0.65)));
            /* Chrome,Safari4+ */
            z-index: 1;
            opacity: 0.7;
        }

        .header {
            position: absolute;
            top: calc(50% - 35px);
            left: calc(50% - 255px);
            z-index: 2;
        }

        .header div {
            float: left;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 35px;
            font-weight: 200;
        }

        .header div span {
            color: #5379fa !important;
        }

        .login {
            position: absolute;
            top: calc(50% - 75px);
            left: calc(50% - 50px);
            height: 150px;
            width: 350px;
            padding: 10px;
            z-index: 2;
        }

        .alert {
            position: absolute;
            top: calc(30% - 75px);
            left: calc(50% - 50px);
            /* height: 150px; */
            width: 350px;
            /* padding: 10px; */
            z-index: 2;
        }

        .login input[type=email] {
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
        }

        .login input[type=password] {
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
            margin-top: 10px;
        }

        .login input[type=submit] {
            width: 260px;
            height: 35px;
            background: #fff;
            border: 1px solid #fff;
            cursor: pointer;
            border-radius: 2px;
            color: #a18d6c;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 6px;
            margin-top: 10px;
        }

        .login input[type=submit]:hover {
            opacity: 0.8;
        }

        .login input[type=submit]:active {
            opacity: 0.6;
        }

        .login input[type=email]:focus {
            outline: none;
            border: 1px solid rgba(255, 255, 255, 0.9);
        }

        .login input[type=password]:focus {
            outline: none;
            border: 1px solid rgba(255, 255, 255, 0.9);
        }

        .login input[type=submit]:focus {
            outline: none;
        }

        ::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        ::-moz-input-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
    </style>
</head>

<body>
    <div class="body"></div>
    <div class="grad"></div>
    <?php

    if ($myMsg) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Please!</strong> ' . $myMsg . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

    ?>
    <div class="header">
        <div>Login<span>Admin</span></div>
    </div>
    <br>
    <form method="POST" action="./login.php" class="login">
        <input type="email" placeholder="email" name="email"><br>
        <input type="password" placeholder="password" name="password"><br>
        <small>Back to home page?

            <a href="../index.php">Click here</a>
        </small>
        <p>If you are not regestered?

            <a href="signup.php">Click here</a>
        </p>
        <input type="submit" name="submit" value="Login">

    </form>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>



    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
</body>

</html>