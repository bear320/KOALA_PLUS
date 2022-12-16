<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
$sql = "select * from tibamefe_cgd103g1.reservation";
/* if($category == ''){
    $sql = "select * from tibamefe_cgd103g1.product order by {$order} limit {$limit} offset {$offset}";
}else{
    $sql = "select * from tibamefe_cgd103g1.product where prod_category='{$category}' order by {$order} limit 9 offset 0;";
} */

// pagination + BookingList.Vue

$limit = 10;
$page = $_GET["page"] - 1; //pagination
$offset = $page * $limit; //pagination
$sql = "select * from tibamefe_cgd103g1.reservation order by rsv_id desc limit {$limit} offset {$offset}"; 
$sql2 = "select count(*) as 'resv_total' from tibamefe_cgd103g1.reservation"; //pagination

$reservation = $pdo->query($sql);
$rsvCount = $pdo->query($sql2); //pagination
$prodRows = $reservation->fetchAll(PDO::FETCH_ASSOC); 
$prodRows2 = $rsvCount->fetchColumn();  //pagination
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
echo json_encode(array("notBookDate" => $notBookDate,"bookList"=>$prodRows,"rsvCount"=>$prodRows2)); //pagination->count的地方

// echo json_encode(array("test" => $notBookDate,"qq"=>$prodRows2));
// echo json_encode($prodRows);            
?>
