  <section class="right">

	<h1>Mercedes Cars</h1>

<ul class="cars">


<?php
	$carsObj = new DatabaseTable($pdo, 'cars');
	$manuObj = new DatabaseTable($pdo, 'manufacturers');

	$cars = $carsObj->find('manufacturerId', 3);
	

$cars->execute();


foreach ($cars as $car) {
	$manu = $manuObj->find('id', $car['manufacturerId']); 	
	$manufacturer = $manu->fetch();
	echo '<li>';

	if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
		echo '<a href="images/cars/' . $car['id'] . '.jpg"><img src="images/cars/' . $car['id'] . '.jpg" /></a>';
	}

	echo '<div class="details">';
	echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
	echo '<h3>£' . $car['price'] . '</h3>';
	echo '<p>' . $car['description'] . '</p>';

	echo '</div>';
	echo '</li>';
}

?>

</ul>

</section>