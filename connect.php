<?php

	$localhost = '127.0.0.1';
	$username = 'root';
	$password = '';
	$dbname = 'kars';

	$pdo = new PDO('mysql:dbname=' . $dbname . ';host=' . $localhost, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);