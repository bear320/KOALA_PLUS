<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("./connect_cgd103g1.php");

$sql = "update news set news_img = :news_img,
                        news_title = :news_title,
                        news_content = :news_content,
                        news_date = :news_date,
                        news_category = :news_category,
                        news_status = :news_status,
						news_id = :news_id,
					where news_id = :news_id";

$news = $pdo->prepare($sql);
$news->bindValue(":news_img", $_POST["news_img"]);
$news->bindValue(":news_title", $_POST["news_title"]);
$news->bindValue(":news_content", $_POST["news_content"]);
$news->bindValue(":news_date", $_POST["news_date"]);
$news->bindValue(":news_category", $_POST["news_category"]);
$news->bindValue(":news_status", $_POST["news_status"]);
$news->execute();

?>