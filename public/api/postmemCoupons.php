<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";
$id = empty( $_GET["mem_id"] ) ? ( $_POST["mem_id"] ?? "" ) : $_GET["mem_id"];

$resDate = [
    "status" => 0,  //狀態(0:失敗,1:成功)
    "msg" => "",
];

$sql = "SELECT 
m.mem_id 'mem_id',c.coupon_id,
c.coupon_code 'coupon_code' , c.coupon_get_date, c.coupon_exp_date ,c.coupon_status, cc.coupon_name
FROM tibamefe_cgd103g1.member m
JOIN tibamefe_cgd103g1.my_coupon c ON c.mem_id = m.mem_id
JOIN tibamefe_cgd103g1.coupon cc ON c.coupon_id = cc.coupon_id
WHERE m.mem_id = $id
ORDER BY coupon_id DESC";



$support = $pdo->query($sql);
$supportRows = $support->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($supportRows);
?>
