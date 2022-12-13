<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
$sql = "SELECT koala_id, koala_name, koala_dob, TIMESTAMPDIFF(YEAR, koala_dob, CURDATE()) 'koala_age', koala_sex, koala_info, koala_img1, koala_img2, koala_img3, koala_img4
FROM tibamefe_cgd103g1.koala
WHERE koala_listed = 1
ORDER BY koala_id ASC;";

$koalas = $pdo->query($sql);
$koalaRows = $koalas->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($koalaRows);            
?>
