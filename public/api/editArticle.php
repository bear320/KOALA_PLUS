<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
    require_once("./connect_cgd103g1.php");

$sql = "UPDATE tibamefe_cgd103g1.news 
                    SET news_img = :news_img,
                        news_title = :news_title,
                        news_content = :news_content,
                        news_date = :news_date,
                        news_category = :news_category,
                        news_status = :news_status
					WHERE news_id = :news_id;";

$updateNews = $pdo->prepare($sql);
$updateNews->bindValue(":news_id", $_POST["news_id"]);
$updateNews->bindValue(":news_img", $_POST["news_img"]);
$updateNews->bindValue(":news_title", $_POST["news_title"]);
$updateNews->bindValue(":news_content", $_POST["news_content"]);
$updateNews->bindValue(":news_date", $_POST["news_date"]);
$updateNews->bindValue(":news_category", $_POST["news_category"]);
$updateNews->bindValue(":news_status", $_POST["news_status"]);
$updateNews->execute();
$msg = "資料已更新";
} catch (PDOException $e) {
    $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
}

$result = ["msg" => $msg];
echo json_encode($result);

?>