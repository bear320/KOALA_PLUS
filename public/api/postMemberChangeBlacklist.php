<?php
/**
 * 變更 後台會員清單的修改switch滑塊後的黑名單狀態 及資料庫 接口
 *  接 backStage / MemberList.vue
*/

/* //header設置
require_once("./headerUse.php");
//驗證登入
require_once("./verifyFrontLogin.php"); */
//DB連線設置

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

$resDate = [
    "status" => 0,  //狀態(0:失敗,1:成功)
    "msg" => "",
];

//參數處理
$black_state = empty( $_GET["black_state"] ) ? ( $_POST["black_state"] ?? "" ) : $_GET["black_state"];
$mem_id = empty( $_GET["mem_id"] ) ? ( $_POST["mem_id"] ?? "" ) : $_GET["mem_id"];
//如果是空，true等於(「?」後面，「:」前面)，false等於(「:」後面，「;」前面)
$upSql = "UPDATE tibamefe_cgd103g1.member SET mem_state = '{$black_state}' WHERE mem_id = '{$mem_id}' ";

try {
    $res = $pdo->query( $upSql );
    if( $res ){
        $resDate["status"] = 1;
        $resDate["msg"] = '黑名單狀態已切換';
    }
    echo json_encode( $resDate );
    return true;

} catch (Exception $e) {
    $resDate["msg"] = $e->getMessage();
    echo json_encode( $resDate );
    return true;
}
?>