<?php 
/**
 * 查詢會員接口
 * 接 components / MemCentre.vue
*/

//header設置
require_once("./headerUse.php");
//驗證登入
require_once("./verifyFrontLogin.php");
//DB連線設置
require_once("./connect_cgd103g1.php");

//參數處理
$mem_id = empty( $_GET["mem_id"] ) ? ( $_POST["mem_id"] ?? "" ) : $_GET["mem_id"];
$type = empty( $_GET["type"] ) ? ( $_POST["type"] ?? "" ) : $_GET["type"]; //來源型態(front:前台,admin:後台)

if ( $type == "front" && empty($getUser) ) {
    echo json_encode(["status"=>false,"msg"=>"登陸失效"]);
    return true;
}

switch( $type ){
    case "front":
        $userid = $getUser["mem_id"];
        //如果id不是空值 執行以下
        $sql = "SELECT * FROM tibamefe_cgd103g1.member WHERE mem_id = {$userid}";
        $members = $pdo->query($sql);
        $prodRows = $members->fetch(PDO::FETCH_ASSOC);
        echo json_encode(["status"=>true,"list"=>$prodRows]);
        return true;
        break;
    case "admin":
        $sql = "SELECT * FROM tibamefe_cgd103g1.member";
        $members = $pdo->query($sql);
        $prodRows = $members->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($prodRows);
        return true;
        break;
    default:
        echo json_encode(["status"=>false,"msg"=>"不支持此用法"]);
        return true;
        break;
}
?>
