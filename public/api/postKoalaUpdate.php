<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";

try {
    $koala_id = $_POST["koala_id"];
    $koala_name = $_POST["koala_name"];
    $koala_sex = $_POST["koala_sex"];
    $koala_dob = $_POST["koala_dob"];
    $koala_listed = $_POST["koala_listed"];
    $koala_info = $_POST["koala_info"];

    $sql = "UPDATE tibamefe_cgd103g1.koala
    SET koala_name = '$koala_name', koala_sex = '$koala_sex', koala_dob = '$koala_dob', koala_listed = '$koala_listed', koala_info = '$koala_info'
    WHERE koala_id = '$koala_id';";

    // $updateKoala = $pdo->prepare($sql);
    // $updateKoala->bindValue(":koala_id", $_POST["koala_id"]);
    // $updateKoala->bindValue(":koala_name", $_POST["koala_name"]);
    // $updateKoala->bindValue(":koala_sex", $_POST["koala_sex"]);
    // $updateKoala->bindValue(":koala_dob", $_POST["koala_dob"]);
    // $updateKoala->bindValue(":koala_listed", $_POST["koala_listed"]);
    // $updateKoala->bindValue(":koala_info", $_POST["koala_info"]);
    // $updateKoala->execute();

    $updateKoala = $pdo->query($sql);
    $msg = "資料已更新";
} catch (PDOException $e) {
    $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
}

$result = ["msg" => $msg];
echo json_encode($result);
?>
