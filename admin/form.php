<?php
include("../components/connection.php");
$name = false;
$success = false;
$err = false;
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    $_SESSION['warning'] = "Login , You can't access this page without permission😒🤦‍♂️";
}
if (!isset($_GET['id']) && !isset($_POST['submit'])) {
    header("location:table.php");
}
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id']  = $id;
}
$id = $_SESSION['id'];



if (isset($_POST['submit'])) {
    $bname = $_POST['bname'];
    $mname = $_POST['mname'];
    $aprice = $_POST['aprice'];
    $oprice = $_POST['oprice'];
    $delivery = $_POST['delivery'];




    $photo = $_FILES['photo']['name'];
    $pdf_type = $_FILES['photo']['type'];
    $pdf_size = $_FILES['photo']['size'];
    $pdf_tem_loc = $_FILES['photo']['tmp_name'];
    $pdf_store = "photos/" . $photo;
    move_uploaded_file($pdf_tem_loc, $pdf_store);

    if ($photo) {
        $sql = "UPDATE `productdetails` SET `brandName` = '$bname',`modelName`='$mname',`actualPrice`='$aprice',`ourPrice`='$oprice',`delivery`='$delivery',`photo`='$photo' WHERE `productdetails`.`id` = '$id'";
    } else {
        $sql = "UPDATE `productdetails` SET `brandName` = '$bname',`modelName`='$mname',`actualPrice`='$aprice',`ourPrice`='$oprice',`delivery`='$delivery' WHERE `productdetails`.`id` = '$id'";
    }


    $result = mysqli_query($conn, $sql);
    if ($result) {
        $success = true;
    } else {
        $err = true;
    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo "Welcome $name" ?></title>
    <link rel="icon" href="../images/fav.png" type="image/gif" />
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        html,
        body {
            min-height: 100%;
        }

        body,
        div,
        form,
        input,
        select,
        p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 16px;
            color: #eee;
        }



        h1,
        h2 {
            text-transform: uppercase;
            font-weight: 400;
        }

        h2 {
            margin: 0 0 0 8px;
        }

        #display-image {
            width: 400px;
            /* height: 325px; */
            height: 45rem;
            border: 1px solid black;
            background-position: center;
            background-size: cover;
            z-index: 100;
            margin-left: 20px;
            /* display: none; */
        }

        .main-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 25px;
            background: rgba(0, 0, 0, 0.5);
        }

        .left-part,
        form {
            padding: 25px;
        }

        .left-part {
            text-align: center;
        }

        .fa-graduation-cap {
            font-size: 72px;
        }

        form {
            background: rgba(0, 0, 0, 0.7);
        }

        .title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .info {
            display: flex;
            flex-direction: column;
        }

        input,
        select {
            padding: 5px;
            margin-bottom: 30px;
            background: transparent;
            border: none;
            border-bottom: 1px solid #eee;
        }

        input::placeholder {
            color: #eee;
        }

        option:focus {
            border: none;
        }

        option {
            background: black;
            border: none;
        }

        .checkbox input {
            margin: 0 10px 0 0;
            vertical-align: middle;
        }

        .checkbox a {
            color: #26a9e0;
        }

        .checkbox a:hover {
            color: #85d6de;
        }

        .btn-item,
        .mybtn {
            padding: 10px 5px;
            margin-top: 20px;
            border-radius: 5px;
            border: none;
            background: #26a9e0;
            text-decoration: none;
            font-size: 15px;
            font-weight: 400;
            color: #fff;
        }

        .btn-item {
            display: inline-block;
            margin: 20px 5px 0;
        }

        .mybtn {
            width: 100%;
            transition: 0.3s;
        }

        .mybtn:hover,
        .btn-item:hover {
            background: #85d6de;
            transition: 0.4s;
            color: black;
        }

        @media (min-width: 568px) {

            html,
            body {
                height: 100%;
            }

            .main-block {
                flex-direction: row;
                height: calc(100% - 50px);
            }

            .left-part,
            form {
                flex: 1;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><?php echo " $name" ?></a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="./logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <?php include("./sidebar.php") ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Edit Page</h2>
                        <h5>Welcome<?php echo " $name" ?>, Love to see you back. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <?php

                    if ($success) {
                        echo '<div style="z-index: 101; opacity: 1;" class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Hooray!</strong> Data edited successfully❤❤❤
                 
                </div>';
                    } else if ($err) {
                        echo '<div style="z-index: 101; opacity: 1;" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>OOPS!</strong> Something went wrong🤐😞😖
              
                </div>';
                    }

                    ?>
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <?php
                        $sql =  "SELECT * FROM `productdetails` WHERE `id` = '$id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        if ($result) {
                            echo '<div class="main-block">

                            <form method="POST" action="./form.php"  enctype="multipart/form-data">
                                <div class="title">
                                    <i class="fas fa-pencil-alt"></i>
                                    <h2>Edit here</h2>
                                </div>

                                <div class="info">
                                    <input required value="' . $row['brandName'] . '" class="fname" type="text" name="bname" placeholder="Brand name">
                                    <input required value="' . $row['modelName'] . '"  type="text" name="mname" placeholder="Model name">
                                    <input required value="' . $row['actualPrice'] . '"  type="text" name="aprice" placeholder="Actual price">
                                    <input required value="' . $row['ourPrice'] . '"  type="text" name="oprice" placeholder="Our price">
                                    <label for="chooseImage" style="cursor: pointer;color:ghostwhite;">
                                        CHOOSE IMAGE HERE
                                    </label>
                                    <input    style="display: none;" type="file" id="chooseImage" name="photo">
                                    <select   name="delivery">
                                        <option value="' . $row['delivery'] . '"  selected>' . $row['delivery'] . '</option>
                                        <option value="no">NO</option>
                                        <option value="yes">YES</option>

                                    </select>
                                </div>

                                <button type="submit" class="mybtn" name="submit">Submit</button>
                                </form>
                            <div id="display-image" style="background-image:url(./photos/' . $row['photo'] . ') ;"></div>
                        </div>';
                        } else {
                            header("location:table.php");
                        }

                        ?>

                        <!-- End Form Elements -->
                    </div>
                </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    <script>
        const image_input = document.querySelector("#chooseImage");
        image_input.addEventListener("change", function() {
            const reader = new FileReader();
            reader.addEventListener("load", () => {
                const uploaded_image = reader.result;
                document.querySelector("#display-image").style.display = "flex";
                document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
            });
            reader.readAsDataURL(this.files[0]);

        });


        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>


</body>

</html>