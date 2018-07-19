<?php

//This is the declaration of carObject.
$carObject = new DatabaseTable($pdo, 'cars');
//If only submit is set this condition is executed.
if (isset($_POST['submit'])) 
{
	//This unsets the submit POST.
	unset($_POST['submit']);
	//Declaration of statmetnt and insertion of POST data.
	$stmt = $carObject->insert($_POST);

	//This checks the error and if ther is not error the image is named and the last inseted id is godden which is set in a file.
	if ($_FILES['image1']['error'] == 0) {
		$fileName = $pdo->lastInsertId() . '.jpg';
		move_uploaded_file($_FILES['image1']['tmp_name'], '../images/cars/' . $fileName);
	}
		//This checks the error and if ther is not error the image2 is named and the last inseted id is godden which is set in a file.

	if ($_FILES['image2']['error'] == 0) {
		$fileName = $pdo->lastInsertId() . 'b.jpg';
		move_uploaded_file($_FILES['image2']['tmp_name'], '../images/cars/' . $fileName);
	}
		//This checks the error and if ther is not error the image3 is named and the last inseted id is godden which is set in a file.

	if ($_FILES['image3']['error'] == 0) {
		$fileName = $pdo->lastInsertId() . 'c.jpg';
		move_uploaded_file($_FILES['image3']['tmp_name'], '../images/cars/' . $fileName);
	}
		//This checks the error and if ther is not error the image4 is named and the last inseted id is godden which is set in a file.

	if ($_FILES['image4']['error'] == 0) {
		$fileName = $pdo->lastInsertId() . 'd.jpg';
		move_uploaded_file($_FILES['image4']['tmp_name'], '../images/cars/' . $fileName);
	}

	//This shows that the car is adde.
	echo 'Car added';
}
else 
{
		?>


			<h2>Add Car</h2>

			<form action="addcar" method="POST" enctype="multipart/form-data">
				<label>Car Model</label>
				<input type="text" name="name" />

				<label>Price</label>
				<input type="text" name="price" />

				<label>Category</label>
				<select name="manufacturerId">
				<?php
					$stmt = $pdo->prepare('SELECT * FROM manufacturers');
					$stmt->execute();

					foreach ($stmt as $row) {
						echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
					}

				?>

				</select>

				<label>Description</label>
				<textarea name="description"></textarea>
				
				<label>Old Price</label>
				<input type="text" name="oldprice" />
				
				<label>Engine Type</label>
				<input type="text" name="enginetype" />
				
				<label>Mileage</label>
				<input type="text" name="mileage" />

				<label>Archieve</label>
				<select name="archieve" value="unarchieve">
						<option value="archieve">archieve</option>';
						<option value="unarchieve">unarchieve</option>';
				</select>
				

				
				<label>Image</label>

				<input type="file" name="image1" />
				<input type="file" name="image2" />
				<input type="file" name="image3" />
				<input type="file" name="image4" />

				<input type="submit" name="submit" value="Add Car" />

			</form>
			

		
		<?php
}