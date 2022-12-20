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
$search_mem_name = empty( $_GET["search_mem_name"] ) ? ( $_POST["search_mem_name"] ?? "" ) : $_GET["search_mem_name"];
$search_orderby = empty( $_GET["search_orderby"] ) ? ( $_POST["search_orderby"] ?? "" ) : $_GET["search_orderby"];
//如果是空，true等於(「?」後面，「:」前面)，false等於(「:」後面，「;」前面)

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
        //下列為 後台會員 搜尋功能
        $whereStr = "";
        if (!empty($search_mem_name)){
            $whereStr .= "AND mem_name LIKE '%{$search_mem_name}%' ";  
            // $whereStr = $whereStr."xxxx"
        }

        //下列為 後台會員 排序相關功能：
        $orderbyInfo = [
            1=> ["mem_id","ASC"], //會員編號（正序）
            2=> ["mem_id","DESC"], //會員編號（反序）
            3=> ["mem_account","ASC"], //email（正序）
            4=> ["mem_account","DESC"],  //email（反序）
        ];
        //  ORDER BY 欄位名稱 [ASC] [DESC];
        //  ASC  是 小到大
        //  DESC 是 大到小
        $orderStr = "";
        if(!empty($search_orderby)){
            $orderStr .= "ORDER BY {$orderbyInfo[$search_orderby][0]} {$orderbyInfo[$search_orderby][1]} ";
        }

        $sql = "SELECT * FROM tibamefe_cgd103g1.member WHERE 1 {$whereStr} {$orderStr} "; // WHERE 1 意味著ALWAYS TRUE它不會對您的查詢產生任何過濾影響

        

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
