<?php

	$manuObject = new DatabaseTable($pdo, 'manufacturers');
	$manu = $manuObject->findAll();

	$manu->execute();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="./styles.css"/>
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
			<img src="./images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="./">Home</a></li>
			<li><a href="./cars">Showroom</a></li>
			<li><a href="./about">About Us</a></li>
			<li><a href="./contact">Contact us</a></li>
			<li><a href="./careers">Clarie's Career</a></li>
			<li><a href="./news">View News</a></li>

		</ul>
	</nav>
		<img src="./images/randombanner.php"/>
	<main class="admin">

	<section class="left">
		<ul>
			<?php
				foreach ($manu as $m)
				{
					echo('<li><a href="./cars?id=' . $m['id'] . '&name=' . $m['name'] . '">' . $m['name'] . '</a></li>');
				}
			?>

		</ul>
	</section>

	<?php echo $data ?>

</ul>

</section>
	</main>


	<footer>
		&copy; Claire's Cars 2018
	</footer>
</body>
</html>
