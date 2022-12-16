
<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
$account = empty( $_GET["mem_account"] ) ? ( $_POST["mem_account"] ?? "" ) : $_GET["mem_account"];
$psw = empty( $_GET["mem_psw"] ) ? ( $_POST["mem_psw"] ?? "" ) : $_GET["mem_psw"];

$sql = "select * from tibamefe_cgd103g1.employee;";

$admin = $pdo->query($sql);
$adminRows = $admin->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($adminRows);            
?>