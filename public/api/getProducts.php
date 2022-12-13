<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
$search = isset($_GET["search"]) ? $_GET["search"] : '';
$category = isset($_GET["category"]) ? $_GET["category"] : '';
$order = $_GET["order"];
$limit = $_GET["limit"];
$page = $_GET["page"] - 1;
$offset = $page * $limit;
$sql = "select * from tibamefe_cgd103g1.product where prod_name like '%{$search}%' order by {$order} limit 9 offset 0";
/* if($category == ''){
    $sql = "select * from tibamefe_cgd103g1.product order by {$order} limit {$limit} offset {$offset}";
}else{
    $sql = "select * from tibamefe_cgd103g1.product where prod_category='{$category}' order by {$order} limit 9 offset 0;";
} */

$products = $pdo->query($sql);
$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($prodRows);            
?>
