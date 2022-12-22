<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";

$sql1 =
    "UPDATE koala SET koala_sum = (SELECT SUM(sup_price) FROM support WHERE koala.koala_id = support.koala_id);";
$sql2 =
    "UPDATE koala SET koala_sum_this_month = (SELECT IFNULL(SUM(sup_price), 0) FROM support WHERE MONTH(sup_date) = MONTH(CURRENT_DATE) AND koala.koala_id = support.koala_id);";
$sql3 =
    "UPDATE koala SET koala_sum_last_month = (SELECT IFNULL(SUM(sup_price), 0) FROM support WHERE YEAR(sup_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(sup_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) AND koala.koala_id = support.koala_id);";
$sql4 =
    "UPDATE koala SET koala_sum_the_month_before_last = (SELECT IFNULL(SUM(sup_price), 0) FROM support WHERE YEAR(sup_date) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH) AND MONTH(sup_date) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH) AND koala.koala_id = support.koala_id);";
$sql5 =
    "SELECT koala_id, koala_sum_the_month_before_last, koala_sum_last_month, koala_sum_this_month FROM `koala` WHERE koala_id <> 2001;";

$adoptStat = $pdo->query($sql1);
$adoptStat = $pdo->query($sql2);
$adoptStat = $pdo->query($sql3);
$adoptStat = $pdo->query($sql4);
$adoptStat = $pdo->query($sql5);
$adoptStatRows = $adoptStat->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($adoptStatRows, JSON_NUMERIC_CHECK);
?>
