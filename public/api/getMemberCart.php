<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");

$memId = $_GET['memId'];

// $sql = "select * from tibamefe_cgd103g1.cart where mem_id={$memId}";
$sql = "SELECT c1.mem_id,c1.prod_id,c1.cart_qty,c2.prod_name,c2.prod_price,c2.prod_img1
        FROM cart c1 JOIN product c2 ON c1.prod_id = c2.prod_id where c1.mem_id=1001";

$memCart = $pdo->query($sql);
$memCartRows = $memCart->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($memCartRows);            
?>
