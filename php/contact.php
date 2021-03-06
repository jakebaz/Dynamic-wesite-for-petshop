<?php
	session_start();

	$msg = '';
	$msgClass = '';

	if(isset($_POST['submit'])){ //get form data when submit button is pressed
		$name = $_POST['name'];
		$email = $_POST['userMail'];
		$message = $_POST['message'];

		//send the email - THIS WILL ONLY WORK IF A MAIL SERVER IS SETUP. WILL NOT WORK ON LOCALHOST.
		if(empty($name)||empty($email)||empty($message)){ //if user has not filled out all fields
			$msgClass = 'contact-error';
			$msg = 'Please fill in all of the fields'; //error message for use in html body
		} else{
			//check email exists
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				$msgClass = 'contact-error';
				$msg = 'Could not find the email address provided.';
			} else{
				//set mail parameters
				$sendTo = 'bh56xo@student.sunderland.ac.uk'; //change this to your own email if you would like to test it
				$subject = 'Contact Request';
				$body = '<h2>Contact Request</h2>
						<h4>Name: </h4><br/>
						<p>'.$name.'</p>
						<h4>Email Address: </h4>
						<p>'.$email.'</p>
						<h4>Message: </h4>
						<p>'.$message.'</p>';
				
				//email headers:
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

				//addition headers - senders details
				$headers .= "From: " . $name . "<" . $email . ">" . "\r\n";

				if (mail($sendTo, $subject, $body, $headers)){
					$msgClass = 'thankyou_message';
					$msg = 'Thank you for your message, we will be in touch within 24 hours'; // WILL ONLY GET HERE IF MAIL SERVER IS SET UP
				} else{
					$msgClass = 'contact-error';
					$msg = 'Email could not be sent.';
				}
			}
		}
	}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<title>Pet Supplies|Contact</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="pets, pet shop, pet supplies"/>
	<meta name="author" content="Jacob Bazin"/>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
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
						<li><a href="pet_info.php">Information on pets</a></li>
						<li><a href="useful_links.php">Useful links</a></li>
						<li><a href="about.php">About us</a></li>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="main">        
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="web-form" method="post">
                    <h1>Contact Us</h1>
                    <h2>Please enter your details and message below</h2>
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Name..." value="<?php echo isset($_POST['name']) ? $name : '';?>" required>
                    <label for="userMail">Email:</label>
                    <input type="text" name="userMail" placeholder="Email address..." value="<?php echo isset($_POST['userMail']) ? $email : '';?>" required>
                    <label for="message">Message:</label>
                    <textarea rows="5" cols="50" name="message" placeholder="Message..." value="<?php echo isset($_POST['message']) ? $message : '';?>" required></textarea>
					<button type="submit" name="submit" class="submit-button">Submit</button>
					<?php if ($msg != ''): ?>
						<div class="<?php echo $msgClass;?>"><?php echo $msg; ?></div>
					<?php endif; ?>	
				 
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