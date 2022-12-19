<?php 
/**
 * header 相關設置
*/

$Origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:"*";   // HTTP_HOST,HTTP_ORIGIN,SERVER_NAME
header("Access-Control-Allow-Origin: {$Origin}");           // 如果$origin为*号时,则跨域访问不支持cookie的发送
header("Access-Control-Allow-Methods:POST,GET,OPTIONS");    // 允许请求的类型
header("Access-Control-Allow-Credentials:true");            // 跨域访问是否允许带cookie的发送
header("Content-Type:application/json;charset=utf-8");      // cors请求时,谷歌浏览器包含的头信息
?>