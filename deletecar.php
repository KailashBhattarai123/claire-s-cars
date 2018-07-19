<?php
//This declares the carsObject.
	$carsObject = new DatabaseTable($pdo, 'cars');
	//This deletes the carsObject.
	$cars= $carsObject->delete('id', $_POST['id']);
	//Car is deleted and the data is displayed. 
	echo 'Car deleted';
?>