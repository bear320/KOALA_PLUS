
<?php 
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");

try {require_once("./connect_cgd103g1.php");


    $sql = "UPDATE tibamefe_cgd103g1.employee
    SET emp_validation = :emp_validation
    WHERE emp_id = :emp_id;";
    

    $updateempValidation = $pdo->prepare($sql);
    $updateempValidation->bindValue(":emp_validation", $_POST["emp_validation"]);
    $updateempValidation->bindValue(":emp_id", $_POST["emp_id"]);
    $updateempValidation->execute();
    $msg = "狀態已切換";
}
catch (PDOException $e) {
    $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
}

$result = ["msg" => $msg];
echo json_encode($result);
?>
