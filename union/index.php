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
						<li><a href="#" data-nav-section="pricing"><span>Pricing</span></a></li>
                                                <?php } ?>        
						<li><a href="#" data-nav-section="services"><span>Services</span></a></li>
						<li><a href="#" data-nav-section="team"><span>Team</span></a></li>
						<li><a href="#" data-nav-section="faq"><span>FAQ</span></a></li>                                               
					</ul>     
				</div>
                            <?php 
                            if (isset ($_SESSION['steamid']))
                            {?>    
                                <div class="logout">
                                    <button class="logoutbtn"><a href="logins/logout.php">Logout</a></button>
                                </div><?php } ?>
                            
                            <?php 
                            if (isset($_SESSION['FaceName']))
                            {?>    
                                <div class="logout">
                                    <button class="logoutbtn"><a href="logins/logout.php">Logout</a></button>
                                </div><?php } ?>
                            
                            <?php
                            if (!isset($_SESSION['FaceName']) && (!isset ($_SESSION['steamid'])))
                            {?>
                            <div class="login">
                                <button class="dropbtn">Log in</button>
                                <div class="dropdown-content">
                                    <?php 
                                    echo "<a href='".$_SESSION['loginURL']."'>Facebook</a>"; ?>
                                    <?php echo loginbutton(); ?>
                                    <a href="logins/google/google_login.php">Gmail</a>
                                </div></div>
                            <?php }?>
                            
			</nav>
	  </div>
	</header>

	<section id="fh5co-home" data-section="home" style="background-image: url(images/full_image_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="gradient"><?php
                include_once "../prikaz_izdelkov.php";
                ?></div>		
	</section>
<?php  if(isset($_SESSION['potrjen'])&&$_SESSION['potrjen']==1){ ?>
	<section style="background-color: #e9584d" id="fh5co-explore" data-section="explore">
		<div class="container">
			<?php
                        include_once "../evidenca.php";
                        ?>
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
	<div class="getting-started getting-started-1">
		<div class="container">
			<div class="row">
				<div class="col-md-6 to-animate">
					<h3>Getting Started</h3>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
				</div>
				<div class="col-md-6 to-animate-2">
					<div class="call-to-action text-right">
						<a href="#" class="sign-up">Sign Up For Free</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<section id="fh5co-pricing" data-section="pricing">
		<div class="fh5co-pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">Plans Built For Every One</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove. </h3>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="pricing">
						<div class="col-md-3">
							<div class="price-box to-animate-2">
								<h2 class="pricing-plan">Starter</h2>
								<div class="price"><sup class="currency">$</sup>9<small>/month</small></div>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
								<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
							</div>
						</div>

						<div class="col-md-3">
							<div class="price-box to-animate-2">
								<h2 class="pricing-plan">Basic</h2>
								<div class="price"><sup class="currency">$</sup>27<small>/month</small></div>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
								<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
							</div>
						</div>

						<div class="col-md-3">
							<div class="price-box to-animate-2 popular">
								<h2 class="pricing-plan pricing-plan-offer">Pro <span>Best Offer</span></h2>
								<div class="price"><sup class="currency">$</sup>74<small>/month</small></div>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
								<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
							</div>
						</div>

						<div class="col-md-3">
							<div class="price-box to-animate-2">
								<h2 class="pricing-plan">Unlimited</h2>
								<div class="price"><sup class="currency">$</sup>140<small>/month</small></div>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
								<a href="#" class="btn btn-select-plan btn-sm">Select Plan</a>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 col-md-offset-3 to-animate">
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. <a href="#">Learn More</a></p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section id="fh5co-services" data-section="services">
		<div class="fh5co-services">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">We Offer Services</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove. </h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="box-services">
							<i class="icon-chemistry to-animate-2"></i>
							<div class="fh5co-post to-animate">
								<h3>Hand-crafted with Detailed</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in.</p>
							</div>
						</div>

						<div class="box-services">
							<i class="icon-energy to-animate-2"></i>
							<div class="fh5co-post to-animate">
								<h3>Light and Fast</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box-services">
							<i class="icon-trophy to-animate-2"></i>
							<div class="fh5co-post to-animate">
								<h3>Award-winning Landing Page</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in.</p>
							</div>
						</div>

						<div class="box-services">
							<i class="icon-paper-plane to-animate-2"></i>
							<div class="fh5co-post to-animate">
								<h3>Sleek and Smooth Animation</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box-services">
							<i class="icon-people to-animate-2"></i>
							<div class="fh5co-post to-animate">
								<h3>Satisfied &amp; Happy Clients</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in.</p>
							</div>
						</div>

						<div class="box-services">
							<i class="icon-screen-desktop to-animate-2"></i>
							<div class="fh5co-post to-animate">
								<h3>Looks Amazing on Devices</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="call-to-action text-center to-animate"><a href="#" class="btn btn-learn">Learn More</a></div>
			</div>
		</div>
	</section>	

	<section id="fh5co-team" data-section="team">
		<div class="fh5co-team">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">Meet The Team</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove. </h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="team-box text-center to-animate-2">
							<div class="user"><img class="img-reponsive" src="images/person4.jpg" alt="Roger Garfield"></div>
							<h3>Roger Garfield</h3>
							<span class="position">Co-Founder, Lead Developer</span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<ul class="social-media">
								<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
								<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
								<li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
								<li><a href="#" class="codepen"><i class="icon-codepen"></i></a></li>
								<li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-4">
						<div class="team-box text-center to-animate-2">
							<div class="user"><img class="img-reponsive" src="images/person2.jpg" alt="Roger Garfield"></div>
							<h3>Kevin Steve</h3>
							<span class="position">Co-Founder, Product Designer</span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<ul class="social-media">
								<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
								<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
								<li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
								<li><a href="#" class="codepen"><i class="icon-codepen"></i></a></li>
								<li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-4">
						<div class="team-box text-center to-animate-2">
							<div class="user"><img class="img-reponsive" src="images/person3.jpg" alt="Roger Garfield"></div>
							<h3>Ross Standford</h3>
							<span class="position">Full Stack Developer</span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<ul class="social-media">
								<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
								<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
								<li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
								<li><a href="#" class="codepen"><i class="icon-codepen"></i></a></li>
								<li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="fh5co-faq" data-section="faq">
		<div class="fh5co-faq">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">Common Questions</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">Everything you need to know before you get started</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="box-faq to-animate-2">
							<h3>What is Union?</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						</div>
						<div class="box-faq to-animate-2">
							<h3>I have technical problem, who do I email? </h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						</div>
						<div class="box-faq to-animate-2">
							<h3>How do I use Bato features?</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						</div>
					</div>

					<div class="col-md-6">
						<div class="box-faq to-animate-2">
							<h3>What language are available?</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						</div>
						<div class="box-faq to-animate-2">
							<h3>Can I have a username that is already taken?</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						</div>
						<div class="box-faq to-animate-2">
							<h3>Is Union free?</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<hr>

	<section id="fh5co-trusted" data-section="trusted">
		<div class="fh5co-trusted">
			<div class="container">
				<div class="row">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">Trusted By</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext">
								<h3 class="to-animate">We’re trusted by these popular companies</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					 <div class="col-md-2 col-sm-3 col-xs-6 col-sm-offset-0 col-md-offset-1">
					 	<div class="partner-logo to-animate-2">
					 		<img src="images/logo1.png" alt="Partners" class="img-responsive">
					 	</div>
					 </div>
				    <div class="col-md-2 col-sm-3 col-xs-6">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo2.png" alt="Partners" class="img-responsive">
						</div>
				    </div>
				    <div class="col-md-2 col-sm-3 col-xs-6">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo3.png" alt="Partners" class="img-responsive">
				    	</div>
				    </div>
				    <div class="col-md-2 col-sm-3 col-xs-6">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo4.png" alt="Partners" class="img-responsive">
				    	</div>
				    </div>
				    <div class="col-md-2 col-sm-12 col-xs-12">
				    	<div class="partner-logo to-animate-2">
				    		<img src="images/logo5.png" alt="Partners" class="img-responsive">
				    	</div>
				    </div>
				</div>
			</div>
		</div>
	</section>

	<div class="getting-started getting-started-2">
		<div class="container">
			<div class="row">
				<div class="col-md-6 to-animate">
					<h3>Getting Started</h3>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
				</div>
				<div class="col-md-6 to-animate-2">
					<div class="call-to-action text-right">
						<a href="#" class="sign-up">Sign Up For Free</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-4 to-animate">
					<h3 class="section-title">About Us</h3>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
					<p class="copy-right">&copy; 2015 Union Free Template. <br>All Rights Reserved. <br>
						Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a>
						Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a> &amp; Dribbble Image by <a href="https://dribbble.com/tibi_neamu" target="_blank">Tiberiu</a>
					</p>
				</div>

				<div class="col-md-4 to-animate">
					<h3 class="section-title">Our Address</h3>
					<ul class="contact-info">
						<li><i class="icon-map-marker"></i>198 West 21th Street, Suite 721 New York NY 10016</li>
						<li><i class="icon-phone"></i>+ 1235 2355 98</li>
						<li><i class="icon-envelope"></i><a href="#">info@yoursite.com</a></li>
						<li><i class="icon-globe2"></i><a href="#">www.yoursite.com</a></li>
					</ul>
					<h3 class="section-title">Connect with Us</h3>
					<ul class="social-media">
						<li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
						<li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
						<li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
						<li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
					</ul>
				</div>
				<div class="col-md-4 to-animate">
					<h3 class="section-title">Drop us a line</h3>
					<form class="contact-form">
						<div class="form-group">
							<label for="name" class="sr-only">Name</label>
							<input type="name" class="form-control" id="name" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="message" class="sr-only">Message</label>
							<textarea class="form-control" id="message" rows="7" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Send Message">
						</div>
					</form>
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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	</body>
</html>

<?php ob_end_flush();