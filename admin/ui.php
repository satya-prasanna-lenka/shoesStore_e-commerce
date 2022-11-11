<?php
include("../components/connection.php");
$success = false;
$err = false;
$name = false;
session_start();
if (!isset($_SESSION['login'])) {
  header("location:login.php");
  $_SESSION['warning'] = "Login , You can't access this page without permission😒🤦‍♂️";
}
if (isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
}

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


  $sql = "INSERT INTO `productdetails` (`id`, `brandName`, `modelName`, `actualPrice`, `ourPrice`, `delivery`,`photo`, `date`) VALUES (NULL, '$bname', '$mname', '$aprice', '$oprice', '$delivery','$photo', current_timestamp())";

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
  <title><?php echo $name ?></title>
  <!-- CSS only -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link rel="icon" href="../images/fav.png" type="image/gif" />
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

    /* body {
      background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;

      background-size: cover;
    } */

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
      display: none;
      margin-left: 20px;
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
          <span class="fa fa-bar"></span>
          <span class="fa fa-bar"></span>
          <span class="fa fa-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php"> <?php echo $name ?> </a>

      </div>
      <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="./logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
    </nav>
    <!-- /. NAV TOP  -->
    <?php include("./sidebar.php") ?>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12">
            <h2>Product Upload</h2>
            <h5>Welcome <?php echo $name ?> , Love to see you back. </h5>

          </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
          <?php

          if ($success) {
            echo '<div style="z-index: 101; opacity: 1;" class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Hooray!</strong> Data added successfully✔✔✔
                 
                </div>';
          } else if ($err) {
            echo '<div style="z-index: 101; opacity: 1;" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>OOPS!</strong> Something went wrong😢
              
                </div>';
          }

          ?>
          <!-- <div style="z-index: 201; opacity: 1;" class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Please!</strong> Something went wrong😢
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
          </div> -->
          <div class="col-md-12">
            <div class="main-block">

              <form action="./ui.php" method="POST" enctype="multipart/form-data">
                <div class="title">
                  <i class="fas fa-pencil-alt"></i>
                  <h2>Upload here</h2>
                </div>

                <div class="info">
                  <input required class="fname" type="text" name="bname" placeholder="Brand name">
                  <input required type="text" name="mname" placeholder="Model name">
                  <input required type="text" name="aprice" placeholder="Actual price">
                  <input required type="text" name="oprice" placeholder="Our price">
                  <label for="chooseImage" style="cursor: pointer;color:ghostwhite;">
                    CHOOSE IMAGE HERE
                  </label>
                  <input required style="display: none;" type="file" id="chooseImage" name="photo">
                  <select name="delivery">
                    <option value="yes" selected>Fress delivery*</option>
                    <option value="no">NO</option>
                    <option value="yes">YES</option>

                  </select>
                </div>

                <button type="submit" class="mybtn" name="submit">Submit</button>
              </form>
              <div id="display-image"></div>
            </div>
          </div>
          <!-- <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                Button Dropdowns
              </div>

              <div class="panel-body">
                <h4>Simple Button Dropdown Examples </h4>
                <div style="margin-top: 10px;">

                  <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <div style="margin:5px;" class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Danger <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <div style="margin:5px;" class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Danger <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                </div>
                <div>

                  <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Success <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-info dropdown-toggle">Info <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">Default <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                </div>

                <h4>Split Button Dropdown Examples </h4>

                <div style="margin:5px;" class="btn-toolbar">

                  <div class="btn-group">
                    <button class="btn btn-primary">Action</button>
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <div class="btn-group">
                    <button class="btn btn-danger">Danger</button>
                    <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <div class="btn-group">
                    <button class="btn btn-warning">Warning</button>
                    <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                </div>
                <div style="margin:5px;" class="btn-toolbar">

                  <div class="btn-group">
                    <button class="btn btn-success">Success</button>
                    <button data-toggle="dropdown" class="btn btn-success dropdown-toggle"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <div class="btn-group">
                    <button class="btn btn-info">Info</button>
                    <button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                </div>
                <div style="margin:5px;" class="btn-toolbar">
                  <div class="btn-group">
                    <button class="btn btn-default">Default</button>
                    <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                </div>


                <h4>Buttons With Icons</h4>

                <button class="btn btn-default"><i class=" fa fa-refresh "></i> Update</button>
                <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>




              </div>
            </div>
          </div> -->
        </div>
        <!-- /. ROW  -->
        <!-- <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Circle Icon Buttons
              </div>

              <div class="panel-body">
                <br /> <br />
                <button type="button" class="btn btn-default btn-circle"><i class="fa fa-check"></i>
                </button>
                <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i>
                </button>
                <button type="button" class="btn btn-success btn-circle"><i class="fa fa-link"></i>
                </button>
                <button type="button" class="btn btn-info btn-circle"><i class="fa fa-check"></i>
                </button>
                <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-money"></i>
                </button>
                <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-heart"></i>
                </button>
                <br />
                <p>
                  For more customization for this template or its components please visit official bootstrap website i.e getbootstrap.com or <a href="http://getbootstrap.com/components/" target="_blank">click here</a> . We hope you will enjoy our template. This template is easy to use, light weight and made with love by binarycart.com
                </p>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Icons Examples :
              </div>

              <div class="panel-body">
                <br />
                <i class="fa fa-desktop "></i>

                <i class="fa fa-desktop fa-2x"></i>
                <i class="fa fa-desktop fa-3x"></i>
                <i class="fa fa-desktop fa-4x"></i>
                <i class="fa fa-desktop fa-5x"></i>
                <br />
                <br />
                <i class="fa fa-flask "></i>

                <i class="fa fa-flask fa-2x"></i>
                <i class="fa fa-flask fa-3x"></i>
                <i class="fa fa-flask fa-4x"></i>
                <i class="fa fa-flask fa-5x"></i>
                <br />
                <p>
                  For more customization Of icons please visit website : fortawesome.github.io/Font-Awesome/icons/ or <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Click here</a> . You will get all font-awesome icons and there classes there.
                </p>
              </div>

            </div>
          </div>
        </div> -->
        <!-- /. ROW  -->
        <!-- <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Simple Progress Bars
              </div>

              <div class="panel-body">
                <div class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                    <span class="sr-only">20% Complete</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    <span class="sr-only">60% Complete (warning)</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Stripped Progress Bars
              </div>

              <div class="panel-body">
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                    <span class="sr-only">20% Complete</span>
                  </div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    <span class="sr-only">60% Complete (warning)</span>
                  </div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- /. ROW  -->
        <!-- <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Animated Progress Bars
              </div>

              <div class="panel-body">
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                Stacked Progress Bars
              </div>

              <div class="panel-body">
                <div class="progress">
                  <div class="progress-bar progress-bar-success" style="width: 35%">
                    <span class="sr-only">35% Complete (success)</span>
                  </div>
                  <div class="progress-bar progress-bar-warning" style="width: 20%">
                    <span class="sr-only">20% Complete (warning)</span>
                  </div>
                  <div class="progress-bar progress-bar-danger" style="width: 10%">
                    <span class="sr-only">10% Complete (danger)</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- /. ROW  -->
        <!-- <div class="row">
          <div class="col-md-6">

            <!--  Modals-->
        <!-- <div class="panel panel-default">
          <div class="panel-heading">
            Modals Example
          </div>
          <div class="panel-body">
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
              Click Launch Demo Modal
            </button>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                  </div>
                  <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- End Modals-->

      </div>
      <!-- <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            Alerts Examples
          </div>
          <div class="panel-body">
            <h5><strong>Simple Alert</strong></h5>
            <div class="alert alert-info">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
            </div>
            Info: You can use other classes like <i>alert-success</i> , <i>alert-warning</i> & <i>alert-danger</i> instead of <i>alert-info</i>
            <br />
            <h5><strong>Dismissable Alert</strong></h5>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
            </div>
            Info: You can use other classes like <i>alert-success</i> , <i>alert-warning</i> & <i>alert-danger</i> instead of <i>alert-info</i>

          </div>
        </div>
      </div> -->
    </div> -->
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
      setTimeout(() => {
        document.querySelector("#display-image").style.display = "none";
      }, 10000);
    });


    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000);
  </script>

</body>

</html>