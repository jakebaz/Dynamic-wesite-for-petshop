<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<title>Pet Supplies|Register</title>
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
					<a href="login_form.php">Login</a>
				</div>	
			</div>
			<div class="left-pane">
				<div class="navigation">
					<ul>
						<li><a href="catalogue.php">Catalogue</a></li>
						<li><a href="pet_info.php">Information on pets</a></li>
						<li><a href="#">Useful links</a></li>
						<li><a href="about.php">About us</a></li>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="main">
                <div class="web-form">
                    <form action="register.php" method="POST" action="#" id="register-form">
                        <h1>Register</h1>
						<p>Email address:</p>
                        <input type="text" name="email" placeholder="Email address..." required>
                        <p>Username:</p>
                        <input type="text" name="username" placeholder="Username..." required>
                        <p>Password:</p>
                        <input type="password" name="password" placeholder="Password..." required>
						<p>Confirm password:</p>
                        <input type="password" name="password-confirm" placeholder="Confirm password..." required>
                        <p>First name:</p>
                        <input type="text" name="firstname" placeholder="First name..." required>
                        <p>Surname:</p>
                        <input type="text" name="surname" placeholder="Surname..." required>
                        <br/>
						<button type="submit" name="submit-button" class="submit-button">Register</button>
						<br/>
						<a class="web-form" href="login_form.php" id="login-link">Already have an account? Sign in</a>
					</form>
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