<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

$bookId = $_GET['bookId'];
$sql = "select * from tibamefe_cgd103g1.reservation where rsv_id={$bookId}";


$reservation = $pdo->query($sql);
$prodRows = $reservation->fetchAll(PDO::FETCH_ASSOC);
$notBookDate = array();

echo json_encode($prodRows);
// echo json_encode($prodRows);            
?>
