<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");

try {
    require_once "./connect_cgd103g1.php";

    $sql = "UPDATE tibamefe_cgd103g1.product
    SET prod_listed = :prod_listed
    WHERE prod_id = :prod_id;";

    $updateKoalaListed = $pdo->prepare($sql);
    $updateKoalaListed->bindValue(":prod_listed", $_POST["prod_listed"]);
    $updateKoalaListed->bindValue(":prod_id", $_POST["prod_id"]);
    $updateKoalaListed->execute();
    $msg = "狀態已切換";
} catch (PDOException $e) {
    $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
}

$result = ["msg" => $msg];
echo json_encode($result);
?>
