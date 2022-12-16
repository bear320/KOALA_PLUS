<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";
$id = empty( $_GET["mem_id"] ) ? ( $_POST["mem_id"] ?? "" ) : $_GET["mem_id"];

$resDate = [
    "status" => 0,  //狀態(0:失敗,1:成功)
    "msg" => "",
];

$sql = "SELECT m.mem_id, m.mem_id 'mem_id',m.mem_name, o.ord_id, o.ord_date ,o.ord_ship,
ol.prod_id ,ol.ord_qty, ol.prod_price , p.prod_id 'prod_id' , p.prod_name, p.prod_category 'prod_category'
FROM tibamefe_cgd103g1.orders o
JOIN tibamefe_cgd103g1.member m ON m.mem_id = o.mem_id
JOIN tibamefe_cgd103g1.order_list ol ON o.ord_id =ol.ord_id
JOIN tibamefe_cgd103g1.product p ON p.prod_id = ol.prod_id
ORDER BY ord_id DESC";



$support = $pdo->query($sql);
$supportRows = $support->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($supportRows);
?>
