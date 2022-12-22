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

$resDate = [
    "status" => 0,  //狀態(0:失敗,1:成功)
    "msg" => "",
];

//參數處理
$mem_id = empty( $_GET["mem_id"] ) ? ( $_POST["mem_id"] ?? "" ) : $_GET["mem_id"];
$search_mem_name = empty( $_GET["search_mem_name"] ) ? ( $_POST["search_mem_name"] ?? "" ) : $_GET["search_mem_name"];
$search_orderby = empty( $_GET["search_orderby"] ) ? ( $_POST["search_orderby"] ?? "" ) : $_GET["search_orderby"];

$black_state = empty( $_GET["black_state"] ) ? ( $_POST["black_state"] ?? "" ) : $_GET["black_state"];
$black_stateid = empty( $_GET["black_stateid"] ) ? ( $_POST["black_stateid"] ?? "" ) : $_GET["black_stateid"];
//如果是空，true等於(「?」後面，「:」前面)，false等於(「:」後面，「;」前面)

$type = empty( $_GET["type"] ) ? ( $_POST["type"] ?? "" ) : $_GET["type"]; //來源型態(front:前台,admin:後台)

$limit=$_REQUEST['limit'];
$page = $_REQUEST['page'] - 1;

$offset = $page * $limit;

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
        //【下列為 後台會員 搜尋功能】
        $whereStr = "";
        if (!empty($search_mem_name)){
            $whereStr .= "AND mem_name LIKE '%{$search_mem_name}%' ";  
            // $whereStr = $whereStr."xxxx"
        }

        //【下列為 後台會員 排序相關功能：】
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
        // var_dump($orderbyInfo[$search_orderby]);die();
        $sql = "SELECT * FROM tibamefe_cgd103g1.member WHERE 1 {$whereStr} {$orderStr} LIMIT {$limit} OFFSET {$offset} "; // WHERE 1 意味著ALWAYS TRUE它不會對您的查詢產生任何過濾影響
        
        // 查詢總比數
        $countSQL = "SELECT * FROM tibamefe_cgd103g1.member WHERE 1 {$whereStr} {$orderStr}";
        $countQuery = $pdo->query($countSQL);
        $count = $countQuery->fetchAll(PDO::FETCH_ASSOC);


        // LIMIT {$limit} OFFSET {$offset} ------------------------
        
        // var_dump($black_stateid,$black_state);die();
        // $black_stateid= 1001;
        // $black_state=1;

        //【下列為 後台會員 黑名單switch滑塊變更資料庫的相關功能】


        // $upSql = "UPDATE tibamefe_cgd103g1.member SET mem_state = '{$black_state}' WHERE mem_id = '{$mem_id}' ";

        // try {
        //     $res = $pdo->query( $upSql );
        //     if( $res ){
        //         $resDate["status"] = 1;
        //         $resDate["msg"] = '黑名單狀態已切換';
        //     }
        //     echo json_encode( $resDate );
        //     return true;
        
        // } catch (Exception $e) {
        //     $resDate["msg"] = $e->getMessage();
        //     echo json_encode( $resDate );
        //     return true;
        // }


        //【下列為 後台list 抓取所有會員的明細功能】
        $members = $pdo->query($sql);
        $prodRows = $members->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array("prodRows"=>$prodRows,"count"=>count($count)));
        return true;
        break;
    default:
        echo json_encode(["status"=>false,"msg"=>"不支持此用法"]);
        return true;
        break;
}
?>
