<?php

require '../databases/connect.php';
require '../databases/databaseTable.php';

function loadTemplate($fname, $fcontent)
{
	extract($fcontent); 
	ob_start();
	require $fname;
	return ob_get_clean();
}

if (isset($_GET['template']))
{
	$variable = [
		'pdo' => $pdo
	];

	$data = loadTemplate('../template/admin/' . $_GET['template'] . '.php', $variable);
	$title = 'Claire\'s Cars - ' . $_GET['template'];
}
else
{
	$title =  'Claire\'s Antiques - Home';
	$data = loadTemplate('../template/admin/index.php', []); 
}

$datatitle = [
	'title' => $title,
	'data' => $data,
	'pdo' => $pdo
];

echo loadTemplate('../template/admin/template.php', $datatitle);

?>