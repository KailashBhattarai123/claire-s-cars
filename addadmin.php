<?php
//This is the object for the database insertion.
$adminObject = new DatabaseTable($pdo, 'admin');
//If submit is set then only this code is executed.
if (isset($_POST['submit'])) {
	//This unsets the submit POSt.
	unset($_POST['submit']);

	//This inserts the admin object
	$adminObject->insert($_POST);
	//Admin added
	echo 'Admin added';
}
else
{	
?>


		<h2>Add Admin</h2>

		<form action="" method="POST">
			<label>User Name</label>
			<input type="text" name="username" />

			<label>Password</label>
			<input type="text" name="password" />
			<input type="submit" name="submit" value="Add Admin" />

		</form>
		

	<?php
}