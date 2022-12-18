<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";

$supportId = $_GET["supportId"];

$sql = "SELECT s.sup_id, m.mem_name 'mem_name', s.sup_date, s.sup_plan, k.koala_name 'koala_name', s.sup_price, s.sup_note
FROM tibamefe_cgd103g1.support s
JOIN tibamefe_cgd103g1.member m ON s.mem_id = m.mem_id
JOIN tibamefe_cgd103g1.koala k ON s.koala_id = k.koala_id
WHERE sup_id = {$supportId}";

$support = $pdo->query($sql);
$supportRow = $support->fetch(PDO::FETCH_ASSOC);

echo json_encode([
    "supportInfo" => [
        "sup_id" => $supportRow["sup_id"],
        "sup_date" => $supportRow["sup_date"],
        "mem_name" => $supportRow["mem_name"],
        "sup_plan" => $supportRow["sup_plan"],
        "koala_name" => $supportRow["koala_name"],
        "sup_price" => $supportRow["sup_price"],
        "sup_note" => $supportRow["sup_note"],
    ],
]);
?>
