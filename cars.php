<section class="right">
	
	<?php
	
	if (isset($_GET['id']))
		echo('<h1>' . $_GET['name'] . ' cars</h1>');
	else
		echo('<h1>Our cars</h1>');
	
	?>
<ul class="cars">


<?php

	$carsObj = new DatabaseTable($pdo, "cars");
	$manuObj = new DatabaseTable($pdo, 'manufacturers');
if (isset($_GET['id']))
	
	$cars=$carsObj->find('manufacturerId', $_GET['id']);
else
	$cars = $carsObj->findAll();

$cars->execute();


foreach ($cars as $car) {

	if ($car['archieve'] != 'archieve') {
		
	$manu = $manuObj->find('id', $car['manufacturerId']);
	$manufacturer = $manu->fetch();
	echo '<li>';

	if (file_exists('images/cars/' . $car['id'] . '.jpg')) 
	{
		echo '<a href="images/cars/' . $car['id'] . '.jpg"><img src="images/cars/' . $car['id'] . '.jpg" /></a>';
	}

	if (file_exists('images/cars/' . $car['id'] . 'b.jpg')) 
	{
		echo '<a href="images/cars/' . $car['id'] . 'b.jpg"><img src="images/cars/' . $car['id'] . 'b.jpg" /></a>';
	}

	if (file_exists('images/cars/' . $car['id'] . 'c.jpg')) 
	{
		echo '<a href="images/cars/' . $car['id'] . 'c.jpg"><img src="images/cars/' . $car['id'] . 'c.jpg" /></a>';
	}

	if (file_exists('images/cars/' . $car['id'] . 'd.jpg')) 
	{
		echo '<a href="images/cars/' . $car['id'] . 'd.jpg"><img src="images/cars/' . $car['id'] . 'd.jpg" /></a>';
	}

	echo '<div class="details">';
	echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
	echo '<h3>£' . $car['price'] . '</h3>';
	echo '<p>Old Price: ' . $car['oldprice'] . '</p>';
	echo '<p>Engine Type: ' . $car['enginetype'] . '</p>';
	echo '<p>Mileage: ' . $car['mileage'] . '</p>';
	echo '<p>' . $car['description'] . '</p>';

	echo '</div>';
	echo '</li>';
}
}

?>

</ul>

</section>
