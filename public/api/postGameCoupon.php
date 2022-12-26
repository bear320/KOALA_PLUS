<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
try{
	//header設置
    // require_once("./headerUse.php");
    //DB連線設置
    require_once("./connect_cgd103g1.php");
	//sql 指令
	
	// $sql = "insert into tibamefe_cgd103g1.member('mem_name', 'mem_acoount', 'mem_psw') values (:mem_name, :mem_account, :mem_psw)";
	// $sql = "INSERT INTO `tibamefe_cgd103g1`.`my_coupon` (`mem_id`, `coupon_id`, `coupon_code`, `coupon_get_date`, `coupon_exp_date`, `coupon_status`) VALUES (:memId, 4004, koala60, CURDATE(), `CURDATE()+30`, 0);";
	$sql = "INSERT INTO `tibamefe_cgd103g1`.`my_coupon` (`mem_id`, `coupon_id`, `coupon_code`, `coupon_get_date`, `coupon_exp_date`, `coupon_status`) VALUES (:memId, 4004, 'koala60', CURDATE(), ADDDATE(CURDATE(), INTERVAL 30 DAY), 0)";
	
	//編譯, 執行
	$gameCoupon = $pdo->prepare($sql);
	$gameCoupon->bindValue(":memId", $_POST["memId"]);
	// $gameCoupon->bindValue(":coupon_id", $_POST[4004]);
	// $gameCoupon->bindValue(":coupon_code", $_POST["koala60"]);
    // $gameCoupon->bindValue(":coupon_get_date", $_POST[CURDATE()]);
    // $gameCoupon->bindValue(":coupon_exp_date", $_POST[ADDDATE(CURDATE(), INTERVAL 30 DAY)]);
	// $gameCoupon->bindValue(":coupon_status", $_POST[0]);
	// 用下面這行
	// INSERT INTO `tibamefe_cgd103g1`.`my_coupon` (`mem_id`, `coupon_id`, `coupon_code`, `coupon_get_date`, `coupon_exp_date`, `coupon_status`) VALUES (1010, 4004, "koala60", CURDATE(), ADDDATE(CURDATE(), INTERVAL 30 DAY), 0);
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