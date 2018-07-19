<?php

//This is the declaration of the ovject manuObject.
$manuObject = new DatabaseTable($pdo, 'manufacturers');
//This checks weather the submit is set or not.
if (isset($_POST['submit'])) {
	//It unsets the submit button.
	unset($_POST['submit']);

	//Inserts the POST data.
	$manuObject->insert($_POST);
	//Manufacturer is added.
	echo 'Manufacturer added';
}
else 
{	
?>


		<h2>Add Manufacturer</h2>

		<form action="" method="POST">
			<label>Name</label>
			<input type="text" name="name" />


			<input type="submit" name="submit" value="Add Manufacturer" />

		</form>
		

	<?php
}