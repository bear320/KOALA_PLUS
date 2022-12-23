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
    WHERE mem_id = :mem_id;";
    
    
    
    
	//編譯, 執行
	$updateGameValue = $pdo->prepare($sql);	
	$updateGameValue->bindValue(":mem_point", $_POST["game_money"]);
	$updateGameValue->bindValue(":mem_food1", $_POST["remaining_amount_1"]);
	$updateGameValue->bindValue(":mem_food2", $_POST["remaining_amount_2"]);
    $updateGameValue->bindValue(":mem_food3", $_POST["remaining_amount_3"]);
    $updateGameValue->bindValue(":mem_food4", $_POST["remaining_amount_4"]);
    $updateGameValue->bindValue(":mem_food5", $_POST["remaining_amount_5"]);
    $updateGameValue->bindValue(":mem_food6", $_POST["remaining_amount_6"]);
	$updateGameValue->execute();

}
catch (PDOException $e) {
	$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
}
//輸出結果
$result = ["msg"=>$msg];
echo json_encode($result);
?>
