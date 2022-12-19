<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{
    require_once("./connect_cgd103g1.php");
    $checkItemSQL = 'delete from `cart` where mem_id=:mem_id and prod_id =:prod_id';
    $checkItem = $pdo->prepare($checkItemSQL);
    $checkItem->bindValue(':mem_id',$_POST['memId']);
    $checkItem->bindValue(':prod_id',$_POST['prodId']);
    $checkItem->execute();
    $msg = "已移除商品";
    
    }catch(PDOException $e){
        $msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
    }
        
    $result = ["msg"=>$msg];
    echo json_encode($result);             
?>
    