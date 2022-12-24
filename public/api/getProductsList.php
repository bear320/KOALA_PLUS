<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";

$sort = $_GET["sort"];
$search = isset($_GET["search"]) ? $_GET["search"] : "";
$limit = 10;
$page = $_GET["page"] - 1;
$offset = $page * $limit;

// 判斷排列方式
switch ($sort) {
    // 排列 --> 編號大到小 (預設)
    case "0":
        if (isset($_GET["search"])) {
            $sql1 = "SELECT * FROM tibamefe_cgd103g1.product
            WHERE prod_id LIKE '%{$search}%'
            ORDER BY prod_id ASC LIMIT {$limit} OFFSET {$offset};";
           $sql2 =
           "SELECT count(*) AS 'prod_count' FROM tibamefe_cgd103g1.product";
        } else {
            $sql1 = "SELECT * FROM tibamefe_cgd103g1.product
            ORDER BY prod_id ASC LIMIT {$limit} OFFSET {$offset};";
            $sql2 =
                "SELECT count(*) AS 'prod_count' FROM tibamefe_cgd103g1.product";
        }
        break;

    // 排列 --> 編號小到大
    case "1":
        if (isset($_GET["search"])) {
            $sql1 = "SELECT * FROM tibamefe_cgd103g1.product
            WHERE prod_id LIKE '%{$search}%'
            ORDER BY prod_id DESC LIMIT {$limit} OFFSET {$offset};";
            $sql2 = "SELECT count(*) AS 'prod_count' FROM tibamefe_cgd103g1.product WHERE prod_id LIKE '%{$search}%' LIMIT {$limit} OFFSET {$offset};";
        } else {
            $sql1 = "SELECT * FROM tibamefe_cgd103g1.product
            ORDER BY prod_id DESC LIMIT {$limit} OFFSET {$offset};";
            $sql2 =
                "SELECT count(*) AS 'prod_count' FROM tibamefe_cgd103g1.product";
        }
        break;

    default:
        break;
}

$prod = $pdo->query($sql1);
$prodRows = $prod->fetchAll(PDO::FETCH_ASSOC);
$prodCount = $pdo->query($sql2);
$prodCountRow = $prodCount->fetchColumn();
echo json_encode([
    "prod" => $prodRows,
    "prodCount" => $prodCountRow,
],JSON_NUMERIC_CHECK);
?>
