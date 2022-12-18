<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";

$koalaName = $_GET["koalaName"];

$sql = "SELECT *, TIMESTAMPDIFF(YEAR, koala_dob, CURDATE()) 'koala_age'
FROM tibamefe_cgd103g1.koala
WHERE koala_name = '{$koalaName}'";

$koala = $pdo->query($sql);
$koalaRow = $koala->fetch(PDO::FETCH_ASSOC);

echo json_encode([
    "koalaInfo" => [
        "koala_id" => $koalaRow["koala_id"],
        "koala_name" => $koalaRow["koala_name"],
        "koala_sex" => $koalaRow["koala_sex"],
        "koala_dob" => $koalaRow["koala_dob"],
        "koala_age" => $koalaRow["koala_age"],
        "koala_listed" => $koalaRow["koala_listed"],
        "koala_info" => $koalaRow["koala_info"],
    ],
]);
?>
