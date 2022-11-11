<?php
session_start();
include("./components/connection.php");
$nothing = false;
$buynow = false;

$cookie = getenv('REMOTE_ADDR');
$Date = date("d-m-Y");

if (isset($_SESSION['userlogin'])) {
    $buynow = true;
}
if (isset($_SESSION['idd'])) {
    $_SESSION['idd'] = false;
}

$sql = "SELECT * FROM `cart` WHERE `cookie` = '$cookie' ORDER BY `id` desc";
$resultt = mysqli_query($conn, $sql);
$num = mysqli_num_rows($resultt);
if ($num == 0) {
    $myqty = 0;
    // setcookie("$cookie", "$myqty", time() + (86400 * 30), "/");
    if (!isset($_COOKIE[$cookie])) {
        setcookie("$cookie", "$myqty", time() + (86400 * 30), "/");
        header("location:index.php");
        die();
    } else {
        setcookie("$cookie", "$myqty", time() + (86400 * 30), "/");
    }
    $nothing = true;
}
$mqty = 0;
$gtotal = 0;
$myqty = 0;

while ($rew = mysqli_fetch_assoc($resultt)) {
    $id = $rew['productid'];
    $sql = "SELECT * FROM `productdetails` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $tqty = (int) $rew['qty'];

    $mqty += $tqty;

    $myqty += $tqty;
}
if (!isset($_COOKIE[$cookie])) {
    setcookie("$cookie", "$myqty", time() + (86400 * 30), "/");
    header("location:index.php");
    die();
} else {
    setcookie("$cookie", "$myqty", time() + (86400 * 30), "/");
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
    <title>CART</title>
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
    <!-- CSS only -->

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
    <!-- new collection section start -->
    <div style="display: flex; justify-content: center; align-items: center;" class=" collection_text">
        <?php
        if ($nothing) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>OOOPS!</strong>Seams like you have nothing in the cart😔😟
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
        }
        ?>
        <div class=" d-flex">


            <p style="font-size: 2rem; ">CART</p>

        </div>
    </div>
    <div class="about_main layout_padding">
        <div class="collection_section">
            <div class="container">
                <h1 class="new_text"><strong>Delivery by</strong></h1>
                <p class="consectetur_text">
                    <?php echo date("l jS \of F Y ", strtotime($Date . ' + 5 days')) ?>
                </p>
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM `cart` WHERE `cookie` = '$cookie' ORDER BY `id` desc";
        $resultt = mysqli_query($conn, $sql);
        $mqty = 0;
        $gtotal = 0;
        $myqty = 0;

        while ($rew = mysqli_fetch_assoc($resultt)) {
            $id = $rew['productid'];
            $sql = "SELECT * FROM `productdetails` WHERE `id`='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $delivery = 0;
            $tqty = (int) $rew['qty'];
            $tprice = (int) $row['ourPrice'];
            $ttotal = $tprice * $tqty;
            // echo $ttotal;
            $stotal = $ttotal;
            if ($row['delivery'] == "no") {
                $delivery = 20;
                $stotal = $ttotal + 20;
            }
            $mqty += $tqty;
            $gtotal += $stotal;
            $myqty += $tqty;
            $_SESSION['stotal'] = $stotal;



            echo '
                <div  class="collectipn_section_3 layout_padding">
                    <div class="container">
                        <div class="racing_shoes">
                            <div style="display: flex; align-items: center;" class="row">

                     <div class="col-md-7">
                        <div class="shoes-img3"><img src="./admin/photos/' . $row['photo'] . ' "></div>
                    </div>
                    <div class="col-md-5">
                        <div class="sale_text"><strong>' . $row['brandName'] . ' <br><span style="color: #0a0506; font-size: 2rem;"> ' . $row['modelName'] . ' </span>
                                <div style="display: flex;align-items: center;">
                                    <p style="font-size:1.5rem ;">Quantity</p>: ' . $rew['qty'] . '
                                    
                                </div>
                                <span style="font-size: 1.5rem; text-transform: capitalize;">

                                    <br>Free Delivery :  ' . $row['delivery'] . '
                                </span>
                            </strong></div>
                        <div style="font-size: 1.5rem;  line-height: 3.6rem;" class="number_text"><strong>Actual price₹ <span style="color: #0a05069a;text-decoration: line-through;"> ' . $row['actualPrice'] . ' </span></strong></div>
                        <div style="font-size: 1.3rem; line-height: 3.6rem;" class="number_text">Price (1 item) <strong>₹ <span style="color: #0a0506"> ' . $row['ourPrice'] . ' </span></strong></div>
                        <div style="font-size: 1.5rem; line-height: 3.6rem;" class="number_text"> Price(' . $rew['qty'] . ' item/s)  <strong>₹ <span style="color: #0a0506"> ' . $ttotal . ' + ' . $delivery . '<small>(Delivery)</small> </span></strong></div>
                        <div style="font-size: 1.5rem; line-height: 3.6rem;" class="number_text"> Total :  <strong>₹ <span style="color: #0a0506"> ' . $stotal . ' </span></strong></div>
                        <div class="d-flex container">
                        <a  class="btn btn-danger" href="removeCart.php?id=' . $rew['id'] . '">
                        <button style="background-color: transparent;" >Remove Item</button>
                        </a>
              
                        </div>
                        </div>
                    </div>
                
                    </div>
                    </div>
                    </div>
                    ';
        }
        ?>
    </div>

    <div style="position: fixed; bottom: -70%;left: 8%; right: 8%; z-index: 2;" class="container ">
        <div style="background-color: #db5660;height: 5vh; display: flex; align-items: center;justify-content: center;" class="racing_shoes">
            <div style="display: flex; align-items: center;justify-content: center;" class="row">
                <div style="display: flex; align-items: center; justify-content: center;" class="col-md-12">
                    <strong>Grand Total</strong>
                    <p style="color: ghostwhite;">Price(<?php echo $mqty ?> Items) :<span>₹<?php echo $gtotal ?></span></p>
                </div>

                <a class="btn" style=display:<?php if ($buynow) {
                                                    echo "flex";
                                                } else {
                                                    echo "none";
                                                } ?> ; href="<?php if ($mqty == 0) {
                                                                    echo "collection.php";
                                                                } else {
                                                                    echo "buy.php";
                                                                } ?>">

                    <div class="btn btn-info"><?php if ($mqty == 0) {
                                                    echo "Choose Product";
                                                } else {
                                                    echo "Buy Now";
                                                } ?></div>
                </a>

                <a style=display:<?php if (!$buynow) {
                                        echo "flex";
                                    } else {
                                        echo "none";
                                    } ?> href="userLogin.php?warning='cart'">

                    <div class="btn btn-info">Buy Now</div>
                </a>
            </div>
        </div>
    </div>

    <!-- new collection section end -->
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