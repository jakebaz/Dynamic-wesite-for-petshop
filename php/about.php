<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<title>Pet Supplies|Home</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="pets, pet shop, pet supplies"/>
	<meta name="author" content="Jacob Bazin"/>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
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
					}
					?>
                    <a href="about.php">About</a>
                    <a href="contact.php">Contact us</a>
					<a href="#">Shopping Basket</a>
					
				</div>	
			</div>
			<div class="navigation">
				<ul>
					<li><a href="#">Dogs</a></li>
					<li><a href="#">Cats</a></li>
					<li><a href="#">Small pets</a></li>
					<li><a href="#">Fish</a></li>
					<li><a href="#">Reptiles</a></li>
					<li><a href="#">Birds</a></li>
				</ul>
			</div>
			<div class="about-main">
				<div class="top-section">
                	<h1>About Us!</h1>
                	<p>We are a new company who loves animals! We aim to be able to give you all of your pet supplies at competitive prices.</p>
				</div>
				<div class="left-main">
					<p>Online we have a great selection of pet food, toys and accessories for many different animals including:</p>
                	<ul>
                	    <li>Cats</li>
                	    <li>Dogs</li>
                	    <li>Rabbits</li>
                	    <li>Birds</li>
                	    <li>Fish</li>
						<li>Reptiles</li>
						<li>And Many More!</li>
					</ul>
					<br>
					<p>Or why not visit us at one of our branches in various locations throughout the North East located in:
                	Newcastle, Sunderland, Durham, Darlington and Middlesbrough. We even have small pets for sale and adoption
					including Rabbits, guinea pigs and Rats.</p>
				</div>
				<h3>Meet Our Clientele</h3>
					<div class="about_images">
						
						<div class="imgs-left">
							<figure>
								<img src="../images/about_images/dexter.JPG" alt="Smiling dog" id="dexter">
								<figcaption>Dexter</figcaption>
							</figure>
							<figure>
								<img src="../images/about_images/sooty.PNG" alt="Cat relaxing in the sun" id="sooty">
								<figcaption>Sooty</figcaption>
							</figure>
						</div>
						<div class="imgs-right">
							<figure>
								<img src="../images/about_images/albert.jpeg" alt="Rabbit looking at the camera" id="albert">
								<figcaption>Albert</figcaption>
							</figure>
							<figure>
								<img src="../images/about_images/leila.JPG" alt="Rabbit enjoying the sunset" id="albert">
								<figcaption>Leila</figcaption>
							</figure>
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
