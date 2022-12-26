<?php
/**
 * 查詢 會員中心的訂單資訊 接口 "群組標題"
 *  接 components / MemOrder.vue
*/

//header設置
require_once("./headerUse.php");
//驗證登入
require_once("./verifyFrontLogin.php");
//DB連線設置
require_once("./connect_cgd103g1.php");

//參數處理
if ( empty($getUser) ) {
    echo json_encode(["status"=>false,"msg"=>"登陸失效"]);
    return true;
}

$ord_ship = empty( $_GET["ord_ship"] ) ? ( $_POST["ord_ship"] ?? "" ) : $_GET["ord_ship"];

$resDate = [
    "status" => 0,  //狀態(0:失敗,1:成功)
    "msg" => "",
];

$userid = $getUser["mem_id"];


// $upSql = "UPDATE tibamefe_cgd103g1.orders SET ord_ship = '{$_POST["ord_ship"]}' WHERE mem_id = {$userid} ";

// $update = $pdo->query($upSql);

$sql = "SELECT m.mem_id, m.mem_id 'mem_id',m.mem_name,
o.ord_id, o.ord_date ,o.ord_ship, o.ord_disc, o.ord_sum,o.ord_add,o.ord_phone,o.ord_person
FROM tibamefe_cgd103g1.orders o
JOIN tibamefe_cgd103g1.member m ON m.mem_id = o.mem_id
WHERE m.mem_id = $userid
ORDER BY ord_id DESC";


$support = $pdo->query($sql);
$supportRows = $support->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(["status"=>true,"list"=>$supportRows,"userid"=>$userid,"username"=>$getUser["mem_name"]]);
return true;
?>
