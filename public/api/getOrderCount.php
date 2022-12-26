<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

$sql1 = "SELECT COUNT(*) 'all' FROM tibamefe_cgd103g1.orders WHERE ord_ship='0'";
$sql2 = "SELECT COUNT(*) 'm' FROM tibamefe_cgd103g1.orders WHERE ord_date BETWEEN DATE_FORMAT(CURDATE(), '%Y-%m-01') AND CURDATE()";

$orderCount = $pdo->query($sql1);
$orderCountRow = $orderCount->fetchAll(PDO::FETCH_ASSOC);
$monthlyOrders = $pdo->query($sql2);
$monthlyOrdersRow = $monthlyOrders->fetchAll(PDO::FETCH_ASSOC);

$counts = array_merge($orderCountRow, $monthlyOrdersRow);
// echo json_encode($orderCountRow);
// echo json_encode($monthlyOrderRows);
echo json_encode($counts);
// $a =[{}];
// $b =[{}];
// echo $a.$b;
?>