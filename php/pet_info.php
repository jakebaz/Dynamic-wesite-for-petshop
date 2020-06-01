<?php
session_start();
?>

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
                        <li><a href="home.php">Back to home</a></li>
						<li><a href="catalogue.php">Catalogue</a></li>
						<li><a href="#">Useful links</a></li>
						<li><a href="about.php">About us</a></li>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="main">
				<article class="about-dogs">
					<h2>Dogs</h2>
					<p>There are many brands of dog food that you can buy for a range of product. By spending a bit more on a 
						a nicer brand of dog food you can provide your dog with a healthy diet, we recommend James Wellbeloved
						which comes in a range of flavours of wet and dry food. It is recommended by the ASPCA:
						<ul>
							<li>Puppies 8-12 weeks old should be eating 4 meals per day.</li>
							<li>Puppies 3-6 months old should be eating 3 meals per day.</li>
							<li>Puppies 6 months to one year old should be eating 1-2 meals a day.</li>
							<li>One meal a day is usually enough for dogs over 1 year old, however for larger dogs you can
								give 2 smaller meals.
							</li>
							<li>You can find out more about basic dog care <a href="https://www.aspca.org/pet-care/dog-care/general-dog-care">here.</a> </li>
						</ul>
					</p><br/>
					<p>Foods that are poisoness to dogs include: Chocolate, Soya, Caffeine, Onions, Alcohol,
						Mouldy foods, Grapes/raisins and many more. So becareful what 'human food' you allow your dog to have!</p>
				</article>
				<article class="about-cats">
					<h2>Cats</h2>
					<p>Cats do not demand much attention unlike dogs, although they do like a nice lap to sit on. You can let your cat out
						the house to get there exercise making them ideal pets for those who do not have time to walk a dog.
					</p><br/>
					<p>Cats also eat dry and wet food, which you can spend a little or a lot on. The more premium brands will provide your cat
						with a healthier diet, careful though, once they've gotten a taste for expensive food, they won't want to downgrade!
					</p><br/>
					<p>Grooming your cat not only keeps them from eating their dead fur, but is also good bonding. This is also a good time to check
						that your pet is healthy.
					</p><br/>
					<p>You can find many more tips for owning a cat at <a href="https://www.petsafe.net/learn/cats-101-basic-health-care-tips-to-keep-your-cat-healthy">petsafe.net</a></p>
				</article>
				<article class="about-rabbits">
					<h2>Rabbits & other small pets</h2>
					<p>Rabbits should eat about the size of itself in hay every day, which should take up most of their diet. The can also 
						eat a handful of a leafy green vegetable such as spinach, kale or herbs though these should be introduced slowly 
						if the rabbit has not eaten them before to ensure it does not give them an upset stomach. On top of this they can 
						eat a small bowl of pellets a day. Ensure they have access to clean water 24 hours a day. You can find more out 
						about rabbits at the <a href="https://www.rspca.org.uk/adviceandwelfare/pets/rabbits/diet/planner#:~:text=Rabbits%20need%20at%20least%20one,%2C%20or%20kiln%2Ddried%20grass.">RSPCA</a>
					</p><br/>
					<p>Guinea pigs have a very similar diet to rabbits. Fresh leafy greens and hay make up the bulk of their diet as they
						are herbivores. However it is not recommended that you buy they same dry food for your rabbits and guinea pigs, make sure
						that the food you buy is made for that specific animal.
					</p><br/>
					<p>Hamsters can eat more fresh food than rabbits and guinea pigs and do not really eat hay. Hamsters are not herbivores so it is
						okay to give them some protein occasionally, just a small amount of boiled egg will suffice. Find out more at 
						<a href="https://www.omlet.co.uk/guide/hamsters/feeding_your_hamster/what_do_hamsters_eat/#:~:text=Fresh%20food%2C%20consisting%20of%20fresh,at%20our%20Hamster%20Food%20List.">Omlet</a>
					</p>
				</article>
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