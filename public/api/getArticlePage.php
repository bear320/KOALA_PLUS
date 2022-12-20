<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

$newsId = $_GET['newsId'];
$sql = "select * from tibamefe_cgd103g1.news where news_id={$newsId}";


$news = $pdo->query($sql);
$newsRows = $news->fetch(PDO::FETCH_ASSOC);

echo json_encode($newsRows);           
?>