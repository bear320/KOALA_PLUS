<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
try{
    require_once("./connect_cgd103g1.php");

    $sql = "INSERT INTO `tibamefe_cgd103g1`.`my_coupon` (mem_id,coupon_id,coupon_code,coupon_get_date, coupon_exp_date) VALUES (:mem_id, :coupon_id, :coupon_code,curdate(), DATE_ADD(:coupon_get_date, INTERVAL 60 DAY))";
	//編譯, 執行
	$coupon = $pdo->prepare($sql);	
	$coupon->bindValue(":mem_id", $_POST["mem_id"]);
	$coupon->bindValue(":coupon_id", $_POST["coupon_id"]);
	$coupon->bindValue(":coupon_code", $_POST[":coupon_code"]);
	$coupon->execute();

    $msg="新增成功";
}
catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
}
//輸出結果
$result = ["msg"=>$msg];
echo json_encode($msg);
?>