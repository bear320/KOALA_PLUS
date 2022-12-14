<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
$id = empty( $_GET["mem_id"] ) ? ( $_POST["mem_id"] ?? "" ) : $_GET["mem_id"];  


if ( !empty($id) ) {
    //如果id不是空值 執行以下
    $sql = "SELECT * FROM tibamefe_cgd103g1.member WHERE mem_id = {$id}";
    $members = $pdo->query($sql);
    $prodRows = $members->fetch(PDO::FETCH_ASSOC);
} else {
    $sql = "SELECT * FROM tibamefe_cgd103g1.member";
    $members = $pdo->query($sql);
    $prodRows = $members->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode($prodRows);
?>
