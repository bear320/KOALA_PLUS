
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

$sql = " SELECT * FROM member WHERE mem_account = '{$login_account}'; ";
$result = $pdo->query($sql);
$resArray = $result->fetch(PDO::FETCH_ASSOC);

// $admin = $pdo->query($sql);
// $adminRows = $admin->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($adminRows);            
?>