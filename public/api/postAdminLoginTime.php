<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
try{
    // require_once("./headerUse.php");   //header設置
    require_once("./connect_cgd103g1.php");   //DB連線設置

	//sql 指令
    $sql = "UPDATE tibamefe_cgd103g1.employee
    SET emp_last_login = CURDATE()
    WHERE emp_id = :emp_id";

	//編譯, 執行
	$last_login = $pdo->prepare($sql);
	$last_login->bindValue(":emp_id", $_POST["emp_id"]);
	$last_login->execute();
	$msg = "成功";
}
catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
}

//輸出結果
$result = ["msg"=>$msg];
echo json_encode($_POST);
?>