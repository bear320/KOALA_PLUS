<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
try{
    // require_once("./headerUse.php");   //header設置
    require_once("./connect_cgd103g1.php");   //DB連線設置
	
	//sql 指令
	$sql = "INSERT INTO `tibamefe_cgd103g1`.`my_coupon` (`mem_id`, `coupon_id`, `coupon_code`, `coupon_get_date`, `coupon_exp_date`, `coupon_status`) VALUES (:memId, 4004, 'koala60', CURDATE(), ADDDATE(CURDATE(), INTERVAL 30 DAY), 0)";
	
	//編譯, 執行
	$gameCoupon = $pdo->prepare($sql);
	$gameCoupon->bindValue(":memId", $_POST["memId"]);
	$gameCoupon->execute();

    $msg = "領取成功";
}
catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
}
//輸出結果`koala60`
$result = ["msg"=>$msg];
echo json_encode($result);
?>