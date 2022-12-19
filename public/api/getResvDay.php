<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
$sql = "select * from tibamefe_cgd103g1.reservation";


$reservation = $pdo->query($sql);
$prodRows = $reservation->fetchAll(PDO::FETCH_ASSOC);
$notBookDate = array();
foreach ($prodRows as $row) {
    $notBookDate[$row['rsv_date']] = array(
        "id" => $row['rsv_id'],
        "date"=> $row['rsv_date'],
        "ppl" => $row['rsv_ppl'],
        "name" => $row['rsv_name'],
        "mobile" => $row['rsv_mobile'],
        "email" => $row['rsv_email'],
        "state" => $row['rsv_status'],
        "ps" => $row['rsv_ps'],
    );
}
echo json_encode(array("notBookDate" => $notBookDate));
// echo json_encode($prodRows);            
?>