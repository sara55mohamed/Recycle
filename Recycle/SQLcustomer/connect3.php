<?php
        //  $dsn = 'mysql:host=localhost;dbname=recycle';
        //  $customer  = 'root';
        //  $pass = '';
	 $dsn = 'mysql:host=remotemysql.com;dbname=jRj0e5PdkS';
	 $customer  = 'jRj0e5PdkS';
	 $pass = 'kjjgBKPnyw';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	);

	try {
		$connect = new PDO($dsn, $customer , $pass, $option);
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e) {
		echo 'Failed To Connect' . $e->getMessage();
	}  
?>