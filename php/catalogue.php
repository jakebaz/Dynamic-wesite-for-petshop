<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
session_start();
include ('classes.php');
?>
<html>
<head>
	<title>Pet Supplies|Catalogue</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="pets, pet shop, pet supplies"/>
	<meta name="author" content="Jacob Bazin"/>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../js/script.js"></script>
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
					    <li><a href="home.php">Back to Home</a></li>
	    				<li><a href="pet_info.php">Information on pets</a></li>
		    			<li><a href="useful_links.php">Useful links</a></li>
			    		<li><a href="about.php">About us</a></li>
				    	<li><a href="contact.php">Contact us</a></li>
                    </ul>
                </div>    
            </div>
			<div class="main">
				<div class="display-products">
					<div id="display-header">
						<h4>Products</h4>
					</div>
					<div id="main-display">
						<h6>All products</h6>
						<?php
							$catalogue = new DisplayProduct($dbconn);
							$catalogue->getFeaturedProducts("SELECT * FROM product;");
						
							foreach($catalogue->featuredProducts as $val){
								print_r(
									'<div class="home-product">
										<a href="product.php?id='.$val[0].'"><div class="prod-top-section>
											<h6 class="prod-title">'.$val[1].'</h6>
											<span class="prod-brand">by '.$val[2].'</span>
										</div>
										<div class="prod-bottom-section">	
											<img src='.$val[4].' alt="'.$val[1].'">	
											<span class="prod-price">£'.$val[3].'</span>
										</div></a>
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