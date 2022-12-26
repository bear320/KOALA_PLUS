<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
try{
	//header設置
    // require_once("./headerUse.php");
    //DB連線設置
    require_once("./connect_cgd103g1.php");

	//sql 指令
	// $sql = "UPDATE `tibamefe_cgd103g1`.`member` SET  `mem_point`=':game_money', `mem_food1`=':remaining_amount_1', `mem_food2`=':remaining_amount_2', `mem_food3`=':remaining_amount_3', `mem_food4`=':remaining_amount_4', `mem_food5`=':remaining_amount_5', `mem_food6`=':remaining_amount_6'  WHERE mem_id = `:mem_id`;";
    $sql = "UPDATE tibamefe_cgd103g1.member
    SET mem_point = :game_money,
    mem_food1 = :remaining_amount_1,
    mem_food2 = :remaining_amount_2,
    mem_food3 = :remaining_amount_3,
    mem_food4 = :remaining_amount_4,
    mem_food5 = :remaining_amount_5,
    mem_food6 = :remaining_amount_6,
    mem_exp = :game_exp
    WHERE mem_id = :mem_id";

    
    
    
    
	//編譯, 執行
	$updateGameValue = $pdo->prepare($sql);	
	$updateGameValue->bindValue(":mem_id", $_POST["memId"]);
	$updateGameValue->bindValue(":game_money", $_POST["game_money"]);
	$updateGameValue->bindValue(":remaining_amount_1", $_POST["remaining_amount_1"]);
	$updateGameValue->bindValue(":remaining_amount_2", $_POST["remaining_amount_2"]);
    $updateGameValue->bindValue(":remaining_amount_3", $_POST["remaining_amount_3"]);
    $updateGameValue->bindValue(":remaining_amount_4", $_POST["remaining_amount_4"]);
    $updateGameValue->bindValue(":remaining_amount_5", $_POST["remaining_amount_5"]);
    $updateGameValue->bindValue(":remaining_amount_6", $_POST["remaining_amount_6"]);
    $updateGameValue->bindValue(":game_exp", $_POST["game_exp"]);
	$updateGameValue->execute();
    $msg="Updated";
}
catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
}
//輸出結果
$result = ["msg"=>$msg];
echo json_encode($result);
?>