<?php
include("./components/connection.php");
$success = false;
$err = false;
session_start();
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

if (isset($_COOKIE["login"])) {
	$loginn =   $_COOKIE["login"];
	$_SESSION['email'] = $loginn;
	$_SESSION['userlogin'] = true;
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
	<title>Pull shoes</title>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!-- body -->

<body class="main-layout">
	<!-- header section start -->
	<?php
	require("./components/headers.php")
	?>
	<div class="header_section">
		<?php
		if ($success) {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> We will reach you as soon as possible😍
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
		} else if ($err) {
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Something went wrong
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
		}
		?>
		<!-- <div class="container">
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
		</div> -->
		<div class="banner_section">
			<div class="container-fluid">
				<section class="slide-wrapper">
					<div class="container-fluid">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
								<li data-target="#myCarousel" data-slide-to="3"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<div class="row">
										<div class="col-sm-2 padding_0">
											<p class="mens_taital">Men Shoes</p>
											<div class="page_no">1/4</div>
											<p class="mens_taital_2">Men Shoes</p>
										</div>
										<div class="col-sm-5">
											<div class="banner_taital">
												<h1 class="banner_text">New Running Shoes </h1>
												<h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
												<p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit,
													sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
												</p>
												<a href="collection.php">
													<button class="buy_bt">Buy Now</button>
												</a>
												<a href="collection.php">
													<button class="more_bt">See More</button>
												</a>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="shoes_img"><img src="images/running-shoes.png"></div>
										</div>
									</div>
								</div>
								<div class="carousel-item">
									<div class="row">
										<div class="col-sm-2 padding_0">
											<p class="mens_taital">Men Shoes</p>
											<div class="page_no">2/4</div>
											<p class="mens_taital_2">Men Shoes</p>
										</div>
										<div class="col-sm-5">
											<div class="banner_taital">
												<h1 class="banner_text">New Running Shoes </h1>
												<h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
												<p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit,
													sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
												</p>
												<a href="collection.php">
													<button class="buy_bt">Buy Now</button>
												</a>
												<a href="collection.php">
													<button class="more_bt">See More</button>
												</a>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="shoes_img"><img src="images/shoes-img1.png"></div>
										</div>
									</div>
								</div>
								<div class="carousel-item">
									<div class="row">
										<div class="col-sm-2 padding_0">
											<p class="mens_taital">Men Shoes</p>
											<div class="page_no">3/4</div>
											<p class="mens_taital_2">Men Shoes</p>
										</div>
										<div class="col-sm-5">
											<div class="banner_taital">
												<h1 class="banner_text">New Running Shoes </h1>
												<h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
												<p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit,
													sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
												</p>
												<a href="collection.php">
													<button class="buy_bt">Buy Now</button>
												</a>
												<a href="collection.php">
													<button class="more_bt">See More</button>
												</a>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="shoes_img"><img src="images/shoes-img2.png"></div>
										</div>
									</div>
								</div>
								<div class="carousel-item">
									<div class="row">
										<div class="col-sm-2 padding_0">
											<p class="mens_taital">Men Shoes</p>
											<div class="page_no">4/4</div>
											<p class="mens_taital_2">Men Shoes</p>
										</div>
										<div class="col-sm-5">
											<div class="banner_taital">
												<h1 class="banner_text">New Running Shoes </h1>
												<h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
												<p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit,
													sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
												</p>
												<a href="collection.php">
													<button class="buy_bt">Buy Now</button>
												</a>
												<a href="collection.php">
													<button class="more_bt">See More</button>
												</a>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="shoes_img"><img src="images/shoes-img3.png"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- header section end -->
	<!-- new collection section start -->
	<div class="layout_padding collection_section">
		<div class="container">
			<h1 class="new_text"><strong>New Collection</strong></h1>
			<p class="consectetur_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
			<div class="collection_section_2">
				<div class="row">
					<?php
					$sql = "SELECT * FROM `productdetails` ORDER BY `id` asc ";
					$result = mysqli_query($conn, $sql);
					// $row = mysqli_fetch_assoc($result);
					$slno = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$slno += 1;
						if ($slno == 1) {

							echo '
							
							<div class="col-md-6">
							<div class="about-img">
							<a href="./collection.php">
							<button class="new_bt">New</button>
							</a>
								<div class="shoes-img"><img src="./admin/photos/' . $row['photo'] . '"></div>
								<p class="sport_text">' . $row['brandName'] . '</p>
								<div style="width: 250px;" class="container d-flex">
								<div class="dolar_text">$<strong style="color: #f12a47; text-decoration: line-through;">' . $row['actualPrice'] . '</strong> </div>
								<div class="dolar_text">$<strong style="color: #10f869;">' . $row['ourPrice'] . '</strong> </div>
								</div>
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
							<a href="collection.php">
							<button class="seemore_bt">See More</button>
							</a>
						</div>';
						} else if ($slno == 2) {
							echo '	<div class="col-md-6">
							<div class="about-img2">
								<div class="shoes-img2"><img src="./admin/photos/' . $row['photo'] . '"></div>
								<p class="sport_text">' . $row['brandName'] . '</p>
								<div style="width: 250px;" class="container d-flex">
								<div class="dolar_text">$<strong style="color: #f12a47; text-decoration: line-through;">' . $row['actualPrice'] . '</strong> </div>
								<div class="dolar_text">$<strong style="color: #10f869;">' . $row['ourPrice'] . '</strong> </div>
								</div>
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
						</div>';
						}
					}

					?>

					<!-- <div class="col-md-6">
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
					</div> -->
					<!-- <div class="col-md-6">
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
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<div class="collection_section">
		<div class="container">
			<h1 class="new_text"><strong>Racing Boots</strong></h1>
			<p class="consectetur_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
		</div>
	</div>
	<div class="collectipn_section_3 layuot_padding">
		<div class="container">
			<div class="racing_shoes">
				<div class="row">
					<div class="col-md-8">
						<div class="shoes-img3"><img src="images/shoes-img3.png"></div>
					</div>
					<div class="col-md-4">
						<div class="sale_text"><strong>Sale <br><span style="color: #0a0506;">JOGING</span>
								<br>SHOES</strong></div>
						<div class="number_text"><strong>$ <span style="color: #0a0506">100</span></strong></div>
						<a href="collection.php">

							<button class="seemore">See More</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="collection_section layout_padding">
		<div class="container">
			<h1 class="new_text"><strong>New Arrivals Products</strong></h1>
			<p class="consectetur_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
		</div>
	</div>
	<!-- new collection section end -->
	<!-- New Arrivals section start -->
	<div class="layout_padding gallery_section">
		<div class="container">
			<div class="row">
				<?php
				$sql = "SELECT * FROM `productdetails` ORDER BY `id` DESC LIMIT 6 ";
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
					if ($row['delivery'] == "yes") {
						echo '
						<a class="col-sm-4" href="racing boots.php?id=' . $row['id'] . '">
						<div >
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
					</div></a>';
					} else {


						echo '
						<a class="col-sm-4"  href="racing boots.php?id=' . $row['id'] . '">
						<div>
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
				</div></a>';
					}
				}
				?>

			</div>

			<div class="buy_now_bt">
				<a href="collection.php">

					<button class="buy_text">Buy Now</button>
				</a>
			</div>
		</div>
	</div>
	<!-- New Arrivals section end -->
	<!-- contact section start -->
	<div class="layout_padding contact_section">
		<div class="container">
			<h1 class="new_text"><strong>Contact Now</strong></h1>
		</div>
		<div class="container-fluid ram">
			<div class="row">
				<div class="col-md-6">
					<div class="email_box">
						<div class="input_main">
							<div class="container">
								<form method="POST" action="./index.php">
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
			})
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

<!-- https://cpanel.epizy.com/panel/index.php -->

</html>