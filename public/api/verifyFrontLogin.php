<?php 
/**
 * 驗證前台登入(cookie:sission)
*/

$headerCookies = explode('; ', getallheaders()['Cookie']);
$cookies = array();
foreach($headerCookies as $itm) {
    list($key, $val) = explode('=', $itm, 2);
    $cookies[$key] = $val;
}
$getSessionId = $cookies["PHPSESSID"]??"";
session_id($getSessionId);
session_start();
$getUser = $_SESSION??[];
if ( empty( $getUser ) ) {
    echo json_encode(["status"=>10010,"msg"=>"該帳號目前已登出"]);
    die();
}
?>