<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

$proId = $_GET['proId'];

$sql = "select * from tibamefe_cgd103g1.product where prod_id={$proId}";
$sql2 = "select * from tibamefe_cgd103g1.product where prod_id <> {$proId} order by rand() limit 4 ";

$products = $pdo->query($sql);

$prodRows = $products->fetch(PDO::FETCH_ASSOC);

// echo json_encode(array("prod_id"=>$prodRows['prod_id']));             
echo json_encode(array('prod_id'=>$prodRows['prod_id'],'prod_name'=>$prodRows['prod_name'],'prod_price'=>$prodRows['prod_price'],'prod_info'=>$prodRows['prod_info'],'prod_listed'=>$prodRows['prod_listed'],'prod_category'=>$prodRows['prod_category'],'images'=>array($prodRows['prod_img1'],$prodRows['prod_img2'],$prodRows['prod_img3'],$prodRows['prod_img4'])));             
?>
