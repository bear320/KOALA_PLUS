<?php 
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

$sql = "select * from tibamefe_cgd103g1.coupon;";

$coupon = $pdo->query($sql);
$couponRows = $coupon->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($couponRows);     
?>