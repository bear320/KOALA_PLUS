<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

$resDate = [
    "status" => 0,  //狀態(0:失敗,1:成功)
    "msg" => "",
];
  	
	try{
		require_once("./connect_cgd103g1.php");
		$sql = "select * from `reservation` where rsv_date=:rsv_date";
		$reservation = $pdo->prepare($sql);
		$reservation->bindValue(":rsv_date", $_POST["rsv_date"]);
		$reservation->execute();

	if ($reservation->rowCount() == 0) {

		//sql 指令
		$sql = "insert into tibamefe_cgd103g1.reservation values( null, :rsv_date, :rsv_ppl, :rsv_name, :rsv_mobile, :rsv_email, :rsv_status, :rsv_ps )";

		//編譯, 執行
		$reservation = $pdo->prepare($sql);
		$reservation->bindValue(":rsv_date", $_POST["rsv_date"]);
		$reservation->bindValue(":rsv_ppl", $_POST["rsv_ppl"]);
		$reservation->bindValue(":rsv_name", $_POST["rsv_name"]);
		$reservation->bindValue(":rsv_mobile", $_POST["rsv_mobile"]);
		$reservation->bindValue(":rsv_email", $_POST["rsv_email"]);
		$reservation->bindValue(":rsv_status", $_POST["rsv_status"]);
		$reservation->bindValue(":rsv_ps", $_POST["rsv_ps"]);
		$reservation->execute();

		$msg = "預約成功！";
	}else{

		$msg = "這天有人預約囉！";
	}
	} catch (PDOException $e) {
		$msg = "error_line: ".$e->getLine().", error_msg: ".$e->getMessage();
	}	


//輸出結果
// $result=["msg"=>$msg];
$result=$msg;
echo json_encode($result);


?>    