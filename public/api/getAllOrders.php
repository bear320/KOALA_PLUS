<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";

$search = isset($_GET["search"]) ? $_GET["search"] : "";
$limit = 10;
$page = $_GET["page"] - 1;
$offset = $page * $limit;

if (isset($_GET["search"])) {
    $sql1 = "SELECT o.*, m.mem_id
    FROM tibamefe_cgd103g1.orders o
    JOIN tibamefe_cgd103g1.member m ON o.mem_id = m.mem_id
    WHERE ord_id LIKE '%{$search}%'
    ORDER BY ord_id DESC LIMIT {$limit} OFFSET {$offset};";
    $sql2 = "SELECT count(*) AS 'order_count' FROM tibamefe_cgd103g1.orders WHERE ord_id LIKE '%{$search}%'";
} else {
    $sql1 = "SELECT o.*, m.mem_id
    FROM tibamefe_cgd103g1.orders o
    JOIN tibamefe_cgd103g1.member m ON o.mem_id = m.mem_id
    ORDER BY ord_id DESC LIMIT {$limit} OFFSET {$offset};";
    $sql2 = "SELECT count(*) AS 'order_count' FROM tibamefe_cgd103g1.orders";
}

$orderlist = $pdo->query($sql1);
$orderlistRows = $orderlist->fetchAll(PDO::FETCH_ASSOC);
$orderCount = $pdo->query($sql2);
$orderCountRow = $orderCount->fetchColumn();
echo json_encode(["orders" => $orderlistRows, "orderCount" => $orderCountRow]);
?>
