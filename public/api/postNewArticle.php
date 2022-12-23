<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
    require_once("./connect_cgd103g1.php");

$sql = "INSERT INTO tibamefe_cgd103g1.news VALUES( null, :news_img, :news_title, :news_content, :news_date, :news_category, :news_status, :news_star )";

$newArticle = $pdo->prepare($sql);
$newArticle->bindValue(":news_img", $_POST["news_img"]);
$newArticle->bindValue(":news_title", $_POST["news_title"]);
$newArticle->bindValue(":news_content", $_POST["news_content"]);
$newArticle->bindValue(":news_date", $_POST["news_date"]);
$newArticle->bindValue(":news_category", $_POST["news_category"]);
$newArticle->bindValue(":news_status", $_POST["news_status"]);
$newArticle->bindValue(":news_star", $_POST["news_star"]);
$newArticle->execute();

$msg = "已完成";
} catch (PDOException $e) {
    $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
}

$result = ["msg" => $msg];
echo json_encode($result);

?>