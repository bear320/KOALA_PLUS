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
    // 排列 --> 編號小到大 (預設)
    case "0":
        if (isset($_GET["search"])) {
            $sql1 = "SELECT koala_id, koala_name, koala_sex, koala_dob, TIMESTAMPDIFF(YEAR, koala_dob, CURDATE()) 'koala_age', koala_listed
            FROM koala
            WHERE koala_name LIKE '%{$search}%'
            ORDER BY koala_id ASC LIMIT {$limit} OFFSET {$offset};";
            $sql2 = "SELECT count(*) AS 'koala_count' FROM tibamefe_cgd103g1.koala WHERE koala_name LIKE '%{$search}%'";
        } else {
            $sql1 = "SELECT koala_id, koala_name, koala_sex, koala_dob, TIMESTAMPDIFF(YEAR, koala_dob, CURDATE()) 'koala_age', koala_listed
            FROM koala
            ORDER BY koala_id ASC LIMIT {$limit} OFFSET {$offset};";
            $sql2 =
                "SELECT count(*) AS 'koala_count' FROM tibamefe_cgd103g1.koala";
        }
        break;

    // 排列 --> 編號大到小
    case "1":
        if (isset($_GET["search"])) {
            $sql1 = "SELECT koala_id, koala_name, koala_sex, koala_dob, TIMESTAMPDIFF(YEAR, koala_dob, CURDATE()) 'koala_age', koala_listed
            FROM koala
            WHERE koala_name LIKE '%{$search}%'
            ORDER BY koala_id DESC LIMIT {$limit} OFFSET {$offset};";
            $sql2 = "SELECT count(*) AS 'koala_count' FROM tibamefe_cgd103g1.koala WHERE koala_name LIKE '%{$search}%'";
        } else {
            $sql1 = "SELECT koala_id, koala_name, koala_sex, koala_dob, TIMESTAMPDIFF(YEAR, koala_dob, CURDATE()) 'koala_age', koala_listed
            FROM koala
            ORDER BY koala_id DESC LIMIT {$limit} OFFSET {$offset};";
            $sql2 =
                "SELECT count(*) AS 'koala_count' FROM tibamefe_cgd103g1.koala";
        }
        break;

    default:
        break;
}

// $sql1 = "SELECT koala_id, koala_name, koala_sex, koala_dob, TIMESTAMPDIFF(YEAR, koala_dob, CURDATE()) 'koala_age', koala_listed
// FROM koala
// ORDER BY koala_id ASC LIMIT {$limit} OFFSET {$offset};";
// $sql2 = "SELECT count(*) AS 'koala_count' FROM tibamefe_cgd103g1.koala";

$koalas = $pdo->query($sql1);
$koalaRows = $koalas->fetchAll(PDO::FETCH_ASSOC);
$koalaCount = $pdo->query($sql2);
$koalaCountRow = $koalaCount->fetchColumn();
echo json_encode(["koalas" => $koalaRows, "koalaCount" => $koalaCountRow]);
?>
