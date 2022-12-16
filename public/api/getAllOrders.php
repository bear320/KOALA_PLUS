<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

// $sql1 = "select * from tibamefe_cgd103g1.orders;";

$sql = "SELECT o.*, m.mem_id
FROM tibamefe_cgd103g1.orders o
JOIN tibamefe_cgd103g1.member m ON o.mem_id = m.mem_id
ORDER BY ord_id DESC;";

$orderlist = $pdo->query($sql);
$orderlistRows = $orderlist->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($orderlistRows);       
?>






