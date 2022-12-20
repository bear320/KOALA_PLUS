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
// 排序功能處理
$mem_coupons_orderby = empty( $_GET["mem_coupons_orderby"] ) ? ( $_POST["mem_coupons_orderby"] ?? "" ) : $_GET["mem_coupons_orderby"];
//如果是空，true等於(「?」後面，「:」前面)，false等於(「:」後面，「;」前面)

$type = empty( $_GET["type"] ) ? ( $_POST["type"] ?? "" ) : $_GET["type"]; //來源型態(front:前台,admin:後台)
$resDate = [
    "status" => 0,  //狀態(0:失敗,1:成功)
    "msg" => "",
];

$userid = $getUser["mem_id"];


//下列為 前台會員中心 優惠券 排序相關功能：
$orderbyInfo = [
    1=> ["coupon_code","ASC"], //優惠券代碼（正序）
    2=> ["coupon_code","DESC"], //優惠券代碼（反序）
    3=> ["coupon_get_date","ASC"], //優惠券獲得日期（正序）
    4=> ["coupon_get_date","DESC"],  //優惠券獲得日期（反序）
    5=> ["coupon_exp_date","ASC"], //優惠券到期日（正序）
    6=> ["coupon_exp_date","DESC"],  //優惠券到期日（反序）
];
//  ORDER BY 欄位名稱 [ASC] [DESC];
//  ASC  是 小到大
//  DESC 是 大到小
$orderStr = "";
if(!empty($mem_coupons_orderby)){
    $orderStr .= "ORDER BY {$orderbyInfo[$mem_coupons_orderby][0]} {$orderbyInfo[$mem_coupons_orderby][1]} ";
}

// $sql = "SELECT * FROM tibamefe_cgd103g1.member WHERE 1 {$whereStr} {$orderStr} "; 
// WHERE 1 意味著ALWAYS TRUE它不會對您的查詢產生任何過濾影響


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
