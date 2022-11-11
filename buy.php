<?php
session_start();
include("./components/connection.php");
$cookie = getenv('REMOTE_ADDR');
// $email = false;
$success = false;
$err = false;
$name = false;
$idd = false;

if (!isset($_SESSION['userlogin'])) {
    $_SESSION['warningg'] = "Please Login to buy product😥";
    header("location:userLogin.php");
}

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
if (isset($_SESSION['stotal'])) {
    $stotal = $_SESSION['stotal'];
}
if (isset($_GET['idd'])) {
    $_SESSION['idd'] = $_GET['idd'];
}
if (isset($_SESSION['idd'])) {
    $idd = $_SESSION['idd'];
}


if ($idd) {

    $mysql = "SELECT * FROM `user_login` WHERE `email` = '$email' ";
    $myresultt = mysqli_query($conn, $mysql);
    $myrow = mysqli_fetch_assoc($myresultt);
    $user_id = $myrow['id'];
    $mystate = $myrow['state'];
    $mycity = $myrow['city'];
    $mypin = $myrow['pin'];
    $mylandmark = $myrow['landmark'];



    if (isset($_POST['change'])) {
        $state = $_POST['state'];
        $city = $_POST['city'];
        $pin = $_POST['pin'];
        $landmark = $_POST['landmark'];


        $sqllll = "UPDATE `user_login` SET `state` = '$state',`city`='$city',`pin`='$pin',`landmark`='$landmark' WHERE `user_login`.`email` = '$email'";
        $res = mysqli_query($conn, $sqllll);
        if ($res) {
            $success = "Address is updated";
            $mysql = "SELECT * FROM `user_login` WHERE `email` = '$email' ";
            $myresultt = mysqli_query($conn, $mysql);
            $myrow = mysqli_fetch_assoc($myresultt);
        } else {
            $err = "Something went wrong";
        }
    }

    $user_id = $myrow['id'];
    $sql = "SELECT * FROM `productdetails` WHERE `id` = '$idd' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $price = $row['ourPrice'];
    if (isset($_POST['buy'])) {

        $sqllll = "INSERT INTO `order_details` (`id`, `product_id`,`user_id`, `state`, `city`, `pin`, `landmark`, `price`, `qty`, `time`) VALUES (NULL, '$idd','$user_id' ,'$mystate', '$mycity', '$mypin', '$mylandmark', '$price', '1', current_timestamp())";
        $res = mysqli_query($conn, $sqllll);
        if ($res) {
            $success = "Order Placed";
            $_SESSION["order"] = $success;
            $email_to = "$email";
            $subject = "Order Placed";
            $body = "Hi, click here to check your orders
            http://localhost/allPhp/shoesStore/shoes.php";
            $headers = "From : webtechd7@gmail.com";
            if (mail($email_to, $subject, $body, $headers)) {

                header("location:shoes.php");
            } else {
                $err = "Email sending failed.";
            }
        } else {
            $err = "Something went wrong";
        }
    }
} else {




    $sql = "SELECT * FROM `cart` WHERE `cookie` = '$cookie'";
    $resultt = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($resultt);

    if ($num == 0) {
        header("location:collection.php");
    } else {
        $mysql = "SELECT * FROM `user_login` WHERE `email` = '$email' ";
        $myresultt = mysqli_query($conn, $mysql);
        $myrow = mysqli_fetch_assoc($myresultt);
        $user_id = $myrow['id'];
        $mystate = $myrow['state'];
        $mycity = $myrow['city'];
        $mypin = $myrow['pin'];
        $mylandmark = $myrow['landmark'];

        if (isset($_POST['change'])) {
            $state = $_POST['state'];
            $city = $_POST['city'];
            $pin = $_POST['pin'];
            $landmark = $_POST['landmark'];


            $sqllll = "UPDATE `user_login` SET `state` = '$state',`city`='$city',`pin`='$pin',`landmark`='$landmark' WHERE `user_login`.`email` = '$email'";
            $res = mysqli_query($conn, $sqllll);
            if ($res) {
                $success = "Address is updated";
                $mysql = "SELECT * FROM `user_login` WHERE `email` = '$email' ";
                $myresultt = mysqli_query($conn, $mysql);
                $myrow = mysqli_fetch_assoc($myresultt);
            } else {
                $err = "Something went wrong";
            }
        }



        if (isset($_POST['buy'])) {
            while ($rew = mysqli_fetch_assoc($resultt)) {

                $id = $rew['productid'];
                $cartid = $rew['id'];

                $sql = "SELECT * FROM `productdetails` WHERE `id`='$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                $qtyt = $rew['qty'];




                $sqllll = "INSERT INTO `order_details` (`id`, `product_id`,`user_id`, `state`, `city`, `pin`, `landmark`, `price`, `qty`, `time`) VALUES (NULL, '$id','$user_id' ,'$mystate', '$mycity', '$mypin', '$mylandmark', '$stotal', '$qtyt', current_timestamp())";
                $res = mysqli_query($conn, $sqllll);
                if ($res) {
                    $success = "Order Placed";
                    $_SESSION["order"] = $success;
                    $sql = "SELECT * FROM `cart` WHERE `cookie` = '$cookie'";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        $sqssl = "DELETE FROM `cart` WHERE `cookie` = '$cookie'";
                        $result = mysqli_query($conn, $sqssl);
                        $_SESSION['stotal'] = false;
                        setcookie("$cookie", 0, time() + (86400 * 30), "/");
                    }
                    header("location:shoes.php");
                } else {
                    $err = "Something went wrong";
                }
            }
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
    <!-- New Arrivals section start -->
    <div class="collection_text">Buy Now</div>
    <div class="collection_section layout_padding">
        <?php
        if ($success) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>' . $success . '
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
        } else if ($err) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>' . $err . '
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
        }
        ?>
        <div class="container">
            <h1 class="new_text"><strong>Hello <?php echo  $myrow['name'] ?> </strong></h1>
            <p class="consectetur_text">Please check your address and product details</p>
        </div>
    </div>
    <div class="container-fluid ram">


        <div style="display: flex; justify-content: center; align-items: center;" class="row">
            <div class="col-md-10 mb-5">
                <div class="email_box">
                    <div class="input_main">
                        <div class="container">
                            <form method="POST" action="./buy.php">
                                <div class="form-group">
                                    <input type="text" name="state" value="<?php echo $myrow['state'] ?>" required class="email-bt" placeholder="state">
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $myrow['city'] ?>" type="text" name="city" class="email-bt">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="pin" required class="email-bt" value="<?php echo $myrow['pin'] ?>">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="landmark" required class="email-bt" value="<?php echo $myrow['landmark'] ?>">
                                </div>
                                <div class="send_btn">
                                    <button name="change" type="submit" class="main_bt">Change </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="layout_padding gallery_section">
        <div class="collectipn_section_3 layout_padding">
            <div class="container">
                <div class="racing_shoes">
                    <form method="POST" action="./buy.php">
                        <div style="display: flex; align-items: center; flex-direction: column;padding: 15px;" class="row">

                            <?php
                            if ($idd) {

                                $sql = "SELECT * FROM `productdetails` WHERE `id` = '$idd' ";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);

                                echo '

                                <div class="col-md-5">
                                <strong>' . $row['brandName'] . '</strong>
                                <small> ' . $row['modelName'] . '</small>
                                :
                             (<strong>1 Item</strong>)                    
                                </div>
                                <small class="alert">(You can only choose one product or can add to cart multiple products)</small>
                                <hr>
                ';

                                echo '<p>
                Grand Total = ₹
                <strong style="color:red;">
                ' . $row['ourPrice'] . '
                </strong>
                
                </p>';
                            } else {



                                while ($rew = mysqli_fetch_assoc($resultt)) {
                                    $id = $rew['productid'];
                                    $sql = "SELECT * FROM `productdetails` WHERE `id`='$id'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);


                                    echo '

                                <div class="col-md-5">
                                <strong>' . $row['brandName'] . '</strong>
                                <small> ' . $row['modelName'] . '</small>
                                :
                             (<strong>' . $rew['qty'] . ' Items</strong>)                    
                                </div>
                                <hr>
                ';
                                }

                                echo '<p>
                        Grand Total = ₹
                        <strong style="color:red;">
                        ' . $stotal . '
                        </strong>
                        
                        </p>';
                            }

                            ?>
                        </div>
                        <div class="send_btn">
                            <button name="buy" type="submit" class="main_bt">Buy</button>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- New Arrivals section end -->
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
        }, 3000);
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>