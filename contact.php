<?php

$contactObject = new DatabaseTable($pdo, 'enquiries');
if (isset($_POST['submit'])) {
	unset($_POST['submit']);

	$contactObject->insert($_POST);
	echo 'Contacts added.';
}
else 
{	
?>


		<h2>Add Contacts</h2>

		<form action="contact" method="POST">
			<label>Name</label>
			<input type="text" name="name" />

			<label>Email</label>
			<input type="text" name="email" />

			<label>telephone</label>
			<input type="text" name="telephone" />

			<label>Enquiry</label>
			<input type="text" name="enquiry" />

			<input type="submit" name="submit" value="Add Contacts" />

		</form>
		

	<?php
}