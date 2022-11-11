<?php
$name = false;
include("../components/connection.php");
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    $_SESSION['warning'] = "Login , You can't access this page without permission😒🤦‍♂️";
}
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo "Welcome $name" ?></title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="icon" href="../images/fav.png" type="image/gif" />
    <!-- MORRIS CHART STYLES-->

    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
font-size: 16px;"> <a href="./logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <?php include("./sidebar.php") ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Product Details</h2>
                        <h5>Welcome <?php echo " $name" ?>, Love to see you back. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />


                <!-- /. ROW  -->

                <!-- /. ROW  -->

                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!--    Hover Rows  -->
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Product Details
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sl No:</th>
                                                <th>Brand Name</th>
                                                <th>Model Name</th>
                                                <th>Delivery Type</th>
                                                <th>Actual Price</th>
                                                <th>Our Price</th>
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $sql = "SELECT * FROM `productdetails` ";
                                            $result = mysqli_query($conn, $sql);
                                            $slno = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $slno += 1;
                                                echo ' <tr>
                                                <td>' . $slno . '</td>
                                                <td>' . $row['brandName'] . '</td>
                                                <td>' . $row['modelName'] . '</td>
                                                <td style="text-transform: uppercase;">' . $row['delivery'] . '</td>
                                                <td>' . $row['actualPrice'] . '</td>
                                                <td>' . $row['ourPrice'] . '</td>
                                                <td>See Image on edit page👉</td>
                                                <td><a href="form.php?id=' . $row['id'] . '" ><button class="btn btn-success">Edit</button></a></td>
                                                <td><a href="deleteProduct.php?id=' . $row['id'] . '" ><button class="btn btn-danger">Delete</button></a></td>
                                                
                                               
                                                
                                            </tr>';
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End  Hover Rows  -->
                    </div>

                </div>
                <!-- /. ROW  -->
                <div class="row ">
                    <div class="col-md-12 ">
                        <div class="panel panel-info">
                            <div class="panel-heading ">
                                Ordera
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">slno</th>
                                                <th scope="col">Product name</th>
                                                <th scope="col">Model</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Total price</th>
                                                <th scope="col">state</th>
                                                <th scope="col">City</th>
                                                <th scope="col">Pin</th>
                                                <th scope="col">Landmark</th>
                                                <th scope="col">User name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `order_details`";
                                            $result = mysqli_query($conn, $sql);
                                            $slno = 0;

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $pid = $row['product_id'];
                                                $sql = "SELECT * FROM `productdetails` WHERE `id` = '$pid'";
                                                $resultt = mysqli_query($conn, $sql);
                                                $rew = mysqli_fetch_assoc($resultt);



                                                $uid = $row['user_id'];
                                                $sqll = "SELECT * FROM `user_login` WHERE `id` = '$uid'";
                                                $resulttt = mysqli_query($conn, $sqll);
                                                $rpw = mysqli_fetch_assoc($resulttt);

                                                $slno += 1;

                                                echo '
                                                <tr>
                                                <th scope="row">' . $slno . '</th>
                                                <td>' . $rew['brandName'] . '</td>
                                                <td>' . $rew['modelName'] . '</td>
                                                <td>' . $row['qty'] . '</td>
                                                <td>' . $rew['ourPrice'] * $row['qty'] . '</td>
                                                <td>' . $row['state'] . '</td>
                                                <td>' . $row['city'] . '</td>
                                                <td>' . $row['pin'] . '</td>
                                                <td>' . $row['landmark'] . '</td>   
                                                <td>' . $rpw['name'] . '</td>
                                                <td>' . $rpw['mobile'] . '</td>
                                                <td>' . $rpw['email'] . '</td>
                                                <td>' . $row['time'] . '</td>
                                                <td><a href="orderDelete.php?id=' . $row['id'] . '" ><button class="btn btn-danger">Delete</button></a></td>
                                            </tr>
                                                ';
                                            }

                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Messages
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Slno</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">Msg</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `contact`";
                                            $result = mysqli_query($conn, $sql);
                                            $slno = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $slno += 1;
                                                echo '
                                                <tr>
                                                <th scope="row">' . $slno . '</th>
                                                <td>' . $row['email'] . '</td>
                                                <td>' . $row['mobile'] . '</td>
                                                <td>' . $row['msg'] . '</td>
                                                <td><a href="msgDelete.php?id=' . $row['id'] . '" ><button class="btn btn-danger">Delete</button></a></td>
                                            </tr>
                                            </tr>
                                                ';
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>