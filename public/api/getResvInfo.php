<?php 
 
 try {
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
// $sql = "select * from reservation where rsv_mobile = ?";

$sql = "select * from `reservation` where rsv_mobile=:rsv_mobile";
$reservation = $pdo->prepare($sql);
$reservation->bindValue(":rsv_mobile", $_POST["rsv_mobile"]);
$reservation->execute();
$prodRows = $reservation->fetch(PDO::FETCH_ASSOC); 

echo json_encode($prodRows);


} catch (PDOException $e) {
	//echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "錯誤行號 : ", $e->getLine(), "<br>";
	// echo "系統錯誤, 請通知系統維護人員<br>";
	$result = ["msg"=>"系統錯誤, 請通知系統維護人員"];
	echo json_encode($result);
}
// echo json_encode($prodRows);            
?>