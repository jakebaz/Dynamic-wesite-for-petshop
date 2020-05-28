<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pet Supplies|Product</title>
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
            <div class="main-product">
                <div class="product-left">                    
                    <img src="../images/Logo.png" alt="Placeholder Image">
                </div>
                <div class="product-right">
                    <h3>Product Name</h3>
                    <p>by Brand Name</p>
                    <p>No reviews yet</p>
                    <div class="buy-section">
                        <h6>£12.99</h6>
                        <button>Add to cart</button>
                        <p>in/out of stock</p>
                        
                    </div>
                    <div class="product-description">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore provident eaque rem molestiae animi facilis unde necessitatibus natus? Voluptates, recusandae. Tenetur placeat nam ea voluptates, nemo eligendi excepturi tempora dolorum!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</body>
</html>