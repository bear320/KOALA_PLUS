<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

// $sql1 = "select * from tibamefe_cgd103g1.orders;";

$sql = "SELECT o.*, p.prod_name , p.prod_img1
FROM order_list o JOIN product p ON o.prod_id = p.prod_id 
ORDER BY ord_id DESC, prod_id ASC;";

$orderlist = $pdo->query($sql);
$orderlistRows = $orderlist->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($orderlistRows);       
?>






