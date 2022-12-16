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
m.mem_id, m.mem_id 'mem_id',m.mem_name, sup_id,
s.sup_date, s.sup_plan, k.koala_name , 
s.sup_price
FROM tibamefe_cgd103g1.member m
JOIN tibamefe_cgd103g1.support s ON s.mem_id = m.mem_id
JOIN tibamefe_cgd103g1.koala k ON s.koala_id = k.koala_id
WHERE m.mem_id = $id
ORDER BY sup_id DESC";



$support = $pdo->query($sql);
$supportRows = $support->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($supportRows);
?>
