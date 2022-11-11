<?php
include("../components/connection.php");
$success = false;
$err = false;

if (isset($_POST['button'])) {
    $user = $_POST["user"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST["cpassword"];

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(15));


    $sql = "SELECT * FROM `admin_login` WHERE `email`= '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);


    if ($num > 0) {
        $err = "This email is already registered";
    } else {
        if ($password === $cpassword) {
            $email_to = "satyale39@gmail.com";
            $subject = "Email activation";
            $body = "Hi, click here to active your acount
          http://localhost/all/shoesStore/admin/activation.php?token=$token";
            $headers = "From : webtechd7@gmail.com";


            if (mail($email_to, $subject, $body, $headers)) {
                $sql = "INSERT INTO `admin_login` (`id`, `user`, `email`, `password`, `token`, `status`) VALUES (NULL, '$user', '$email', '$pass', '$token', 'inactive')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    session_start();
                    $_SESSION['msg'] = "Check your email to activate your account at $email_to";
                    header('location:login.php');
                } else {
                    $err = "Something went wrong.";
                }
            } else {
                $err = "Email sending failed.";
            }
        } else {
            $err = "Password do not matches";
        }
    }
}

// $sql = "INSERT INTO `admin_login` (`id`, `user`, `email`, `password`, `token`, `status`) VALUES (NULL, '$user', '$email', '$pass', '$token', 'active')";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="icon" href="images/fav.png" type="image/gif" />
    <title>Signup</title>
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
            background-image: url(https://images.unsplash.com/photo-1520453803296-c39eabe2dab4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fHNpZ24lMjB1cHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60);
            background-size: cover;
            -webkit-filter: blur(10px);
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

        .login input[type=text] {
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
            margin-top: 10px;
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

        .login input[type=text]:focus {
            outline: none;
            border: 1px solid rgba(255, 255, 255, 0.9);
        }

        .login input[type=email]:focus {
            outline: none;
            border: 1px solid rgba(255, 255, 255, 0.9);
        }

        .login input[type=password]:focus {
            outline: none;
            border: 1px solid rgba(255, 255, 255, 0.9);
        }

        .login input[type=button]:focus {
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
    if ($success) {
        echo '<div style="z-index: 100;" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Signup successful😍
            <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
    } else if ($err) {
        echo '<div style="z-index: 100;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>' . $err . '
    <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
    </div>';
    }
    ?>
    <div class="header">

        <p>A conformation msg will be send <br> to a particucal eamil account</p>
        <div>signup<span>Admin</span></div>
    </div>
    <br>
    <form method="post" action="./signup.php" class="login">
        <input required type="text" placeholder="username" name="user"><br>
        <input required type="email" placeholder="email" name="email"><br>
        <input required type="password" placeholder="password" name="password"><br>
        <input type="password" placeholder="confirm password" name="cpassword"><br>
        <p>Back to login page
            <a href="login.php">Click here</a>
        </p>

        <input type="submit" name="button" value="Signup">
        <div class="container">

        </div>
    </form>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>