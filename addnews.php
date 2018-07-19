<?php

//This is the declaration of newsObject object.
$newsObject = new DatabaseTable($pdo, 'news');
//If the submit button is set.
if (isset($_POST['submit'])) 
{
	//This unsets the submit for the form.
	unset($_POST['submit']);
	//This inserts the data of POST into the database.
	$stmt = $newsObject->insert($_POST);

		//This checks the error and if ther is not error the image1 is named and the last inseted id is godden which is set in a file.

	if ($_FILES['image1']['error'] == 0) {
		$fileName = $pdo->lastInsertId() . 'news.jpg';
		//This uploads the image to the file.
		move_uploaded_file($_FILES['image1']['tmp_name'], '../images/cars/' . $fileName);
	}
	
	//Add the news.
	echo 'News added';
}
else 
{
		?>


			<h2>Add NEws</h2>

			<form action="addnews" method="POST" enctype="multipart/form-data">
				<label>Title</label>
				<input type="text" name="title" />

				<label>Special Offers</label>
				<input type="text" name="special_offer" />

				<label>Bank Holiday</label>
				<input type="date" name="bank_holiday" />

				<label>Closing Date</label>
				<input type="date" name="closing_time" />

				<label>Posted By</label>
				<input type="text" name="posted_by" />
				
				<label>Image</label>

				<input type="file" name="image1" />

				<input type="submit" name="submit" value="Add News" />

			</form>
			

		
		<?php
}