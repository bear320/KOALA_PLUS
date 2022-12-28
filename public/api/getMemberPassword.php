<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");

try{
    require_once("./headerUse.php");
    require_once("./connect_cgd103g1.php");

    $sql = "select * from tibamefe_cgd103g1.member where mem_account=:user_email";
    $member = $pdo->prepare($sql);
    $member->bindValue(":user_email", $_GET["mem_account"]);
    $member->execute();
  
    if($member->rowCount() == 0){ //無此會員資料
      echo "{}";
    }else{
      $memRow = $member->fetch(PDO::FETCH_ASSOC);
  
      $result = ["mem_psw"=>$memRow["mem_psw"]];
      
      echo json_encode($result);//送出json字串
    }
  }catch(PDOException $e){
    $result = ["errMsg"=>$e->getMessage()];
    echo json_encode($result);
  }
?>
