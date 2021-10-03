<?php
	 $dsn = 'mysql:host=remotemysql.com;dbname=jRj0e5PdkS';
	 $request  = 'jRj0e5PdkS';
	 $pass = 'kjjgBKPnyw';
	// $dsn = 'mysql:host=localhost;dbname=recycle';
	// $request  = 'root';
	// $pass = '';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	);

	try {
		$connect = new PDO($dsn, $request , $pass, $option);
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e) {
		echo 'Failed To Connect' . $e->getMessage();
	}  
?>