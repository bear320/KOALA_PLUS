<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

$memId = $_GET['memId'];
$sql = "SELECT * FROM `my_coupon` WHERE mem_id={$memId} and coupon_status=0 order by coupon_exp_date";

$memCoupon = $pdo->query($sql);
$memCouponRows = $memCoupon->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($memCouponRows,JSON_NUMERIC_CHECK);
?>