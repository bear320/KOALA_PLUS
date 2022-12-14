<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

$gte = isset($_GET["gte"]) ? $_GET["gte"] : '';
$lte = isset($_GET["lte"]) ? $_GET["lte"] : '';
$search = isset($_GET["search"]) ? $_GET["search"] : '';
$category = isset($_GET["category"]) ? $_GET["category"] : '';
$order = $_GET["order"];
$limit = $_GET["limit"];
$page = $_GET["page"] - 1;
$offset = $page * $limit;
$sql2 = "select count(*) as 'prod_total' from tibamefe_cgd103g1.product";

if(isset($_GET["lte"]) && isset($_GET["gte"])){
    $sql = "select * from tibamefe_cgd103g1.product where prod_price between {$lte} and {$gte} order by {$order} limit {$limit} offset {$offset}";
    $sql2 = "select count(*) as 'prod_total' from tibamefe_cgd103g1.product where prod_price between {$gte} and {$lte} order by {$order} limit {$limit} offset {$offset}";
}
else if(isset($_GET["lte"])){
    $sql = "select * from tibamefe_cgd103g1.product where prod_price >= {$lte} order by {$order} limit {$limit} offset {$offset}";
    $sql2 = "select count(*) as 'prod_total' from tibamefe_cgd103g1.product where prod_price <= {$lte} order by {$order} limit {$limit} offset {$offset}";
}
else if(isset($_GET["gte"])){
    $sql = "select * from tibamefe_cgd103g1.product where prod_price <= {$gte} order by {$order} limit {$limit} offset {$offset}";
    $sql2 = "select count(*) as 'prod_total' from tibamefe_cgd103g1.product where prod_price >= {$gte} order by {$order} limit {$limit} offset {$offset}";
}
else if(isset($_GET["search"])){
    $sql = "select * from tibamefe_cgd103g1.product where prod_name like '%{$search}%' order by {$order} limit {$limit} offset {$offset}";
    $sql2 = "select count(*) as 'prod_total' from tibamefe_cgd103g1.product where prod_name like '%{$search}%'";
    
}else if(isset($_GET["category"])){
    $sql = "select * from tibamefe_cgd103g1.product where prod_category='{$category}' order by {$order} limit {$limit} offset {$offset}";
    $sql2 = "select count(*) as 'prod_total' from tibamefe_cgd103g1.product where prod_category='{$category}'";
}else{
    $sql = "select * from tibamefe_cgd103g1.product order by {$order} limit {$limit} offset {$offset}";
    $sql2 = "select count(*) as 'prod_total' from tibamefe_cgd103g1.product";
}

$products = $pdo->query($sql);
$prodCount = $pdo->query($sql2);
$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
$prodRows2 = $prodCount->fetchColumn();
/* echo json_encode($prodRows);    */         
echo json_encode(array("prodCount" => (int)$prodRows2,"prods"=>$prodRows));            
?>
