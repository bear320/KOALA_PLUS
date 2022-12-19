<?php
/**
 * 查詢 會員中心的認養紀錄 接口
 *  接 components / MemAdopt.vue
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
m.mem_id, m.mem_id 'mem_id',m.mem_name, sup_id,
s.sup_date, s.sup_plan, k.koala_name , 
s.sup_price
FROM tibamefe_cgd103g1.member m
JOIN tibamefe_cgd103g1.support s ON s.mem_id = m.mem_id
JOIN tibamefe_cgd103g1.koala k ON s.koala_id = k.koala_id
WHERE m.mem_id = $userid
ORDER BY sup_id DESC";

$support = $pdo->query($sql);
$supportRows = $support->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(["status"=>true,"list"=>$supportRows,"userid"=>$userid,"username"=>$getUser["mem_name"]]);
?>
