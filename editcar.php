<?php
//Creates the cars object
$carsObject = new DatabaseTable($pdo, 'cars');
//If only submit button is pressed this is declared.
if (isset($_POST['submit'])) 
{
	//Unsets the submit.
	unset($_POST['submit']);
	//This updates the data of the form
	$carsObject->update($_POST, 'id');
		//This checks the error and if ther is not error the image is named and the last inseted id is godden which is set in a file.

	if ($_FILES['image']['error'] == 0) {
		$fileName = $pdo->lastInsertId() . '.jpg';
		move_uploaded_file($_FILES['image']['tmp_name'], '../productimages/' . $fileName);
	}
		//This checks the error and if ther is not error the image2 is named and the last inseted id is godden which is set in a file.

	if ($_FILES['image2']['error'] == 0) {
		$fileName = $pdo->lastInsertId() . 'b.jpg';
		move_uploaded_file($_FILES['image']['tmp_name'], '../productimages/' . $fileName);
	}
		//This checks the error and if ther is not error the image3 is named and the last inseted id is godden which is set in a file.

	if ($_FILES['image3']['error'] == 0) {
		$fileName = $pdo->lastInsertId() . 'c.jpg';
		move_uploaded_file($_FILES['image']['tmp_name'], '../productimages/' . $fileName);
	}
		//This checks the error and if ther is not error the image4 is named and the last inseted id is godden which is set in a file.

	if ($_FILES['image4']['error'] == 0) {
		$fileName = $pdo->lastInsertId() . 'd.jpg';
		//The file have been uploaded.
		move_uploaded_file($_FILES['image']['tmp_name'], '../productimages/' . $fileName);
	}
	//Product is saved.
	echo 'Product saved';
}
else 
{
	//Else carsObject of particular id is found and fetched and stored in car.
	$car = $carsObject->find('id', $_GET['id'])->fetch();


?>

	<h2>Edit Car</h2>

	<form action="editcar" method="POST" enctype="multipart/form-data">

		<input type="hidden" name="id" value="<?php echo $car['id']; ?>" />
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $car['name']; ?>" />

		<label>Description</label>
		<textarea name="description"><?php echo $car['description']; ?></textarea>

		<label>Price</label>
		<input type="text" name="price" value="<?php echo $car['price']; ?>" />
		
		<label>Old Price</label>
		<input type="text" name="oldprice" value="<?php echo $car['oldprice']; ?>" />
		
		<label>Engine Type</label>
		<input type="text" name="enginetype" value="<?php echo $car['enginetype']; ?>" />
		
		<label>Mileage</label>
		<input type="text" name="mileage" value="<?php echo $car['mileage']; ?>" />

		<label>Category</label>

		<select name="manufacturerId">
		<?php
			$stmt = $pdo->prepare('SELECT * FROM manufacturers');
			$stmt->execute();

			foreach ($stmt as $row) {
				if ($car['categoryId'] == $row['id']) {
					echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
				}
				else {
					echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';	
				}
				
			}

		?>

		</select>

		<label>Archieve</label>

		<select name="archieve">
		<?php

				if ($car['archieve'] == 'archieve') {
					echo '<option selected="selected" value="' . $car['archieve'] . '">' . $car['archieve'] . '</option>';
					echo '<option value="' . 'unarchieve' . '">' . 'unarchieve' . '</option>';
				}
				else {
					echo '<option selected="selected" value="' . $car['archieve'] . '">' . $car['archieve'] . '</option>';
					echo '<option value="' . 'archieve' . '">' . 'archieve' . '</option>';	
				}
				

		?>

		</select>


		<?php

			if (file_exists('../productimages/' . $car['id'] . '.jpg')) {
				echo '<img src="../productimages/' . $car['id'] . '.jpg" />';
			}
			if (file_exists('../productimages/' . $car['id'] . 'e.jpg')) {
				echo '<img src="../productimages/' . $car['id'] . 'e.jpg" />';
			}
			if (file_exists('../productimages/' . $car['id'] . 'f.jpg')) {
				echo '<img src="../productimages/' . $car['id'] . 'f.jpg" />';
			}
			if (file_exists('../productimages/' . $car['id'] . 'g.jpg')) {
				echo '<img src="../productimages/' . $car['id'] . 'g.jpg" />';
			}

		?>
		<label>Product image</label>

		<input type="file" name="image" />
		<input type="file" name="image2" />
		<input type="file" name="image3" />
		<input type="file" name="image4" />

		<input type="submit" name="submit" value="Save Product" />

	</form>

<?php
}