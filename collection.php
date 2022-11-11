<?php
include("./components/connection.php");
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
	<title>Collection</title>
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
	<!-- new collection section start -->
	<div class="collection_text">Collection</div>
	<div class="layout_padding collection_section">
		<div class="layout_padding gallery_section">
			<div class="container">
				<div class="row">
					<?php
					$sql = "SELECT * FROM `productdetails` ORDER BY `id` ";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($result)) {
						if ($row['delivery'] == "yes") {
							echo '<a href="racing boots.php?id=' . $row['id'] . '" class="col-sm-4">
						<div class="best_shoes">
							<p style="text-transform: uppercase;" class="best_text">' . $row['brandName'] . ' </p>
							<div class="shoes_icon"><img src="./admin/photos/' . $row['photo'] . '"></div>
							<div style="display: flex; align-items: center;" class="star_text">
								<div class="left_part">
									<ul>
									<p>' . $row['modelName'] . '</p>
								</div>
								<div class="right_part">
								<div class=" d-flex ">
								<div style="font-size: 1rem; text-decoration: line-through;" class="shoes_price">$ <span style="color: #ff4e5b;">' . $row['actualPrice'] . '</span></div>
								<div style="font-size: 1rem;" class="shoes_price">$ <span style="color: #10f869;">' . $row['ourPrice'] . '</span></div>
								</div>
								</div>
							</div>
							<b class="ml-4">Free Delivery</b>
						</div>
					</a>';
						} else {


							echo '<a href="racing boots.php?id=' . $row['id'] . '" class="col-sm-4">
					<div class="best_shoes">
						<p style="text-transform: uppercase;" class="best_text">' . $row['brandName'] . ' </p>
						<div class="shoes_icon"><img src="./admin/photos/' . $row['photo'] . '"></div>
						<div style="display: flex; align-items: center;" class="star_text">
							<div class="left_part">
								<ul>
								<p>' . $row['modelName'] . '</p>
							</div>
							<div class="right_part">
							<div class=" d-flex ">
							<div style="font-size: 1rem; text-decoration: line-through;" class="shoes_price">$ <span style="color: #ff4e5b;">' . $row['actualPrice'] . '</span></div>
							<div style="font-size: 1rem;" class="shoes_price">$ <span style="color: #10f869;">' . $row['ourPrice'] . '</span></div>
							</div>
							</div>
						</div>
						
					</div>
				</a>';
						}
					}
					?>

				</div>

				<!-- <div class="buy_now_bt">
				<button class="buy_text">Buy Now</button>
			</div> -->
			</div>
		</div>
		<!-- <div class="container">
			<h1 class="new_text"><strong>New Collection</strong></h1>
			<p class="consectetur_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
			<div class="collection_section_2">
				<div class="row">
					<div class="col-md-6">
						<div class="about-img">
							<button class="new_bt">New</button>
							<div class="shoes-img"><img src="images/shoes-img1.png"></div>
							<p class="sport_text">Men Sports</p>
							<div class="dolar_text">$<strong style="color: #f12a47;">90</strong> </div>
							<div class="star_icon">
								<ul>
									<li><a href="#"><img src="images/star-icon.png"></a></li>
									<li><a href="#"><img src="images/star-icon.png"></a></li>
									<li><a href="#"><img src="images/star-icon.png"></a></li>
									<li><a href="#"><img src="images/star-icon.png"></a></li>
									<li><a href="#"><img src="images/star-icon.png"></a></li>
								</ul>
							</div>
						</div>
						<button class="seemore_bt">See More</button>
					</div>
					<div class="col-md-6">
						<div class="about-img2">
							<div class="shoes-img2"><img src="images/shoes-img2.png"></div>
							<p class="sport_text">Men Sports</p>
							<div class="dolar_text">$<strong style="color: #f12a47;">90</strong> </div>
							<div class="star_icon">
								<ul>
									<li><a href="#"><img src="images/star-icon.png"></a></li>
									<li><a href="#"><img src="images/star-icon.png"></a></li>
									<li><a href="#"><img src="images/star-icon.png"></a></li>
									<li><a href="#"><img src="images/star-icon.png"></a></li>
									<li><a href="#"><img src="images/star-icon.png"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
	<!-- new collection section end -->
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