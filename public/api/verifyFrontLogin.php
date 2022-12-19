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
?>