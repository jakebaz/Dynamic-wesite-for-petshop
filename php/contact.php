<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<title>Pet Supplies|Contact</title>
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
                <form action="" class="web-form" method="post">
                    <h1>Contact Us</h1>
                    <h2>Please enter your details and message below</h2>
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Name..." required>
                    <label for="userMail">Email:</label>
                    <input type="text" name="userMail" placeholder="Email address..." required>
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" placeholder="Subject...">
                    <label for="message">Message:</label>
                    <textarea rows="5" cols="50" name="message" placeholder="Message..." required></textarea>
					<button type="submit" name="submit" class="submit-button">Submit</button>
					<?php
					if(isset($_POST['submit'])){
						echo "<p class='thankyou_message'>Thank you for your message, we will be in touch within 24 hours</p>";
					}
					?>
				</form>
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

