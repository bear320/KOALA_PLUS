
<?php 
/**
 * 前台會員登陸接口
 * $_SESSION 參考網站:https://ithelp.ithome.com.tw/articles/10207241
 * CORS 參考網站:https://blog.huli.tw/2021/02/19/cors-guide-3/
 * 
 * http://localhost/cgd103_g1/public/api/getConfirmMember.php?mem_account=charmy222@gmail.com&mem_psw=charmy222
 * http://localhost/cgd103_g1/public/api/getConfirmMember.php?mem_account=charmy333@gmail.com&mem_psw=charmy333
*/
//header設置
require_once("./headerUse.php");
//DB連線設置
require_once("./connect_cgd103g1.php");

$login_account = empty( $_GET["mem_account"] ) ? ( $_POST["mem_account"] ?? "" ) : $_GET["mem_account"];
$login_psw = empty( $_GET["mem_psw"] ) ? ( $_POST["mem_psw"] ?? "" ) : $_GET["mem_psw"];

if($login_account != "" && $login_psw != "") {
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // $connect = new mysqli("localhost:3306", "root", "cgd10330", "tibamefe_cgd103g1");
    // $connect -> set_charset('utf8mb4');
    
    // if($connent != null) {
        $sql = " SELECT * FROM member WHERE mem_account = '{$login_account}' OR mem_psw = '{$login_psw}'; ";
        $result = $pdo->query($sql);
        $resArray = $result->fetch(PDO::FETCH_ASSOC);
        $mem_psw = $resArray["mem_psw"]??"";
        if($mem_psw == $login_psw) {
            //產生一個令牌
            $nowTime = time();
            // $token = md5($resArray["mem_account"].$resArray["mem_psw"].$nowTime);
            session_start();
            // session_unset();
            $_SESSION = $resArray;
            $result_array = ["code"=>"1", "msg"=>"登陸成功",'memInfo'=>$_SESSION,'session_id'=>session_id()];//, "token"=>$token
            echo json_encode($result_array);
        }
        else {
            $result_array = ["code"=>"0", "msg"=>"帳號或密碼錯誤"];
            echo json_encode($result_array);
        }
        // $connect -> close();
    // }
}
else {
    $result_array = ["code"=>"0", "msg"=>"帳號或密碼錯誤"];
    echo json_encode($result_array);
}


// $admin = $pdo->query($sql);
// $adminRows = $admin->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($adminRows);            
?>