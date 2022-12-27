<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
try {
	$prod_name = $_POST["prod_name"];
	$prod_price = $_POST['prod_price'];
	$prod_info = $_POST['prod_info'];
	$prod_listed = $_POST['prod_listed'];
	$prod_category = $_POST['prod_category'];

	/* $sql = "UPDATE `product` SET `prod_name`=$prod_name,`prod_price`=$prod_price,`prod_info`=$prod_info,
    `prod_listed`=$prod_listed,`prod_category`=$prod_category
    ,`prod_img1`='prod-1.jpg',`prod_img2`='null',`prod_img3`='null',`prod_img4`='null' WHERE `prod_id`='5001'"; */
	$sql = "UPDATE `product` SET `prod_name`='$prod_name',`prod_price`='$prod_price',prod_info='$prod_info',prod_listed='$prod_listed',prod_category='$prod_category'
    WHERE `prod_id`='5001';";

	$updateProd =  $pdo->query($sql);
	$msg = array("status" => 0);
} catch (PDOException $e) {
	$msg = "error_line: ".$e->getLine().", error_msg: ".$e->getMessage();
}	


echo json_encode($msg)
?>    