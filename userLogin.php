<?php
include("./components/connection.php");
$myMsg = false;
$tocart = false;
session_start();

if (isset($_GET['warning'])) {
    $myMsg = "Please Login";
    // $tocart = true;
    $_SESSION['cartto'] = true;
}
if (isset($_SESSION['cartto'])) {

    $tocart = $_SESSION['cartto'];
}

if (isset($_SESSION['msgg'])) {
    $myMsg = $_SESSION['msgg'];
} else if (isset($_SESSION['warningg'])) {
    $myMsg = $_SESSION['warningg'];
}
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM `user_login` WHERE `email` = '$email' AND `status` = 'active'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['userlogin'] = true;
            $_SESSION['warningg'] = false;
            setcookie("login", "$email", time() + (86400 * 30), "/");
            if ($tocart) {

                header("location:buy.php");
            } else {
                header("location:index.php");
            }
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
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Shoes</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fav.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">


    <?php
    require("./components/headers.php")
    ?>
    <!-- contact section start -->
    <div class="collection_text">Login</div>
    <div class="layout_padding contact_section">

        <?php

        if ($myMsg) {
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
<strong>Please!</strong> ' . $myMsg . '
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }

        ?>
        <div class="container">
            <h1 class="new_text"><strong>Login Now</strong></h1>
        </div>
        <div class="container-fluid ram">

            <div class="row">
                <div class="col-md-6">
                    <div class="email_box">
                        <div class="input_main">
                            <div class="container">
                                <form method="POST" action="./userLogin.php">

                                    <div class="form-group">
                                        <input type="email" name="email" required class="email-bt" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" required class="email-bt" placeholder="Password">
                                    </div>


                                    <div class="send_btn">
                                        <button name="submit" type="submit" class="main_bt">Send</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shop_banner">
                        <div class="our_shop">
                            <p style="color: #db5660; font-weight: bolder;" class="text-center">Not signed up yet? <a href="userSignup.php">Click here</a></p>
                            <a href="userSignup.php"> <button class="out_shop_bt">Sign Up</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- contact section end -->
    <!-- section footer start -->
    <?php include("./components/footer.php") ?>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });


            $('#myCarousel').carousel({
                interval: false
            });

            //scroll slides on swipe for touch enabled devices

            $("#myCarousel").on("touchstart", function(event) {

                var yClick = event.originalEvent.touches[0].pageY;
                $(this).one("touchmove", function(event) {

                    var yMove = event.originalEvent.touches[0].pageY;
                    if (Math.floor(yClick - yMove) > 1) {
                        $(".carousel").carousel('next');
                    } else if (Math.floor(yClick - yMove) < -1) {
                        $(".carousel").carousel('prev');
                    }
                });
                $(".carousel").on("touchend", function() {
                    $(this).off("touchmove");
                });
            });
        })

        ////
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 8000);
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>