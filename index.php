<?php include "sqlconnect.php"; 
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
if (isset($_GET['page'])) {
    if (intval($_GET['page'])<=1) {
        $page=0;
    }
    else {
        $page=((intval($_GET['page'])-1)*12);
    }
}
else {
    $page=0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Circuit Nepal</title>
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



</head>
<!--/head-->

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
                                <li><a href="#"><i class="fa fa-phone"></i> +9779865609055 / 9816641646</a></li>
                                <li><a href="https://mail.google.com/"><i class="fa fa-envelope"></i> techadda2023@gmail.com</a></li>
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
                            <a href="index.php"><img src="images/home/cn.png" style="height:50px" alt="" /> &nbsp;&nbsp;<span style="color: #FE980F;font-family: 'Roboto', sans-serif;font-size: 28px;font-weight: 600;">Circuit Nepal</span></a>
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
                                        <li><a href="/?cat=Integrated Circuit">Integrated Circuits</a></li>
                                        <li><a href="/?cat=Radio Frequency Modules">Radio Frequency Modules</a></li>
                                        <li><a href="/?cat=Batteries and Accessories">Batteries and Accessories</a></li>
                                        <li><a href="/?cat=Resistors,Diodes and Capacitors">Resistors,Diodes and Capacitors</a></li>
                                        <li><a href="/?cat=Batteries and Accessories">Batteries and Accessories</a></li>
                                        <li><a href="/?cat=Switch">Switch</a></li>
                                        <li><a href="/?cat=Display Modules">Display Modules</a></li>
                                    </ul>
                                </li>
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
    </header>
    <!--/header-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        
                        <?php
                        if (isset($_GET['cat'])) {
                            echo '<h2 class="title text-center">'.htmlspecialchars($_GET['cat']).'</h2>';
                            $cat1 = $conn->real_escape_string($_GET['cat']);
                            $result=$conn->query("SELECT * FROM Products WHERE category LIKE '%".$cat1."%' LIMIT ".$page.",12");
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='col-xs-6 col-sm-3 col-md-3'>";
                                echo "<div class='product-image-wrapper'>";
                                echo "<div class='single-products'>";
                                echo "<div class='productinfo text-center'>";
                                echo "<a href='/product-details.php?id=".$row["id"]."'><img src='images/".$row["id"].".jpg' alt='' /></a>";
                                echo "<a href='/product-details.php?id=".$row["id"]."'><h2>".$row["price"]."</h2></a>";
                                echo "<a href='/product-details.php?id=".$row["id"]."'><p>".$row["name"]."</p></a>";
                                echo "<button href='#' class='btn btn-default add-to-cart' id='".$row["id"]."' onclick='addto()'><i class='fa fa-shopping-cart'></i>Add to cart</button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        elseif ((!isset($_GET['search'])) || ($_GET['search']=='')) {
                            echo '<h2 class="title text-center">Featured Items</h2>';
                            $result=$conn->query("SELECT * FROM Products LIMIT ".$page.",12");
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='col-xs-6 col-sm-3 col-md-3'>";
                                echo "<div class='product-image-wrapper'>";
                                echo "<div class='single-products'>";
                                echo "<div class='productinfo text-center'>";
                                echo "<a href='/product-details.php?id=".$row["id"]."'><img src='images/".$row["id"].".jpg' alt='' /></a>";
                                echo "<a href='/product-details.php?id=".$row["id"]."'><h2>".$row["price"]."</h2></a>";
                                echo "<a href='/product-details.php?id=".$row["id"]."'><p>".$row["name"]."</p></a>";
                                echo "<button href='#' class='btn btn-default add-to-cart' id='".$row["id"]."' onclick='addto()'><i class='fa fa-shopping-cart'></i>Add to cart</button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        else {
                            echo '<h2 class="title text-center">'.htmlspecialchars($_GET['search']).'</h2>';
                            $search1 = $conn->real_escape_string($_GET['search']);
                            $result=$conn->query("SELECT * FROM Products WHERE name LIKE '%".$search1."%' LIMIT ".$page.",12");
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='col-xs-6 col-sm-3 col-md-3'>";
                                echo "<div class='product-image-wrapper'>";
                                echo "<div class='single-products'>";
                                echo "<div class='productinfo text-center'>";
                                echo "<a href='/product-details.php?id=".$row["id"]."'><img src='images/".$row["id"].".jpg' alt='' /></a>";
                                echo "<a href='/product-details.php?id=".$row["id"]."'><h2>".$row["price"]."</h2></a>";
                                echo "<a href='/product-details.php?id=".$row["id"]."'><p>".$row["name"]."</p></a>";
                                echo "<button href='#' class='btn btn-default add-to-cart' id='".$row["id"]."' onclick='addto()'><i class='fa fa-shopping-cart'></i>Add to cart</button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
						?>
                        
                        <!-- <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/product2.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/product2.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/product2.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/product2.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <!--features_items-->
                    <center>
                    <?php 
                        if (isset($_GET['page'])) {
                            $pg=intval($_GET['page']);
                            $pg = $conn->real_escape_string($pg);
                        }
                        else {
                            $pg=1;
                        }
                        if (isset($_GET['search'])) {
                            $st='search='.$_GET['search'].'&';
                            $st = $conn->real_escape_string($st);
                        }
                        elseif (isset($_GET['cat'])) {
                            $st='cat='.$_GET['cat'].'&';
                            $st = $conn->real_escape_string($st);
                        }
                        else {
                            $st='';
                        }
                        if ($st=='') {
                            $cnt = $conn->query("SELECT * FROM Products")->num_rows;
                        }
                        elseif (isset($_GET['cat'])) {
                            $cnt1 = $conn->real_escape_string($_GET['cat']);
                            $cnt = $conn->query("SELECT * FROM Products WHERE category LIKE '%".$cnt1."%'")->num_rows;
                        }
                        else {
                            $cnt1 = $conn->real_escape_string($_GET['search']);
                            $cnt = $conn->query("SELECT * FROM Products WHERE name LIKE '%".$cnt1."%'")->num_rows;
                        }
                        if (intval($cnt/12)<($cnt/12)) {
                            $cnt=intval($cnt/12)+1;
                        }
                        
                    ?>
					<ul class="pagination">
                        <?php 
                        if ($pg>1) {
                            echo '<li><a href="/?'.$st.'page='.($pg-1).'">&laquo;</a></li>';
                        }
                        if ($pg==1) {
                            echo '<li class="active"><a>1</a></li>';
                            if ($cnt==2) {
                                echo '<li class=""><a href="/?'.$st.'page=2">2</a></li>';
                            }
                            if ($cnt>2) {
                                echo '<li class=""><a href="/?'.$st.'page=2">2</a></li>';
                                echo '<li class=""><a href="/?'.$st.'page=3">3</a></li>';
                            }
                            if ($cnt>3) {
                                echo '<li><a href="/?'.$st.'page=2">&raquo;</a></li>';
                            }
                        }
                        elseif ($pg>1) {
                            if ($pg==$cnt) {
                                if ($pg>2) {
                                echo '<li><a href="/?'.$st.'page='.($pg-2).'">'.($pg-2).'</a></li>';
                                }
                                if ($pg>1) {
                                echo '<li><a href="/?'.$st.'page='.($pg-1).'">'.($pg-1).'</a></li>';
                                }
                                echo '<li class="active"><a href="">'.$pg.'</a></li>';
                            }
                            else {
                                if ($pg>1) {
                                    echo '<li><a href="/?'.$st.'page='.($pg-1).'">'.($pg-1).'</a></li>';
                                }
                                echo '<li class="active"><a href="">'.$pg.'</a></li>';
                                if ($pg>1) {
                                    echo '<li><a href="/?'.$st.'page='.($pg+1).'">'.($pg+1).'</a></li>';
                                }
                                echo '<li><a href="/?'.$st.'page='.($pg+1).'">&raquo;</a></li>';
                            }
                        }
                        ?>

						<!-- <li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li> &laquo; for left pointing arrow -->
					</ul>
					</center>

                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                            <?php 
                            $count=1;
                            $result=$conn->query("SELECT * FROM Recommended_Items");
                            while($row = $result->fetch_assoc()) {
                                $result2=$conn->query("SELECT * FROM Products WHERE id=".$row['p_id']);
                                while($row2=$result2->fetch_assoc()) {
                                    if ($count<4) {
                            ?>
                                <div class="item active">
                                    
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php 
                                                    echo "<a href='/product-details.php?id=".$row2["id"]."'><img src='images/".$row2["id"].".jpg' style='height:180px;width:auto;' alt='' /></a>"; 
                                                    echo "<a href='/product-details.php?id=".$row2["id"]."'><h2>".$row2["price"]."</h2></a>";
                                                    echo "<a href='/product-details.php?id=".$row2["id"]."'><p>".$row2["name"]."</p></a>";
                                                    ?>
                                                    <?php echo "<button href='#' class='btn btn-default add-to-cart' id='".$row2["id"]."' onclick='addto()'><i class='fa fa-shopping-cart'></i>Add to cart</button>"; ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                                    }
                                    else {
                            ?>
                                <div class="item">
                                    
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php 
                                                    echo "<a href='/product-details.php?id=".$row2["id"]."'><img src='images/".$row2["id"].".jpg' style='height:180px;width:auto;' alt='' /></a>"; 
                                                    echo "<a href='/product-details.php?id=".$row2["id"]."'><h2>".$row2["price"]."</h2></a>";
                                                    echo "<a href='/product-details.php?id=".$row2["id"]."'><p>".$row2["name"]."</p></a>";
                                                    ?>
                                                    <?php echo "<button href='#' class='btn btn-default add-to-cart' id='".$row2["id"]."' onclick='addto()'><i class='fa fa-shopping-cart'></i>Add to cart</button>"; ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                                    }
                                }
                                $count=$count+1;
                            }
                            ?>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                                <li><a href="#">Copyright</a></li>
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
                    <p class="pull-left">Copyright © 2023 Tech Adda Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Tech-Adda</a></span></p>
                </div>
            </div>
        </div>

    </footer>
    <?php
    if (isset($_GET['message'])) {
        if ($_GET['message']=='success') {
            echo '<script>alert("Your order has been placed successfully. We will contact you soon.");</script>';
        }
    }
    ?>
    <!--/Footer-->

        <script>
            function addto() 
            {
                var id=event.srcElement.id;
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "/add.php?id="+id);
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
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>    
        <script src="js/jquery.bootstrap-growl.min.js"></script>

</body>

</html>
<?php $conn->close(); ?>