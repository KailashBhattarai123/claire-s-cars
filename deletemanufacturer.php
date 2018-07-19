<?php
//This daclares the object of manufacturers.
$manufacturerObject = new DatabaseTable($pdo, 'manufacturers');
//This deletes the data of the manufacturer with given id.
$manufacturer= $manufacturerObject->delete('id', $_POST['id']); 
//This prints that the manufacturer has been deleted.
echo 'Manufacturer deleted';
?>