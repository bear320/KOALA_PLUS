<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
const MY_DIR = "shop";
$images = $_FILES["image"];
foreach($images["tmp_name"] as $i => $tmp_name){
    switch($images["error"][$i]){
        case UPLOAD_ERR_OK:
            if( file_exists(MY_DIR) == false){
                mkdir(MY_DIR); //make directory
            }

            $from = $tmp_name;
            $fileExt = pathinfo($images["name"][$i],PATHINFO_EXTENSION);
            $fileName[$i] = uniqid() . ".". $fileExt;

            $to = "../images/shop/".$fileName[$i];
            if(copy( $from, $to)){
                $msg[] = "圖像 ".$images["name"][$i]." 上傳成功";
            }else{
                $msg[] = "圖像 ".$images["name"][$i]." 上傳失敗";
            }
            break;
        case UPLOAD_ERR_INI_SIZE:
            $msg[] = "圖像 ".$images["name"][$i]." 上傳檔案太大,不能超過 ". ini_get("upload_max_filesize") ;    
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $msg[] = "圖像 ".$images["name"][$i]." 上傳檔案太大,不能超過 ".$_POST["MAX_FILE_SIZE"];            
            break;
        case UPLOAD_ERR_PARTIAL:
            $msg[] = "圖像 ".$images["name"][$i]." 上傳檔案不完整";
            break;
        case UPLOAD_ERR_NO_FILE:
            $msg[] = "圖像 ".$images["name"][$i]." 没有上傳檔案";
            break;
        default:
            $msg[] = "圖像 ".$images["name"][$i]." 上傳檔案失敗，錯誤代碼: ".$images["error"][$i]."請通知系統開發人員";
    }
}

try {
	$prod_name = $_POST['prod_name'];
	$prod_price = $_POST['prod_price'];
	$prod_info = $_POST['prod_info'];
	$prod_listed = $_POST['prod_listed'];
	$prod_category = $_POST['prod_category'];
	$prod_img1 = $fileName[0]!==''?$fileName[0]:null;
	$prod_img2 = $fileName[1]!==''?$fileName[1]:null;
	$prod_img3 = $fileName[2]!==''?$fileName[2]:null;
	$prod_img4 = $fileName[3]!==''?$fileName[3]:null;


	require_once("./connect_cgd103g1.php");

	$sql = "INSERT INTO `product`( `prod_name`, `prod_price`, `prod_info`, `prod_listed`, `prod_category`, `prod_img1`, `prod_img2`, `prod_img3`, `prod_img4`) 
	VALUES ('$prod_name','$prod_price','$prod_info ','$prod_listed','$prod_category'
	,'$prod_img1','$prod_img2','$prod_img3','$prod_img4')";

	$inserProd =  $pdo->query($sql);
	$msg = array("status" => 0);
} catch (PDOException $e) {
	$msg = "error_line: ".$e->getLine().", error_msg: ".$e->getMessage();
}	


echo json_encode($msg)
?>    