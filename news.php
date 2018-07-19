<section class="right">
	
	<?php
	
		echo('<h1>Our News</h1>');
	
	?>
<ul class="cars">


<?php

	$newsObj = new DatabaseTable($pdo, "news");

	$news = $newsObj->findAll();

$news->execute();

foreach ($news as $newspart) {
	echo '<li>';

	if (file_exists('images/cars/' . $newspart['id'] . 'news.jpg')) 
	{
		echo '<a href="images/cars/' . $newspart['id'] . 'news.jpg"><img src="images/cars/' . $newspart['id'] . 'news.jpg" /></a>';
	}

	echo '<div class="details">';
	echo '<h2>' . $newspart['title'] . '</h2>';
	echo '<h3>' . $newspart['special_offer'] . '</h3>';
	echo '<p>Bank holiday: ' . $newspart['bank_holiday'] . '</p>';
	echo '<p>Closing time: ' . $newspart['closing_time'] . '</p>';
	echo '<p>Posted By: ' . $newspart['posted_by'] . '</p>';
	echo '</div>';
	echo '</li>';
}

?>

</ul>

</section>
