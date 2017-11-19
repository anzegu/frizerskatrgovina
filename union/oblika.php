<?php
include_once 'session.php';
?>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="union/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="union/css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="union/css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="union/css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="union/css/owl.carousel.min.css">
	<link rel="stylesheet" href="union/css/owl.theme.default.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="union/css/style.css">
        <!-- Moja koda za login -->
        <link rel="stylesheet" href="union/css/login.css">


	<!-- Modernizr JS -->
	<script src="union/js/modernizr-2.6.2.min.js"></script>
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
					<a class="navbar-brand" href="prikaz_izdelkov.php"><span>U</span>nion</a> 
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="prikaz_izdelkov.php" data-nav-section="home"><span>Domača stran</span></a></li>
                                                
                                                
                                                        <?php
                                          if (isset($_SESSION['potrjen'])&&($_SESSION['potrjen']==1)) 
                                             {
                                                echo '<li><a href="product_add.php" data-nav-section="explore"><span>Dodaj izdelke</span></a></li>'; 
                                                echo '<li><a href="potrdi.php" data-nav-section="explore"><span>Potrdi uporabnike</span></a></li>';
                                            }
                                        ?>                                             
					
				
                                <div class="login">
                                <button class="dropbtn">Log in</button>
                                <div class="dropdown-content">
                                    <a href="logins/facebook/facebook_login.php">Facebook</a>
                                    <a href="logins/steam/steam_login.php">Steam</a>
                                    <a href="logins/google/google_login.php">Gmail</a>
                                </div>
                                </div>
                                        </ul>
                                </div>
			</nav>
	  </div>
           
	</header>
            <br>
            <br>
            <br>
            <br>
	</body>
</html>

