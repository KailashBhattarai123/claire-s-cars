<?php
session_start()
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../styles.css"/>abc
		<title><?php echo $title ?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: Closed</p>
			</aside>
			<img src="../images/logo.png"/>

		</section>
	</header>
		
	<nav>
		<ul>
			<li><a href="../">Home</a></li>
			<li><a href="../cars">Showroom</a></li>
			<li><a href="../about">About Us</a></li>
			<li><a href="../contact">Contact us</a></li>
			<li><a href="../careers">Clarie's Career</a></li>
			<li><a href="./news">View News</a></li>

		</ul>
	</nav>

	<img src="../images/randombanner.php"/>
	<main class="admin">
		
	<?php
	if (isset($_POST['password'])) 
	{
		if ($_POST['password'] == 'opensesame') {
			$_SESSION['loggedin'] = true;	
		}
	}


	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	?>

	<section class="left">
		<ul>
			<li><a href="./manufacturers">Manufacturers</a></li>
			<li><a href="./cars">Cars</a></li>
			<li><a href="./addnews">Add News</a></li>
			<li><a href="./viewenquiry">View Enquiry</a></li>

		</ul>
	</section>

	<?php echo $data ?>
	
	<?php
	}

	else {
		?>
		<h2>Log in</h2>

		<form action="index.php" method="post" style="padding: 40px">

			<label>Enter Password</label>
			<input type="password" name="password" />

			<input type="submit" name="submit" value="Log In" />
		</form>
	<?php
	}
	?>


	</main>

	<footer>
		&copy; Claire's Cars 2018
	</footer>
</body>
</html>
