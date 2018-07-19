
<h2>News</h2>


<?php
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>title</th>';
echo '<th style="width: 20%">Special Offer</th>';
echo '<th style="width: 10%">Closing time</th>';
echo '<th style="width: 10%">Posted By</th>';

echo '</tr>';

$newsObject = new DatabaseTable($pdo, 'news');
$news= $newsObject->findAll();

foreach ($news as $newspart) {
	echo '<tr>';
	echo '<td>' . $newspart['title'] . '</td>';
	echo '<td>' . $newspart['special_offer'] . '</td>';
	echo '<td>' . $newspart['closing_time'] . '</td>';
	echo '<td>' . $newspart['posted_by'] . '</td>';
	
	echo '</tr>';
}

echo '</thead>';
echo '</table>';
?>