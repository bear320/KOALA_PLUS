<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");

try {
    require_once "./connect_cgd103g1.php";

    $sql = "UPDATE tibamefe_cgd103g1.support
    SET sup_note = :sup_note
    WHERE sup_id = :sup_id;";

    $updateSupport = $pdo->prepare($sql);
    $updateSupport->bindValue(":sup_id", $_POST["sup_id"]);
    $updateSupport->bindValue(":sup_note", $_POST["sup_note"]);
    $updateSupport->execute();
    $msg = "資料已更新";
} catch (PDOException $e) {
    $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
}

$result = ["msg" => $msg];
echo json_encode($result);
?>
