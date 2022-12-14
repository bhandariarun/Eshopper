<?php
include "sqlconnect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
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
</head><!--/head-->

<body>
<header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +9779865609055</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> techadda58@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.php"><img src="images/home/logo.png" alt="" /></a>
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <?php
                                if (!isset($_SESSION["login"])) {
                                    echo '<li><a href="login.php"><i class="fa fa-user"></i> Login/Sign up</a></li>';
                                }
                                else {
                                    echo '<li class="dropdown1"><a href="#"><i class="fa fa-user"> '.$_SESSION['first_name'].' '.$_SESSION['last_name'].'</i></a>';
                                    echo '<div class="dropdown1-content">';
                                    echo '<a href="#">Account</a>';
                                    echo '<a href="#">Change Password</a>';
                                    echo '<a href="/logout.php">Logout</a>';
                                    echo '</div>';
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
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
                                <li><a href="index.html" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Products</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					if (isset($_SESSION['login']))
					{
						$result=$conn->query("SELECT * FROM Cart WHERE u_id='".$_SESSION['u_id']."'");
						if (mysqli_num_rows($result)>0) {
							while($row = $result->fetch_assoc()) {
								$result2=$conn->query("SELECT * FROM Products WHERE id=".$row['p_id']."");
								while($row2=$result2->fetch_assoc()) {
									echo '<tr>';
									echo '<td class="cart_product">';
									echo '<a href=""><img src="images/'.$row2['id'].'.jpg" style="height:100px; width:100px" alt=""></a>';
									echo '</td>';
									echo '<td class="cart_description">';
									echo '<h4><a href="">'.$row2['name'].'</a></h4>';
									echo '</td>';
									echo '<td class="cart_price">';
									echo '<p>'.$row2['price'].'</p>';
									echo '</td>';
									echo '<td class="cart_quantity">';
									echo '<div class="cart_quantity_button">';
									echo '<a class="cart_quantity_up" href=""> - </a>';
									echo '<input class="cart_quantity_input" type="text" name="quantity" value="'.$row['qty'].'" autocomplete="off" size="2">';
									echo '<a class="cart_quantity_down" href=""> + </a>';
									echo '</div>';
									echo '</td>';
									echo '<td class="cart_total">';
									echo '<p class="cart_total_price">'.($row2['price']*$row['qty']).'</p>';
									echo '</td>';
									echo '<td class="cart_delete">';
									echo '<a class="cart_quantity_delete" onclick=""><i class="fa fa-times"></i></a>';
									echo '</td>';
									echo '</tr>';
								}
							}
							
						}
						else {
							
						}
						
					}
					?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

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
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Give us Feedback</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2023 Tecg-Adda Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Tech-Adda</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	
	
	<script>
		function del() {
			let xhr = new XMLHttpRequest();
			var id=event.srcElement.id;
                xhr.open("GET", "/del.php?id="+id);
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
                    });
                    // console.log(xhr.responseText);
                }};
                xhr.send();
		}
	</script>


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>