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
            $sql1 = "SELECT s.sup_id, m.mem_name 'mem_name', s.sup_date, s.sup_plan, k.koala_name 'koala_name', s.sup_price, s.sup_note
            FROM tibamefe_cgd103g1.support s
            JOIN tibamefe_cgd103g1.member m ON s.mem_id = m.mem_id
            JOIN tibamefe_cgd103g1.koala k ON s.koala_id = k.koala_id
            WHERE sup_id LIKE '%{$search}%'
            ORDER BY sup_id DESC LIMIT {$limit} OFFSET {$offset};";
            $sql2 = "SELECT count(*) AS 'sup_count' FROM tibamefe_cgd103g1.support WHERE sup_id LIKE '%{$search}%'";
        } else {
            $sql1 = "SELECT s.sup_id, m.mem_name 'mem_name', s.sup_date, s.sup_plan, k.koala_name 'koala_name', s.sup_price, s.sup_note
            FROM tibamefe_cgd103g1.support s
            JOIN tibamefe_cgd103g1.member m ON s.mem_id = m.mem_id
            JOIN tibamefe_cgd103g1.koala k ON s.koala_id = k.koala_id
            ORDER BY sup_id DESC LIMIT {$limit} OFFSET {$offset};";
            $sql2 =
                "SELECT count(*) AS 'sup_count' FROM tibamefe_cgd103g1.support";
        }
        break;

    // 排列 --> 編號小到大
    case "1":
        if (isset($_GET["search"])) {
            $sql1 = "SELECT s.sup_id, m.mem_name 'mem_name', s.sup_date, s.sup_plan, k.koala_name 'koala_name', s.sup_price, s.sup_note
            FROM tibamefe_cgd103g1.support s
            JOIN tibamefe_cgd103g1.member m ON s.mem_id = m.mem_id
            JOIN tibamefe_cgd103g1.koala k ON s.koala_id = k.koala_id
            WHERE sup_id LIKE '%{$search}%'
            ORDER BY sup_id ASC LIMIT {$limit} OFFSET {$offset};";
            $sql2 = "SELECT count(*) AS 'sup_count' FROM tibamefe_cgd103g1.support WHERE sup_id LIKE '%{$search}%'";
        } else {
            $sql1 = "SELECT s.sup_id, m.mem_name 'mem_name', s.sup_date, s.sup_plan, k.koala_name 'koala_name', s.sup_price, s.sup_note
            FROM tibamefe_cgd103g1.support s
            JOIN tibamefe_cgd103g1.member m ON s.mem_id = m.mem_id
            JOIN tibamefe_cgd103g1.koala k ON s.koala_id = k.koala_id
            ORDER BY sup_id ASC LIMIT {$limit} OFFSET {$offset};";
            $sql2 =
                "SELECT count(*) AS 'sup_count' FROM tibamefe_cgd103g1.support";
        }
        break;

    default:
        break;
}

$support = $pdo->query($sql1);
$supportRows = $support->fetchAll(PDO::FETCH_ASSOC);
$supportCount = $pdo->query($sql2);
$supportCountRow = $supportCount->fetchColumn();
echo json_encode([
    "support" => $supportRows,
    "supportCount" => $supportCountRow,
]);
?>
