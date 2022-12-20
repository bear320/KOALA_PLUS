<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");

try {
    require_once "./connect_cgd103g1.php";

    $sql = "UPDATE tibamefe_cgd103g1.koala
    SET koala_listed = :koala_listed
    WHERE koala_id = :koala_id;";

    $updateKoalaListed = $pdo->prepare($sql);
    $updateKoalaListed->bindValue(":koala_listed", $_POST["koala_listed"]);
    $updateKoalaListed->bindValue(":koala_id", $_POST["koala_id"]);
    $updateKoalaListed->execute();
    $msg = "狀態已切換";
} catch (PDOException $e) {
    $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
}

$result = ["msg" => $msg];
echo json_encode($result);
?>
