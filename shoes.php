<?php
include("./components/connection.php");
$success = false;
$err = false;
session_start();
if (isset($_SESSION['order'])) {
	$success = $_SESSION['order'];
	$_SESSION["order"] = false;
}
if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM `user_login` WHERE `email` = '$email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$user_id = $row['id'];

	$sqll = "SELECT * FROM `order_details` WHERE `user_id` = '$user_id'";
	$resultt = mysqli_query($conn, $sqll);
	$num = mysqli_num_rows($resultt);
	if ($num == 0) {
		$err = "No orders Yet😞😖💔";
	}
} else {
	header("location:index.php");
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
	<title>Product Details</title>
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
	<div class="collection_text">Order details</div>
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
			<h1 class="new_text"><strong>Hello <?php echo $row['name'] ?></strong></h1>
			<p class="consectetur_text"></p>
		</div>
	</div>
	<div class="layout_padding gallery_section">
		<div class="container">
			<div class="row">
				<?php
				while ($roww = mysqli_fetch_assoc($resultt)) {
					$product_id = $roww['product_id'];
					$sqlll = "SELECT * FROM `productdetails` WHERE `id` = '$product_id'";
					$resulttt = mysqli_query($conn, $sqlll);

					while ($myrow = mysqli_fetch_assoc($resulttt)) {
						echo '<div class="col-sm-4">
					<div class="best_shoes">
						<p class="best_text">' . $myrow['brandName'] . ' </p>
						<div class="shoes_icon"><img src="./admin/photos/' . $myrow['photo'] . '"></div>
						<div style="display: flex; justify-content: center; align-items: center;" class="star_text">
							<div class="left_part">
								<ul>
									<p>' . $myrow['modelName'] . ' x ' . $roww['qty'] . '</p>
								</ul>
							</div>
							<div class="right_part">
								<div style="display: flex; flex-direction: column;" class="shoes_price">
								<span style="color: #ff4e5b;font-size:1rem;	">
								₹' . $myrow['ourPrice']  . '</span>
								<span style="color: #ff4e5b;font-size:1.3rem;">
								 x' . $roww['qty'] . ': ₹' . $myrow['ourPrice'] * $roww['qty'] . '</span>
								</div>
							</div>
						</div>
					</div>
				</div>';
					}
				}
				?>


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
		}, 10000);
	</script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>