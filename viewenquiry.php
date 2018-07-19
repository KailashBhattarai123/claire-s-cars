
<h2>Enquiries</h2>

<?php
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>name</th>';
echo '<th style="width: 10%">email</th>';
echo '<th style="width: 10%">telephone</th>';
echo '<th style="width: 30%">enquiry</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '</tr>';

$enquiriesObject = new DatabaseTable($pdo, 'enquiries');
$enquiries= $enquiriesObject->findAll();

foreach ($enquiries as $enquiry) {
	echo '<tr>';
	echo '<td>' . $enquiry['name'] . '</td>';
	echo '<td>' . $enquiry['email'] . '</td>';
	echo '<td>' . $enquiry['telephone'] . '</td>';
	echo '<td>' . $enquiry['enquiry'] . '</td>';
	echo '<td><form method="post" action="deletecar">
	<input type="hidden" name="id" value="' . $enquiry['id'] . '" />
	<input type="submit" name="submit" value="Delete" />
	</form></td>';
	echo '</tr>';
}

echo '</thead>';
echo '</table>';
?>