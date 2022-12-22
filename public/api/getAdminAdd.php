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
	$sql = "INSERT INTO `tibamefe_cgd103g1`.`employee` (`emp_account`, `emp_psw`, `emp_validation`) VALUES 
	(:emp_account, :emp_psw, 1);";
	//編譯, 執行
	$products = $pdo->prepare($sql);	
	$products->bindValue(":emp_account", $_POST["account"]);
	$products->bindValue(":emp_psw", $_POST["password"]);
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