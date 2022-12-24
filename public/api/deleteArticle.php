<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

	try {
		require_once("./connect_cgd103g1.php");

		$sql = "DELETE FROM news WHERE news_id = :news_id";

		$news = $pdo->prepare($sql);
		$news->bindValue(":news_id", $_POST["news_id"]);
		$news->execute();					
		$msg = "已刪除文章";
	
	} catch (PDOException $e) {
		$msg = "error_line: ".$e->getLine().", error_msg: ".$e->getMessage();
	}	


$result= ["msg" => $msg];
echo json_encode($result);

?>   