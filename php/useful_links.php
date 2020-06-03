<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">
<head>
<title>Pet Supplies|Useful links</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="pets, pet shop, pet supplies"/>
	<meta name="author" content="Jacob Bazin"/>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<?php
		session_start();
	?>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pet Supplies|Useful Links</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
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
                        <li><a href="home.php">Back to home</a></li>
						<li><a href="catalogue.php">Catalogue</a></li>
						<li><a href="pet_info.php">Information on pets</a></li>
						<li><a href="about.php">About us</a></li>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="main">
				<div id="useful-links">
					<h1>Useful Links for pet owners</h1>
					<article>
						<ul>
							<li><a href="https://www.yourdogslife.co.uk/resources/useful-links/">Your Dogs Life</a></li>
							<li><a href="https://www.northeastfamilyfun.co.uk/2017/09/11-woodland-walks-north-east-autumn.html">Places to walk your dog</a></li>
							<li><a href="https://www.rspca.org.uk/">RSPCA</a></li>
							<li><a href="https://icatcare.org/advice/thinking-of-getting-a-cat/">Internation Cat Care</a></li>
							<li><a href="https://www.bluecross.org.uk/pet-advice/caring-your-rabbit">Bluecross</a></li>
							<li><a href="https://www.kaytee.com/learn-care/ask-the-small-animal-experts/9-hamster-care-tips-for-beginners">Kaytee - Hamster care for beginners</a></li>
							<li><a href="https://www.petsathome.com/shop/en/pets/pet-talk/pet-care-reptile-snakes">Pets At Home - Reptile Care</a></li>
						</ul>
					</article>
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