<?php
include "sqlconnect.php";
session_start();
if (!(isset($_SESSION['t_id']) or isset($_SESSION['login']))) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 32; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $_SESSION['t_id']=$randomString;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | Circuit Nepal</title>
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

<body onload="totall()">
<header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href=""><i class="fa fa-phone"></i> +9779865609055 / 9816641646</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> techadda2023@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/profile.php?id=100089367101003"><i class="fa fa-facebook"></i></a></li>
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
                                <li><a href="index.php" class="active">Home</a></li>
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
        </div>
        <!--/header-bottom-->
    </header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
                <center><p id="noitem" hidden>No Items in your Cart</p></center>
				<table class="table table-condensed" id="ctable">
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
									echo '<tr id="'.htmlspecialchars($row['p_id']).'a'.'">';
									echo '<td class="">';
									echo '<a href=""><img src="images/'.htmlspecialchars($row2['id']).'.jpg" style="height:100px; width:100px" alt=""></a>';
									echo '</td>';
									echo '<td class="">';
									echo '<h4 style="margin:0 0 10px"><a href="" style="color:#FE980F">'.htmlspecialchars($row2['name']).'</a></h4>';
									echo '</td>';
									echo '<td class="cart_price">';
									echo '<p id="'.$row['p_id'].'pp">'.htmlspecialchars($row2['price']).'</p>';
									echo '</td>';
									echo '<td class="cart_quantity">';
									echo '<div class="cart_quantity_button">';
                                    $c="'".$row['p_id']."'";
									echo '<a class="cart_quantity_up" onclick="dec('.$c.')"> - </a>';
									echo '<input id="'.htmlspecialchars($row['p_id']).'" class="cart_quantity_input" type="tel"'?>oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" <?php echo 'name="quantity" value="'.htmlspecialchars($row['qty']).'" autocomplete="off" size="2" onchange="addto('.$c.')">';
									echo '<a class="cart_quantity_down" onclick="inc('.$c.')"> + </a>';
									echo '</div>';
									echo '</td>';
									echo '<td class="cart_total">';
									echo '<p id="'.htmlspecialchars($row['p_id']).'tt" class="cart_total_price">'.htmlspecialchars(($row2['price']*$row['qty'])).'</p>';
									echo '</td>';
									echo '<td class="cart_delete">';
									echo '<a class="cart_quantity_delete" onclick="del1('.$c.')"><i class="fa fa-times"></i></a>';
									echo '</td>';
									echo '</tr>';
								}
							}
							echo '<tr>';
                            
                            echo '<td colspan="2">';
                            echo '  <table class="table table-condensed total-result">';
                            echo '      <tbody><tr>';
                            echo '          <td>Cart Sub Total</td>';
                            echo '          <td id="totamt"></td>';
                            echo '      </tr>';
                            
                            echo '      <tr class="shipping-cost">';
                            echo '          <td>Shipping Cost</td>';
                            echo '          <td id="shipping">150</td>';										
                            echo '      </tr>';
                            echo '      <tr>';
                            echo '          <td>Total</td>';
                            echo '          <td><span id="gtotal"><span></td>';
                            echo '      </tr>';
                            echo '  </tbody></table>';
                            echo '</td>';
                            echo '</tr>';
						}
						else {
							
						}
						
					}
                    elseif (isset($_SESSION['t_id'])) {
                        $result=$conn->query("SELECT * FROM Tcart WHERE t_id='".$_SESSION['t_id']."'");
						if (mysqli_num_rows($result)>0) {
							while($row = $result->fetch_assoc()) {
								$result2=$conn->query("SELECT * FROM Products WHERE id=".$row['p_id']."");
								while($row2=$result2->fetch_assoc()) {
									echo '<tr id="'.htmlspecialchars($row['p_id']).'a'.'">';
									echo '<td class="">';
									echo '<a href=""><img src="images/'.htmlspecialchars($row2['id']).'.jpg" style="height:100px; width:100px" alt=""></a>';
									echo '</td>';
									echo '<td class="">';
									echo '<h4 style="margin:0 0 10px"><a href="" style="color:#FE980F">'.htmlspecialchars($row2['name']).'</a></h4>';
									echo '</td>';
									echo '<td class="cart_price">';
									echo '<p id="'.htmlspecialchars($row['p_id']).'pp">'.htmlspecialchars($row2['price']).'</p>';
									echo '</td>';
									echo '<td class="cart_quantity">';
									echo '<div class="cart_quantity_button">';
                                    $c="'".htmlspecialchars($row['p_id'])."'";
									echo '<a class="cart_quantity_up" onclick="dec('.$c.')"> - </a>';
									echo '<input id="'.htmlspecialchars($row['p_id']).'" class="cart_quantity_input" type="tel"'?>oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" <?php echo 'name="quantity" value="'.htmlspecialchars($row['qty']).'" autocomplete="off" size="2" onchange="addto('.$c.')">';
									echo '<a class="cart_quantity_down" onclick="inc('.$c.')"> + </a>';
									echo '</div>';
									echo '</td>';
									echo '<td class="cart_total">';
									echo '<p id="'.htmlspecialchars($row['p_id']).'tt" class="cart_total_price">'.htmlspecialchars(($row2['price']*$row['qty'])).'</p>';
									echo '</td>';
									echo '<td class="cart_delete">';
									echo '<a class="cart_quantity_delete" onclick="del1('.$c.')"><i class="fa fa-times"></i></a>';
									echo '</td>';
									echo '</tr>';
								}
							}
							echo '<tr>';
                            
                            echo '<td colspan="2">';
                            echo '  <table class="table table-condensed total-result">';
                            echo '      <tbody><tr>';
                            echo '          <td>Cart Sub Total</td>';
                            echo '          <td id="totamt"></td>';
                            echo '      </tr>';
                            
                            echo '      <tr class="shipping-cost">';
                            echo '          <td>Shipping Cost</td>';
                            echo '          <td id="shipping">150</td>';										
                            echo '      </tr>';
                            echo '      <tr>';
                            echo '          <td>Total</td>';
                            echo '          <td><span id="gtotal"><span></td>';
                            echo '      </tr>';
                            echo '  </tbody></table>';
                            echo '</td>';
                            echo '</tr>';
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
            <h3>Shipping Details:</h3>
            <div class="form-one">
                <form method="POST" action="/checkout.php">
                    <input type="text" placeholder="Email *" name="email" <?php if (isset($_SESSION['login'])) { echo "value='".$_SESSION['login']."'"; } ?> required>
                    <input type="text" placeholder="Full Name *" name="fname" <?php if (isset($_SESSION['login'])) { echo "value='".$_SESSION['first_name']." ".$_SESSION['last_name']."'"; } ?> required>
                    <input type="text" placeholder="Full Address *" name="add" <?php if (isset($_SESSION['login'])) { echo "value='".$_SESSION['address']."'"; } ?> required>
                    <input type="tel" placeholder="Contact No" name="cno" <?php if (isset($_SESSION['login'])) { echo "value='".$_SESSION['phone']."'"; } ?> required>
                    <center><h3>Payment Options:</h3></center>
                    <!-- esewa form -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#esewaModal">
                    Esewa Payment
                    </button>
                    <div class="modal" id="esewaModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Esewa Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="/images/esewa.jpg" alt="" style="width:100%;">
                            <h3 class="totalprice"></h3>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="esewa" class="btn btn-primary">Payment Completed</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    <script>$('#esewaModal').on('shown.bs.modal', function () {
                    $('#myInput').trigger('focus')
                    })
                    </script>
                    
                    <!-- /esewa form -->


                    <!-- khalti form -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#khaltiModal">
                    Khalti Payment
                    </button>
                    <div class="modal" id="khaltiModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Khalti Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="/images/khalti.jpg" alt="" style="width:100%;">
                            <h3 class="totalprice"></h3>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="khalti" class="btn btn-primary">Payment Completed</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    <script>$('#khaltiModal').on('shown.bs.modal', function () {
                    $('#myInput').trigger('focus')
                    })
                    </script>
                    <!-- /khalti form -->

                    <!-- imepay form -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imepayModal">
                    ImePay Payment
                    </button>
                    <div class="modal" id="imepayModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ImePay Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="/images/imepay.jpg" alt="" style="width:100%;">
                            <h3 class="totalprice"></h3>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="imepay" class="btn btn-primary">Payment Completed</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    <script>$('#imepayModal').on('shown.bs.modal', function () {
                    $('#myInput').trigger('focus')
                    })
                    </script>
                    <!-- /imepay form -->

                    <!-- fonepay form -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fonepayModal">
                    FonePay Payment
                    </button>
                    <div class="modal" id="fonepayModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Fonepay Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Currently Not Available</p>
                            <h3 class="totalprice"></h3>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="submit" name="fonepay" class="btn btn-primary">Payment Completed</button> -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    <script>$('#fonepayModal').on('shown.bs.modal', function () {
                    $('#myInput').trigger('focus')
                    })
                    </script>
                    <!-- /fonepay form -->

                    <!-- Cash On delivery Form -->
                    <button type="submit" name="cash" class="btn btn-primary">
                    Cash On Delivery
                    </button>
                    
                    <!-- /Cash On delivery Form -->
                    <h3>Note: Cash On delivery Currently available for Pokhara valley customers only.</h3>
                </form>
            </div>
            
        </div>
			
	
	<?php 
    if (isset($_GET['message'])) {
        if ($_GET['message']=='Error') {
            echo "<script>alert('Payment Error Please Try Again');</script>";
        }
    }
    ?>		
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
								<li><a href="">Privacy Policy</a></li>
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
					<p class="pull-left">Copyright © 2023 Tech-Adda Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Tech-Adda</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

	
	<script>
		function del1(id) {
            // var id=event.srcElement.id;
			let xhr = new XMLHttpRequest();
            console.log(id);
            xhr.open("GET", "/del.php?id="+id);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    document.getElementById(id+'a').remove();
                    totall();
                }
            };
            xhr.send();
		}
        function totall() {
            var tot = document.getElementsByClassName("cart_total_price");
            var ttotal=0;
            for (i=0;i<tot.length;i++) {
                console.log(tot[i].innerHTML);
                ttotal=ttotal+parseInt(tot[i].innerHTML);
            }
            console.log("Works");
            if (ttotal==0) {
                document.getElementById("hide").hidden=true;
                document.getElementById("ctable").hidden=true;
                document.getElementById("noitem").hidden=false;
            }
            else {
                document.getElementById("totamt").innerHTML=ttotal;
                document.getElementById("gtotal").innerHTML=ttotal+150;
                
                divs = document.getElementsByClassName( 'totalprice' );

                [].slice.call( divs ).forEach(function ( div ) {
                    div.innerHTML = "Your Total Amount is:"+(ttotal+150);
                });
            }
        }

        function inc(id) {
            // var id=event.srcElement.id;
            var v=parseInt(document.getElementById(id).value)+1;
            document.getElementById(id).value=v;
            addto(id);
        }

        function dec(id) {
            // var id=event.srcElement.id;
            var v=parseInt(document.getElementById(id).value)-1;
            if (v==0) {
                del1(id);
            }
            else {
                document.getElementById(id).value=v;
                addto(id);
            }
        }

        function addto(id) {
            // var id=event.srcElement.id;
            console.log(id);
            var v=document.getElementById(id).value;
            if (parseInt(v)<1) {
                del1(id);
            }
            else {
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "/add.php?id="+id+"&up=1&qty="+v);
                xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    var pp=parseInt(document.getElementById(id+'pp').innerHTML);
                    document.getElementById(id+'tt').innerHTML=(pp*parseInt(v));
                    console.log(pp*parseInt(v));
                    console.log(xhr.responseText);
                    totall();
                }};
                xhr.send();
            }
		}
	</script>



    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


   
</body>
</html>