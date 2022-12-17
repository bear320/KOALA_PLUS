<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";

$limit = 10;
$page = $_GET["page"] - 1;
$offset = $page * $limit;

$sql1 = "SELECT koala_id, koala_name, koala_sex, koala_dob, TIMESTAMPDIFF(YEAR, koala_dob, CURDATE()) 'koala_age', koala_listed
FROM koala
ORDER BY koala_id ASC LIMIT {$limit} OFFSET {$offset};";
$sql2 = "SELECT count(*) AS 'koala_count' FROM tibamefe_cgd103g1.koala";

$koalas = $pdo->query($sql1);
$koalaRows = $koalas->fetchAll(PDO::FETCH_ASSOC);
$koalaCount = $pdo->query($sql2);
$koalaCountRow = $koalaCount->fetchColumn();
echo json_encode(["koalas" => $koalaRows, "koalaCount" => $koalaCountRow]);
?>
