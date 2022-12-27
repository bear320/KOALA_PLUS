<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";

$sql = "SELECT SUM(sup_price) 'sum' FROM tibamefe_cgd103g1.support WHERE sup_date >=  DATE_SUB(CURDATE(), INTERVAL 6 MONTH)";

$supSum = $pdo->query($sql);
$supSumRow = $supSum->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($supSumRow);
?>