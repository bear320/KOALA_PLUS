<?php 
	$dbname = "tibamefe_chd103g1";
	$user = "root";
	$password = "c9411741";
	$port = 3306;

	$dsn = "mysql:host=localhost;port=$port;dbname=$dbname;charset=utf8";

	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
	//$options = array(3=>2, 8=>0);
	
	//建立pdo物件
	$pdo = new PDO($dsn, $user, $password, $options);	

?>