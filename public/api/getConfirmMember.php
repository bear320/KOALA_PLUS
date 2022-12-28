<?php 
/**
 * 前台會員登陸接口
 * $_SESSION 參考網站:https://ithelp.ithome.com.tw/articles/10207241
 * CORS 參考網站:https://blog.huli.tw/2021/02/19/cors-guide-3/
 * 
 * http://localhost/cgd103_g1/public/api/getConfirmMember.php?mem_account=charmy222@gmail.com&mem_psw=charmy222
 * http://localhost/cgd103_g1/public/api/getConfirmMember.php?mem_account=charmy333@gmail.com&mem_psw=charmy333
*/

require_once("./headerUse.php");   //header設置
require_once("./connect_cgd103g1.php");   //DB連線設置

$login_account = empty( $_GET["mem_account"] ) ? ( $_POST["mem_account"] ?? "" ) : $_GET["mem_account"];
$login_psw = empty( $_GET["mem_psw"] ) ? ( $_POST["mem_psw"] ?? "" ) : $_GET["mem_psw"];

if($login_account != "" && $login_psw != "") {
    $sql = " SELECT * FROM member WHERE mem_account = '{$login_account}' OR mem_psw = '{$login_psw}'; ";
    $result = $pdo->query($sql);
    $resArray = $result->fetch(PDO::FETCH_ASSOC);
    $mem_psw = $resArray["mem_psw"]??"";
    if($mem_psw == $login_psw) {
        $nowTime = time();
        session_start();
        $_SESSION = $resArray;
        $result_array = ["code"=>"1", "msg"=>"登陸成功",'memInfo'=>$_SESSION,'session_id'=>session_id()];
        echo json_encode($result_array);
    }
    else {
        $result_array = ["code"=>"0", "msg"=>"帳號或密碼錯誤"];
        echo json_encode($result_array);
    }
}
else {
    $result_array = ["code"=>"0", "msg"=>"帳號或密碼錯誤"];
    echo json_encode($result_array);
}    
?>