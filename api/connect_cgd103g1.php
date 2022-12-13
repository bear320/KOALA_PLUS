<?php
    $dbname = "tibamefe_cgd103g1";
	$user = "root";
	$password = "relax0913";
	$port="3306";
	$dsn = "mysql:host=localhost;port=$port;dbname=$dbname;charset=utf8";

	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);


	//建立pdo物件
	$pdo =new PDO($dsn,$user,$password,$options);
?>