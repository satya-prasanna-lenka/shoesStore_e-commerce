<?php
include("./components/connection.php");

$cookie = getenv('REMOTE_ADDR');
$success = false;
$err = false;

$sql = "SELECT * FROM `cart` WHERE `cookie` = '$cookie'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
    $row = mysqli_fetch_assoc($result);
    $dbCookie = $row['cookie'];
} else {
    $dbCookie = 0;
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pin = $_POST['pin'];
    $landmark = $_POST['landmark'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(15));

    $sql = "SELECT * FROM `user_login` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num > 0) {
        $err = "This email already registered😬";
    } else {

        if ($password == $cpassword) {


            $email_to = "$email";
            $subject = "Email activation";
            $body = "Hi,$name  click here to active your acount
            http://localhost/allPhp/shoesStore/activation.php?token=$token";
            $headers = "From : webtechd7@gmail.com";



            if (mail($email_to, $subject, $body, $headers)) {

                $sql  = "INSERT INTO `user_login` (`id`, `name`, `email`, `state`, `city`, `pin`, `landmark`, `mobile`, `usercookie`,`password`,`token`,`status`) VALUES (NULL, '$name', '$email', '$state', '$city', '$pin', '$landmark', '$mobile', '$dbCookie','$pass','$token','inactive')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    session_start();
                    $_SESSION['msgg'] = "Check your email to activate your account at $email_to";
                    header('location:userLogin.php');
                } else {
                    $err = "Something went wrong❌";
                }
            } else {
                $err = "Email sending failed please check your network connection🗼or choose a valid email";
            }
        } else {
            $err = "Passwords do not matches😂";
        }
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
    <div class="collection_text">Sign up</div>
    <div class="layout_padding contact_section">
        <?php
        if ($success) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You registered successifully😍
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
        } else if ($err) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $err . '
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
        }
        ?>


        <div class="container">
            <h1 class="new_text"><strong>Signup Now</strong></h1>
        </div>
        <div class="container-fluid ram">

            <div class="row">
                <div class="col-md-6">
                    <div class="email_box">
                        <div class="input_main">
                            <div class="container">
                                <form method="POST" action="./userSignup.php">
                                    <div class="form-group">
                                        <input type="text" name="name" required class="email-bt" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="mobile" class="email-bt" placeholder="Phone Numbar">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" required class="email-bt" placeholder="Email">
                                    </div>
                                    <strong>Address:</strong>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input type="text" name="state" required class="email-bt" placeholder="State">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="city" required class="email-bt" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input type="text" name="pin" maxlength="6" required class="email-bt" placeholder="Pin">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="landmark" required class="email-bt" placeholder="Landmark">
                                        </div>
                                    </div>
                                    <strong>Choose Your Password:</strong>
                                    <div class="form-group">
                                        <input minlength="5" type="password" name="password" required class="email-bt" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="cpassword" required class="email-bt" placeholder="Confirm Password">
                                    </div>


                                    <div class="send_btn">
                                        <button name="submit" type="submit" class="main_bt">Sign Up</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shop_banner">
                        <div class="our_shop">
                            <p style="color: #db5660; font-weight: bolder;" class="text-center">Already signed up? <a href="userLogin.php">Click here</a></p>
                            <a href="userLogin.php"><button class="out_shop_bt">Login </button></a>
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
        }, 6000);
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>