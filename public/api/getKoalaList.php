<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";
$sql = "SELECT s.sup_id, m.mem_name 'mem_name', s.sup_date, s.sup_plan, k.koala_name 'koala_name', s.sup_price, s.mem_id
FROM (tibamefe_cgd103g1.member m, tibamefe_cgd103g1.koala k) JOIN tibamefe_cgd103g1.support s ON s.mem_id = m.mem_id AND s.koala_id = k.koala_id
ORDER BY sup_id DESC;";

$koalas = $pdo->query($sql);
$koalaRows = $koalas->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($koalaRows);
?>
