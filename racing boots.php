<?php
session_start();
include("./components/connection.php");
if (!isset($_GET['id'])) {
	header("location:index.php");
}
// echo getenv('REMOTE_ADDR');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$_SESSION['pid'] = $id;

	$sql = "SELECT * FROM `productdetails` WHERE `id` = '$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
}
$id = $_SESSION['pid'];
if (isset($_POST['cart'])) {
	$pid = $id;
	$qty = $_POST['qty'];
	$cookie = getenv('REMOTE_ADDR');

	$sql = "SELECT * FROM `cart` WHERE `productid`='$pid' AND `cookie`= '$cookie'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if ($num > 0) {
		$sql = "UPDATE `cart` SET `qty`='$qty' WHERE `cart`.`productid` = '$pid'";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("location:cart.php");
		}
	} else {


		$sql = "INSERT INTO `cart` (`id`, `productid`, `cookie`, `qty`) VALUES (NULL, '$pid', '$cookie', '$qty')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("location:cart.php");
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
	<title><?php echo $row['brandName']; ?></title>
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
	<!-- new collection section start -->
	<div style="display: flex; justify-content: center; align-items: center;" class=" collection_text">
		<div class=" d-flex">

			<p style="font-size: 3rem; text-decoration: line-through;">$<?php echo $row['actualPrice'] ?></p>
			<p style="font-size: 2rem; ">$<?php echo $row['ourPrice'] ?></p>

		</div>
	</div>
	<div class="about_main layout_padding">
		<div class="collection_section">
			<div class="container">
				<h1 class="new_text"><strong><?php echo $row['brandName'] ?></strong></h1>
				<p class="consectetur_text"><?php echo $row['modelName'] ?></p>
			</div>
		</div>
		<div class="collectipn_section_3 layout_padding">
			<div class="container">
				<div class="racing_shoes">
					<div style="display: flex; align-items: center;" class="row">
						<div class="col-md-8">
							<div class="shoes-img3"><img src="./admin/photos/<?php echo $row['photo'] ?>"></div>
						</div>
						<form action="./racing boots.php" method="POST" class="col-md-4">
							<div class="sale_text"><strong><?php echo $row['brandName'] ?> <br><span style="color: #0a0506; font-size: 2rem;"><?php echo $row['modelName'] ?></span>
									<div style="display: flex;">
										<p>Quantity</p>
										<select style="height: 30px;" name="qty" class="form-select form-select-sm" aria-label=".form-select-sm example">
											<option style="font-size: 2px;" value="1" selected>1</option>
											<option style="font-size: 0.5rem;" value="2">2</option>
											<option style="font-size: 0.5rem;" value="3">3</option>
											<option style="font-size: 0.5rem;" value="4">4</option>
											<option style="font-size: 0.5rem;" value="5">5</option>
											<option style="font-size: 0.5rem;" value="6">6</option>
										</select>
									</div>
									<span style="font-size: 1.5rem; text-transform: capitalize;">

										<br>Free Delivery :<?php echo $row['delivery'] ?>
									</span>
								</strong></div>
							<div class="number_text"><strong>$ <span style="color: #0a0506"><?php echo $row['ourPrice'] ?></span></strong></div>
							<div class="d-flex container">
								<a class="seemore mr-4 d-flex" style="justify-content: center; align-items: center;" href="buy.php?idd=<?php echo $row['id'] ?>">
									Buy Now
								</a>
								<button name="cart" type="submit" style="background-color: #1ea1ec;" class="seemore">Add to Cart</button>
							</div>
							</from>
					</div>
				</div>
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
	</script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>