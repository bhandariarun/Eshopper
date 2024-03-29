<?php
include "sqlconnect.php";
session_start();
if (!(isset($_GET['id']))) {
	header("Location: index.php");
}
else {
	$id=$_GET['id'];
	$id = $conn->real_escape_string($id);
}
$resultf=$conn->query("SELECT * FROM Ready_Made_Projects WHERE id=".$id."");
if (mysqli_num_rows($resultf)>0) {
	while($row = $resultf->fetch_assoc()) {
		$img=intval($row['images']);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | Circuit Nepal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">


	<!-- image zoom js library -->
	<link rel="stylesheet" href="css/zoom.css">
	


</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +9779865609055 / 9816641646</a></li>
								<li><a href="https://mail.google.com/"><i class="fa fa-envelope"></i> techadda2023@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
				<div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.php"><img src="images/home/cn.png" style="height:50px" alt="" /> &nbsp;&nbsp;<span style="color: #FE980F;font-family: 'Roboto', sans-serif;font-size: 28px;font-weight: 600;">Circuit Nepal</span></a>
                        </div>

                    </div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.php"><i class="fa fa-user"></i> Login/sign up</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li class="dropdown"><a href="#">Category<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="/?cat=Development Board">Development Boards</a></li>
                                        <li><a href="/?cat=Voltage Regulator">Voltage Regulators</a></li>
                                        <li><a href="/?cat=Sensor">Sensors and Modules</a></li>
                                        <li><a href="/?cat=Motors and Accessories">Motors and Accessories</a></li>
                                        <li><a href="/?cat=Transistors and Mosfets"> Transistors and Mosfets</a></li>
                                        <li><a href="/?cat=Integrated Circuits">Integrated Circuits</a></li>
                                        <li><a href="/?cat=Radio Frequency Modules">Radio Frequency Modules</a></li>
                                        <li><a href="/?cat=Batteries and Accessories">Batteries and Accessories</a></li>
                                        <li><a href="/?cat=Resistors,Diodes and Capacitors">Resistors,Diodes and Capacitors</a></li>
                                        <li><a href="/?cat=Batteries and Accessories">Batteries and Accessories</a></li>
                                        <li><a href="/?cat=Switch">Switch</a></li>
                                        <li><a href="/?cat=Display Modules">Display Modules</a></li>
                                    </ul>
                                </li>
                                <li><a href="readymadeprojects.php">Ready Made Projects</a></li>
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form action="/" method="get">
                                <input name="search" type="text" placeholder="Search" />
                                <button type="submit" class="btn" style="background: #FE980F;border: 0 none;border-radius: 0;background-image: url(../images/home/searchicon.png);background-repeat: no-repeat;background-position: center;height: 35px;width:35px;"></button>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<div class="zoom">
										<img id="changeim" src="images/readymade/<?php echo $id; ?>.jpg" alt="" />
								</div>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										<?php if ($img==1) { ?>
											<a onclick="imgchange('images/readymade/<?php echo $id; ?>.jpg')"><img src="images/readymade/<?php echo $id; ?>.jpg" alt="" style="height:100px;max-width:33%"></a>
										<?php 
										} 
										if ($img==2) {
										?>
											<a onclick="imgchange('images/readymade/<?php echo $id; ?>.jpg')"><img src="images/readymade/<?php echo $id; ?>.jpg" alt="images/readymade/<?php echo $id; ?>.png" style="height:100px;max-width:33%"></a>
											<a onclick="imgchange('images/readymade/<?php echo $id; ?>a.jpg')"><img src="images/readymade/<?php echo $id; ?>a.jpg" alt="images/readymade/<?php echo $id; ?>a.png" style="height:100px;max-width:33%"></a>
										<?php 
										}
										if ($img==3) {
										?>
											<a onclick="imgchange('images/readymade/<?php echo $id; ?>.jpg')"><img src="images/readymade/<?php echo $id; ?>.jpg" alt="images/readymade/<?php echo $id; ?>.png" style="height:100px;max-width:33%"></a>
											<a onclick="imgchange('images/readymade/<?php echo $id; ?>a.jpg')"><img src="images/readymade/<?php echo $id; ?>a.jpg" alt="images/readymade/<?php echo $id; ?>a.png" style="height:100px;max-width:33%"></a>
											<a onclick="imgchange('images/readymade/<?php echo $id; ?>b.jpg')"><img src="images/readymade/<?php echo $id; ?>b.jpg" alt="images/readymade/<?php echo $id; ?>b.png" style="height:100px;max-width:33%"></a>
										<?php } ?>
										</div>
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
							<?php
							$result=$conn->query("SELECT * FROM Ready_Made_Projects WHERE id=".$id."");
							if (mysqli_num_rows($result)>0) {
								while($row = $result->fetch_assoc()) {
									$cat1=$row['category'];
									echo '<h1>'.htmlspecialchars($row['name']).'</h1>';
									echo '<span>';
									echo '<span>Rs.'.htmlspecialchars($row['price']).'</span>';
									if ($row['stock']=='Instock') {
										echo '<label>Quantity:</label>';
										echo '<input type="text" value="1" id="qty"/>';
										//echo '<button type="button" class="btn btn-fefault cart" id="'.htmlspecialchars($row['id']).'" onclick="addto()">';
										//echo '<i class="fa fa-shopping-cart"></i>';
										//echo 'Add to cart';
										//echo '</button>';
									}
									echo '</span>';
                                    echo '<p>If you want this project contact at 9816641646,9865609055</p>';
									if ($row['stock']=='Instock') {
										echo '<p><b>Availability:</b> In Stock</p>';
									}
									else {
										echo '<p><b>Availability:</b> Out Of Stock</p>';
									}
									
								}
							}
							else {
								header("Location: index.php");
							}
							?>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">related items</h2>
						<?php 
						
                            $result=$conn->query("SELECT * FROM Ready_Made_Projects LIMIT 12");
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='col-xs-6 col-sm-3 col-md-3'>";
                                echo "<div class='product-image-wrapper'>";
                                echo "<div class='single-products'>";
                                echo "<div class='productinfo text-center'>";
                                echo "<a href='/readymadeprojects-details.php?id=".$row["id"]."'><img src='images/readymade/".$row["id"].".jpg' alt='' /></a>";
                                echo "<a href='/readymadeprojects-details.php?id=".$row["id"]."'><h2>".$row["price"]."</h2></a>";
                                echo "<a href='/readymadeprojects-details.php?id=".$row["id"]."'><p>".$row["name"]."</p></a>";
                                echo "<button href='#' class='btn btn-default add-to-cart' id='".$row["id"]."' onclick='addto()'><i class='fa fa-shopping-cart'></i>Add to cart</button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
						?>
						
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Give us Feedback</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2023 Tech-Adda Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Tech-Adda</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="js/jquery.zoom.js"></script>
	<script src="js/jquery.bootstrap-growl.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.zoom').zoom({magnify:1.3,});
		});

		function ff() {
			$('.zoom').zoom({magnify:1.3,});
		}

		function imgchange(x) {
			console.log(x);
			document.getElementById('changeim').src = x;
			ff();
		}

		function addto() {
			var id=event.srcElement.id;
			var qty=document.getElementById('qty').value;
			let xhr = new XMLHttpRequest();
			xhr.open("GET", "/add.php?id="+id+"&qty="+qty);
			xhr.onreadystatechange = function () {
			if (xhr.readyState === 4) {
				$(function() {
				$.bootstrapGrowl("Item Added To Cart Successfully !", {
					ele: 'body', // which element to append to
					type: 'info', // (null, 'info', 'error', 'success')
					offset: {from: 'top', amount: 40}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 300, // (integer, or 'auto')
					delay: 2000,
					allow_dismiss: true,
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});
				document.getElementById('qty').value=1;
				});
				// console.log(xhr.responseText);
			}};
			xhr.send();
		}
	</script>
</body>
</html>