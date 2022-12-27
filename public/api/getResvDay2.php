<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
//header設置
// require_once("./headerUse.php");
//驗證登入
// require_once("./verifyFrontLogin.php");
//DB連線設置
require_once("./connect_cgd103g1.php");
$sql = "select * from tibamefe_cgd103g1.reservation";

$search_rsv_date = $_POST["search_rsv_date"] ?? "";
$search_status = $_POST["search_rsv_status"] ?? "";
$search_order_by = $_POST["search_order_by"] ?? "";
$search_order_field = $_POST["search_order_field"] ?? "";
//如果是空，true等於(「?」後面，「:」前面)，false等於(「:」後面，「;」前面)

$whereStr = "";
$orderStr = "";

if(!empty($search_rsv_date)){
    $whereStr .= "WHERE rsv_date='$search_rsv_date'";
}
if(!empty($search_status)){
    if($whereStr != ""){
        $whereStr .=" AND";
    } else {
        $whereStr .= "WHERE";
    }
    $whereStr .= " rsv_status='$search_status'";
}

if(!empty($search_order_field)){
    $orderStr .= "ORDER BY $search_order_field $search_order_by";
}
$sql = "SELECT * FROM tibamefe_cgd103g1.reservation {$whereStr} {$orderStr} ";

$reservation = $pdo->query($sql);
$prodRows = $reservation->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($prodRows);
?>