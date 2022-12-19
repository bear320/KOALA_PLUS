<?php
/**
 * 查詢 會員中心的優惠券 接口
 *  接 components / MemCoupons.vue
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

$sql = "SELECT 
m.mem_id 'mem_id',c.coupon_id,m.mem_name 'mem_name',
c.coupon_code 'coupon_code' , c.coupon_get_date, c.coupon_exp_date ,c.coupon_status, cc.coupon_name
FROM tibamefe_cgd103g1.member m
JOIN tibamefe_cgd103g1.my_coupon c ON c.mem_id = m.mem_id
JOIN tibamefe_cgd103g1.coupon cc ON c.coupon_id = cc.coupon_id
WHERE m.mem_id = $userid
ORDER BY coupon_id DESC";



$support = $pdo->query($sql);
$supportRows = $support->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(["status"=>true,"list"=>$supportRows,"userid"=>$userid,"username"=>$getUser["mem_name"]]);
?>
