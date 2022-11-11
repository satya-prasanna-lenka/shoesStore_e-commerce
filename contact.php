<?php
include("./components/connection.php");
$success = false;
$err = false;

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $msg = $_POST["msg"];

    $sql = "INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `msg`) VALUES (NULL, '$name', '$email', '$mobile', '$msg')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $success = true;
    } else {
        $err = true;
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

    <!-- header section start -->
    <!-- <div class="header_section header_main">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo"><a href="#"><img src="images/logo.png"></a></div>
                </div>
                <div class="col-sm-9">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link" href="index.php">Home</a>
                                <a class="nav-item nav-link" href="collection.php">Collection</a>
                                <a class="nav-item nav-link" href="shoes.php">Shoes</a>
                                <a class="nav-item nav-link" href="racing boots.php">Racing Boots</a>
                                <a class="nav-item nav-link" href="contact.php">Contact</a>
                                <a class="nav-item nav-link last" href="#"><img src="images/search_icon.png"></a>
                                <a class="nav-item nav-link last" href="contact.php"><img src="images/shop_icon.png"></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
    <?php
    require("./components/headers.php")
    ?>
    <!-- contact section start -->
    <div class="collection_text">Contact Us</div>
    <div class="layout_padding contact_section">
        <?php
        if ($success) {
            echo '<div class=" alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> We will reach you as soon as possible😍
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
        } else if ($err) {
            echo '<div  class=" alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Something went wrong
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
        }
        ?>

        <div class="container">
            <h1 class="new_text"><strong>Contact Now</strong></h1>
        </div>
        <div class="container-fluid ram">

            <div class="row">
                <div class="col-md-6">
                    <div class="email_box">
                        <div class="input_main">
                            <div class="container">
                                <form method="POST" action="./contact.php">
                                    <div class="form-group">
                                        <input type="text" name="name" required class="email-bt" placeholder="Name" name="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="mobile" class="email-bt" placeholder="Phone Numbar" name="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" required class="email-bt" placeholder="Email" name="Email">
                                    </div>

                                    <div class="form-group">
                                        <textarea name="msg" class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
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
                            <button class="out_shop_bt">Our Shop</button>
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
        }, 3000);
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>