<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");

try{
    require_once("./headerUse.php");
    require_once("./connect_cgd103g1.php");

    $sql = "select * from tibamefe_cgd103g1.member where mem_id=:memId";
    $member = $pdo->prepare($sql);
    $member->bindValue(":memId", $_GET["memId"]);
    $member->execute();
  
    //如果找得資料，取回資料，送出json
    if($member->rowCount() == 0){ //無此會員資料
        echo "{}";
    }else{
        $memRow = $member->fetch(PDO::FETCH_ASSOC);
  
        $result = [
            "mem_point"=>$memRow["mem_point"],
            "mem_food1"=>$memRow["mem_food1"],
            "mem_food2"=>$memRow["mem_food2"],
            "mem_food3"=>$memRow["mem_food3"],
            "mem_food4"=>$memRow["mem_food4"],
            "mem_food5"=>$memRow["mem_food5"],
            "mem_food6"=>$memRow["mem_food6"],
            "mem_exp"=>$memRow["mem_exp"],
        ];

      echo json_encode($result);//送出json字串
    }
  }catch(PDOException $e){
    $result = ["errMsg"=>$e->getMessage()];
    echo json_encode($result);
  }
?>