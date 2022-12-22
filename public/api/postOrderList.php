<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");

try {
    require_once "./connect_cgd103g1.php";

    $sql = "UPDATE tibamefe_cgd103g1.orders
    SET ord_ship = :ord_ship
    WHERE ord_id = :ord_id;";

    $orderList = $pdo->prepare($sql);
    $orderList->bindValue(":ord_id", $_POST["ord_id"]);
    $orderList->bindValue(":ord_ship", $_POST["ord_ship"]);
    $orderList->execute();
    $msg = "訂單狀態已更新";
} catch (PDOException $e) {
    $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
}

$result = ["msg" => $msg];
echo json_encode($result);
?>
