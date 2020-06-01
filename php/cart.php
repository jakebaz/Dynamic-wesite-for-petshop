<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    session_start();
    include('classes.php');

    $item = new Order($dbconn);
    if(isset($_POST['prodID'])){
        $item->retrieveProduct();
        $item->addToCart();
    }

    if(isset($_POST['clear-cart'])){
        $item->clearCart();
    }

    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<title>Pet Supplies|Cart</title>
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
						<li><a href="#">Useful links</a></li>
						<li><a href="about.php">About us</a></li>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="main">
                <div class="cart-main">
                    <div id="display-header"></div>
                        <h1>My Cart</h1>
                    </div>
                    <div class="cart-products">
                        <?php
                            if(isset($_SESSION['cartArr'])){
                                foreach($_SESSION['cartArr'] as $k => $v){
                                    print_r('<div class="each-product style={background-color:#b8b8b8>
                                    <img src='.$item->eachProduct[0][4].'><br/>'.
                                    $item->eachProduct[0][0].'<br/>'.
                                    $item->eachProduct[0][1].'<br/>'.
                                    'Price: £'.$item->eachProduct[0][2].'<br/>
                                     </div>');

                                } 
                            } else{
                                echo '<h1>Your cart is empty</h1>'; 
                            }  
                        ?>    
                    </div>
                    <div class="order">
                        <form method="POST">
                            <input type="submit" name="clear-cart" value="Clear cart" id="clear-cart">
                            <input type="submit" name="place-order" value="Place order" id="add-to-cart-button">
                        </form>
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

