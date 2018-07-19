
<h2>Cars</h2>

<a class="new" href="addcar">Add new car</a>

<?php
//This sets the table frame.
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Model</th>';
echo '<th style="width: 10%">Price</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '</tr>';

//The declaration of car object.
$carsObject = new DatabaseTable($pdo, 'cars');
//Find all the data from the cars object.
$cars= $carsObject->findAll();

//For each cars this prints the views.
foreach ($cars as $car) {
			echo '<tr>';
			echo '<td>' . $car['name'] . '</td>';
			echo '<td>£' . $car['price'] . '</td>';
			echo '<td><a style="float: right" href="editcar?id=' . $car['id'] . '">Edit</a></td>';
			echo '<td><form method="post" action="deletecar">
			<input type="hidden" name="id" value="' . $car['id'] . '" />
			<input type="submit" name="submit" value="Delete" />
			</form></td>';
			echo '</tr>';
}
//Ends the table.
echo '</thead>';
echo '</table>';
?>