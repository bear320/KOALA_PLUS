<?php 
try {
    require_once("./headerUse.php");   //header設置
    require_once("./connect_cgd103g1.php");   //DB連線設置

    $sql = " SELECT * FROM member WHERE mem_account = :mem_account; ";
    $member = $pdo->prepare($sql);
    $member->bindValue(":mem_account", $_GET["mem_account"]);
    $member->execute();
  
    if( $member->rowCount() !=0){ //此帳號已存在, 不可用
      echo "此帳號已存在, 不可用";
    }else{ //此帳號可使用
      echo "此帳號可使用";
    } 
}catch(PDOException $e){
  echo $e->getMessage();
}     
?>