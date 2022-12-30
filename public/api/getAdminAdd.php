<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
try{
    // require_once("./headerUse.php");   //header設置
    require_once("./connect_cgd103g1.php");   //DB連線設置

	//sql 指令
	$sql = "INSERT INTO `tibamefe_cgd103g1`.`employee` (`emp_account`, `emp_psw`, `emp_name`, `emp_validation`, `emp_last_login`) VALUES 
	(:emp_account, :emp_psw, :emp_name, 1, NOW());";

	//編譯, 執行
	$products = $pdo->prepare($sql);	
	$products->bindValue(":emp_account", $_POST["account"]);
	$products->bindValue(":emp_psw", $_POST["password"]);
	$products->bindValue(":emp_name", $_POST["name"]);
	$products->execute();

    $msg = "註冊成功";
}
catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
}

//輸出結果
$result = ["msg"=>$msg];
echo json_encode($result);
?>