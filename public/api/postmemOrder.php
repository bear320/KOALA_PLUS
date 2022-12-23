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

$resDate = [
    "status" => 0,  //狀態(0:失敗,1:成功)
    "msg" => "",
];

$userid = $getUser["mem_id"];

$sql = "SELECT m.mem_id, m.mem_id 'mem_id',m.mem_name,
o.ord_id, o.ord_date ,o.ord_ship, o.ord_disc, o.ord_sum,o.ord_add,o.ord_phone,o.ord_person,
ol.prod_id ,ol.ord_qty, ol.prod_price , 
p.prod_id 'prod_id' , p.prod_name, p.prod_category 'prod_category'
FROM tibamefe_cgd103g1.orders o
JOIN tibamefe_cgd103g1.member m ON m.mem_id = o.mem_id
JOIN tibamefe_cgd103g1.order_list ol ON o.ord_id =ol.ord_id
JOIN tibamefe_cgd103g1.product p ON p.prod_id = ol.prod_id
WHERE m.mem_id = $userid
ORDER BY ord_id DESC";

$support = $pdo->query($sql);
$supportRows = $support->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(["status"=>true,"list"=>$supportRows,"userid"=>$userid,"username"=>$getUser["mem_name"]]);
return true;
?>
