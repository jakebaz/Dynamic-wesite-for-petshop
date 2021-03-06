<?php
	session_start();
	include('../core/connect.php');
	include('classes.php');

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$id = preg_replace('#[^0-9]#i','', $_GET['id']);
	}

	$query = $dbconn->query("SELECT * FROM product WHERE productID ='$id';");
	$product = $query->fetch_assoc();
	if(empty($product)){
		echo 'Product does not exist';
		exit();
	} else{
		//get all product details
		$id = $product['productID'];
		$productName = $product['productName'];
		$productBrand = $product['productBrand'];
		$productDescription = $product['productDescription'];
		$stock = $product['stock'];
		$productCategory = $product['idCategory'];
		$price = $product['price'];
		$image = $product['productImage'];
		$animalCategory = $product['idAnimal'];
	} 

	$item = new Order($dbconn);
	if(isset($_POST['prodID'])){
		$itemArray = array();
        $item->retrieveProduct();
		$item->addToCart($_POST['prodID']);
		
		if(isset($_POST['delete'])){
			$sql = $dbconn->query("DELETE FROM product WHERE productID = ".$_GET['id'].";");
			$sqlCheck = $dbconn->query("SELECT * FROM product WHERE productID = ".$_GET['id'].";");
			$sqlCheckAssoc = $sqlCheck->fetch_assoc();
			if (empty($sqlCheckAssoc)){
				echo '<div class="item-deleted">Item has been removed from the database</div>';
			}
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">
<head>
	<title>Pet Supplies|Product</title>
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
						<li><a href="home.php">Back to Home</a></li>
						<li><a href="pet_info.php">Information on pets</a></li>
						<li><a href="useful_links.php">Useful links</a></li>
						<li><a href="about.php">About us</a></li>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
				</div>
			</div>
            <div class="main-product">
                <div class="product-left">  
					<img src="<?php echo $image;?>" alt="product image">                 
                    <!--<?php echo $image?> -->
                </div>
                <div class="product-right">
                    <h3><?php echo $productName;?></h3>
                    <p>by <?php echo $productBrand;?></p>
                    <p>No reviews yet</p>
                    <div class="buy-section">

						<form method="POST" class="add-to-cart-form">
							<h6><?php echo '£'.$price;?></h6>
							<input type="hidden" name="prodID" value="<?php echo $id?>" id="prodID"> <!--pass product id to the form without displaying anything on screen-->
							<?php 
							if($_SESSION['loggedInUser'] == 'admin'){
								echo '<input type="submit" name="delete" value="Delete" id="delete-button">';
							}

							if($stock >= 1){
								echo '<input type="submit" name="button" value="Add to cart" id="add-to-cart-button">';
								echo '<p>In stock: '.$stock.'</p>';
								} else{
									echo '<p>Out of stock</p>';
								} 
								if(isset($_POST['prodID'])){
									if($item->addToCart($dbconn) == null){
										echo '<div class="add-to-cart-error">This product is already in your cart</div>';
									} else{
										echo '<div class="add-to-cart-success">Item added to basket</div>';
									}
								}?>
						</form>	  
                    </div>
                    <div class="product-description">
						<h6>Description</h6>
                        <p><?php echo $productDescription?></p>
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