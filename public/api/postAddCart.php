<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try{
    require_once("./connect_cgd103g1.php");
    $checkItemSQL = 'select * from tibamefe_cgd103g1.cart where mem_id=:mem_id and prod_id =:prod_id';
    $checkItem = $pdo->prepare($checkItemSQL);
    $checkItem->bindValue(':mem_id',$_POST['memId']);
    $checkItem->bindValue(':prod_id',$_POST['prodId']);
    $checkItem->execute();

    if($checkItem->rowCount() == 0){
        $sql='insert into tibamefe_cgd103g1 . `cart` values (:mem_id,:prod_id,:cart_qty)';
        $cart = $pdo->prepare($sql);
        $cart->bindValue(':mem_id',$_POST['memId']);
        $cart->bindValue(':prod_id',$_POST['prodId']);
        $cart->bindValue(':cart_qty', $_POST['cartQty']);
        $cart->execute();
        $msg = "加入購物車";
    }else{
        $updateItemSQL='update tibamefe_cgd103g1.cart set cart_qty =:cart_qty where prod_id =:prod_id';
        $updateItem = $pdo->prepare($updateItemSQL);
        $updateItem->bindValue(':prod_id',$_POST['prodId']);
        $updateItem->bindValue(':cart_qty', $_POST['cartQty']);
        $updateItem->execute();
        $msg = "已更新商品數量";
    }
}catch(PDOException $e){
    $msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
}
    
$result = ["msg"=>$msg];
echo json_encode($result);             
?>
