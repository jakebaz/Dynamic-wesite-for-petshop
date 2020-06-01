<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php include ('classes.php');?>
<html>
<head>
	<title>Pet Supplies|Home</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="pets, pet shop, pet supplies"/>
	<meta name="author" content="Jacob Bazin"/>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../js/script.js"></script>
	<?php
		session_start();
	?>
</head>
<body>
	<div class="main-wrapper">
		<div class="content-wrapper">
			<div class="top-banner">
				<a href="home.php"><img class="logo" src="../images/Logo2.png"></a>
				<div class="search-bar">
					<input id="search-box" type="text" name="search-bar" placeholder="Search">
					<button type="submit" id="search-button">Search</button>
				</div>
				<div class="buttons">
					<?php
					if (!isset($_SESSION['loggedInUser'])){
						echo '<a href="login_form.php">Login</a>';
					} else{
						echo '<a href="profile.php">'.$_SESSION['loggedInUser'].'</a>';
						echo '<a href="logout.php">Logout</a>';
						echo '<a href="cart.php">Shopping Basket</a>';
					}
					?>					
				</div>	
			</div>
			<div class="left-pane">
				<div class="navigation">
					<ul>
						<li><a href="catalogue.php">Catalogue</a></li>
						<li><a href="#">Information on pets</a></li>
						<li><a href="#">Useful links</a></li>
						<li><a href="about.php">About us</a></li>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="main">
				<div class="display-products">
					<div id="display-header">
						<h4>Featured Products</h4>
					</div>
					<div id="main-display">
						<h6>Featured Pet Food</h6>
						<?php
							$featuredFood = new DisplayProduct($dbconn);
							$featuredFood->getFeaturedProducts("SELECT * FROM product WHERE productID = 2 OR productID = 9 OR productID = 15
							OR productID = 17 OR productID = 22;");
						
							foreach($featuredFood->featuredProducts as $val){
								print_r(
									'<div class="home-product">
										<a href="product.php?id='.$val[0].'"><article class="prod-top-section>
											<h6 class="prod-title">'.$val[1].'</h6>
											<span class="prod-brand">by '.$val[2].'</span>
										</article>
										<article class="prod-bottom-section">	
											<img src='.$val[4].' alt="'.$val[1].'">	
											<span class="prod-price">£'.$val[3].'</span>
										</article></a>
									</div>');				
							}	
						?>
						<h6>Featured Toys</h6>
						<?php 
							$featuredToys = new DisplayProduct($dbconn);
							$featuredToys->getFeaturedProducts("SELECT * FROM product WHERE productID = 38 OR productID = 41 OR productID = 31
							OR productID = 33 OR productID = 42;");
							foreach($featuredToys->featuredProducts as $val){
								print_r(
									'<div class="home-product">
										<a href="product.php?id='.$val[0].'"><article class="prod-top-section>
											<h6 class="prod-title">'.$val[1].'</h6>
											<span class="prod-brand">by '.$val[2].'</span>
										</article>
										<article class="prod-bottom-section">	
											<img src='.$val[4].' alt="'.$val[1].'">	
											<span class="prod-price">£'.$val[3].'</span>
										</article></a>
									</div>');				
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="footer-address">
			<h6>Head Office Address:</h6>
			<ul>
				<li>10 Quayside Rd</li>
				<li>Newcastle Upon Tyne</li>
				<li>Tyne & Wear</li>
				<li>United Kingdom</li>
				<li>NE1 3FF</li>
				<li>Copyright &copy; 2020</li>
		 	</ul>
		</div>
	</footer>


</body>
</html>

