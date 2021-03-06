<?php 
session_start();
ob_start();
require 'logins/facebook_v2/facebookLogin.php';
require 'logins/steam/SteamAuthentication/steamauth/steamauth.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Union &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="css/style.css">
        <!-- Moja koda za login -->
        <link rel="stylesheet" href="css/login.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
        
        <style>
 
        </style>
	</head>
	<body>
	<header role="banner" id="fh5co-header">
		<div class="fluid-container">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
					<a class="navbar-brand" href="index.php"><span>U</span>nion</a> 
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#" data-nav-section="home"><span>Home</span></a></li>
						<?php  if(isset($_SESSION['potrjen'])&&$_SESSION['potrjen']==1){ ?>
                                                <li><a href="#" data-nav-section="explore"><span>Evidenca</span></a></li>
						<li><a href="#" data-nav-section="testimony"><span>Profil</span></a></li>
						<li><a href="#" data-nav-section="pricing"><span>Košarica</span></a></li>
                                                <?php if(isset($_GET['id'])){    ?>  
						<li><a href="#" data-nav-section="services"><span>Izdelek</span></a></li>
                                                <?php }} ?>  						                                             
					</ul>     
				</div>
                            <?php 
                            if (isset ($_SESSION['steamid']))
                            {?>    
                            <div style="margin: -50px 0 0 0">
                                <div class="logout">
                                    <button class="logoutbtn"><a href="logins/logout.php">Logout</a></button>
                                </div><?php } ?>
                            
                            <?php 
                            if (isset($_SESSION['priimek']))
                            {?>    
                                <div class="logout">
                                    <button class="logoutbtn"><a href="logins/logout.php">Logout</a></button>
                                </div><?php } ?>
                            
                            <?php
                            if (!isset($_SESSION['FaceName']) && (!isset ($_SESSION['steamid'])) && (!isset($_SESSION['priimek'])))
                            {?>
                            <div class="login">
                                <button class="dropbtn">Log in</button>
                                <div class="dropdown-content">
                                    <?php 
                                    echo "<a href='".$_SESSION['loginURL']."'>Facebook</a>"; ?>
                                    <?php echo loginbutton(); ?>
                                    <a href="logins/google/google_login.php">Gmail</a>
                                </div></div></div>
                            <?php }?>
                            
			</nav>
	  </div>
	</header>

	<section id="fh5co-home" data-section="home" style="background-image: url(images/full_image_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="gradient"><?php
                if(isset($_GET['sc'])){
                    include_once "../racun.php";
                }else
                include_once "../prikaz_izdelkov.php";
                ?></div>		
	</section>
<?php  if(isset($_SESSION['potrjen'])&&$_SESSION['potrjen']==1){ ?>
	<section style="background-color: #e9584d" id="fh5co-explore" data-section="explore">
		<div class="container">
			<?php
                        if(isset($_GET['ide'])){
                            include_once "../u_racun.php";
                        }else if(isset($_GET['po'])){
                            include_once "../potrdi.php";
                        }else                       
                        include_once "../evidenca.php";
                        ?>
                </div>    
	</section>
        
	<section id="fh5co-testimony" data-section="testimony">
		<div class="container">
			<div class="row">
				<div class="col-md-12 to-animate">
					<div class="wrap-testimony">
						<div class="owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/icon.png" alt="user">
									</figure>
									<blockquote>
										<p><?php include_once "../profil.php";?></p>
									</blockquote>
									
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">									
									<blockquote>
										<div style="height: 400px"><?php include_once "../uredi_profil.php";?></div>
									</blockquote>
									
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }?>
            <hr>
<?php if(isset($_SESSION['user_id']))	{ ?>
	<section id="fh5co-pricing" data-section="pricing">
		<div class="fh5co-pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">Košarica</h2>
					</div>
				</div>

				<div class="row">
					<?php include_once '../kosarica.php';?>
				</div>

				

			</div>
		</div>
	</section>
<?php } if(isset($_GET['id'])){ ?>
	<section id="fh5co-services" data-section="services">
		<div class="fh5co-services">
			<div class="container">
                            <div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">Izdelek</h2>
					</div>
				<div class="row">
                                    <?php include_once "../info.php"; ?>					
				</div>
                        </div>
		</div>
	</section>	
<?php } ?>
	<hr>
<?php if(isset($_GET['idu'])||isset($_GET['di'])||isset($_GET['dk'])){ ?>
	<section id="fh5co-trusted" data-section="trusted">
		<div class="fh5co-trusted">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
                                                <h2 class="to-animate"><?php if(isset($_GET['di'])) {echo 'Dodaj izdelek'; }
                                                else if(isset($_GET['dk'])){
                                                    echo 'Dodaj kategorijo';
                                                    }else
                                                        echo 'Uredi izdelke';
                                                     ?></h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<?php if(isset($_GET['di'])) {
                                                                    include_once "../product_add.php";
                                                                }else if(isset($_GET['idu'])){
                                                                    include_once "../uredi_izdelke.php";}
                                                                    else{
                                                                    include_once "../d_kategorije.php";                                                                        
                                                                    }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
	<div id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-4 to-animate">
					<h3 class="section-title">O nam</h3>
					<p>Trgovina z aparati,barvo, itd. za frizerske salone.</p>
					<p class="copy-right">&copy; 2015 Union Free Template. <br>All Rights Reserved. <br>
						Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a>
						Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a> &amp; Dribbble Image by <a href="https://dribbble.com/tibi_neamu" target="_blank">Tiberiu</a>
					</p>
				</div>

				<div class="col-md-4 to-animate">
					<h3 class="section-title">Naslov</h3>
					<ul class="contact-info">
						<li><i class="icon-map-marker"></i>Trg mladosti 3, 3320 Velenje</li>
						<li><i class="icon-phone"></i>+ 1235 2355 98</li>
						<li><i class="icon-envelope"></i><a href="#">frizerskisalon@fr.com</a></li>
						<li><i class="icon-globe2"></i><a href="#">ft-frizerskatrgovina.com</a></li>
					</ul>
					<h3 class="section-title">Connect with Us</h3>
					<ul class="social-media">
						<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
						<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
						<li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
						<li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
	<div id="map" class="fh5co-map"></div>

	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Owl Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	</body>
</html>

<?php ob_end_flush();