<?php
//header設置
require_once("./headerUse.php");
//驗證登入
require_once("./verifyFrontLogin.php");
//DB連線設置
require_once("./connect_cgd103g1.php");

/* $ord_ship = empty( $_GET["ord_ship"] ) ? ( $_POST["ord_ship"] ?? "" ) : $_GET["ord_ship"];

$ord_id = empty( $_GET["ord_id"] ) ? ( $_POST["ord_id"] ?? "" ) : $_GET["ord_id"];

$userid = $getUser["mem_id"]; */

$ord_ship=$_POST["ord_ship"];
$ord_id=$_POST["ord_id"];
$mem_id=$_POST["mem_id"];


$upSql = "UPDATE tibamefe_cgd103g1.orders SET ord_ship = $ord_ship WHERE mem_id =  $mem_id AND ord_id= $ord_id";

$update = $pdo->query($upSql);

echo json_encode($_POST);
?>
