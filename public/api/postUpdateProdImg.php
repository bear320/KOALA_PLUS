<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
const MY_DIR = "shop";

$type = $_POST["type"];
$index= $_POST["index"];

$prod_column = "prod_img" . "$index";

/* $images = $_FILES["image"];
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
} */
/* try {
	$sql = "UPDATE `product` SET `prod_name`='$prod_name',`prod_price`='$prod_price',prod_info='$prod_info',prod_listed='$prod_listed',prod_category='$prod_category',
    `prod_img1`='$prod_img1',`prod_img2`='$prod_img2',`prod_img3`='$prod_img3',`prod_img4`='$prod_img4'
    WHERE `prod_id`='5001';";

	$updateProd =  $pdo->query($sql);
	$msg = array("status" => 0);
} catch (PDOException $e) {
	$msg = "error_line: ".$e->getLine().", error_msg: ".$e->getMessage();
}	
 */


if ($type == "insert") {
    switch ($_FILES["image"]["error"]) {
        case UPLOAD_ERR_OK:
            if (file_exists(MY_DIR) == false) {
                mkdir(MY_DIR); //make directory
            }
            $from = $_FILES["image"]["tmp_name"];

            //$_FILES["image"]["name"]; //smile.gif,  sara.smile.gif, a313feexrer.gif
            $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION); //取得副檔名
            $fileName = uniqid() . "." . $fileExt; //決定檔案名稱, 如a313feexrer.gif
            $to = "../images/shop/".$fileName; //決定路徑名稱
            if (copy($from, $to)) {
                $msg = "上傳成功";
            } else {
                $msg = "上傳失敗";
            }
            break;
        case UPLOAD_ERR_INI_SIZE:
            $msg = "上傳檔案太大,不能超過 " . ini_get("upload_max_filesize");
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $msg = "上傳檔案太大,不能超過 " . $_POST["MAX_FILE_SIZE"];
            break;
        case UPLOAD_ERR_PARTIAL:
            $msg = "上傳檔案不完整";
            break;
        case UPLOAD_ERR_NO_FILE:
            $msg = "没有上傳檔案";
            break;
        default:
            $msg = "上傳檔案失敗，錯誤代碼: " . $_FILES["error"] . "請通知系統開發人員";
    }
    if( $_FILES["image"]["error"] === 0){
        try{
            $reSortSQL = "UPDATE `product` SET `$prod_column`='$fileName' WHERE `prod_id`='5003';";
            $reSort =  $pdo->query($reSortSQL);
        }
        catch (PDOException $e) {
		    $msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
	    }	
    }
    echo json_encode($_POST);
}


else if($type=='del'){
    $delImgSQL = "UPDATE `product` SET `$prod_column`='null' WHERE `prod_id`='5003';";
    $delImg =  $pdo->query($delImgSQL);
 

    $sql = "select * from tibamefe_cgd103g1.product where prod_id='5003 '";
    $products = $pdo->query($sql);
    $prodRows = $products->fetch(PDO::FETCH_ASSOC);

    $newArr=array($prodRows["prod_img1"],$prodRows["prod_img2"],$prodRows["prod_img3"],$prodRows["prod_img4"]);

    $filtered = array_filter($newArr, function($val) {
        return $val !== 'null';
    });
    $result = array_values($filtered);
   
    $prod_img1=isset($result[0])?$result[0]:null;
    $prod_img2=isset($result[1])?$result[1]:null;
    $prod_img3=isset($result[2])?$result[2]:null;
    $prod_img4=isset($result[3])?$result[3]:null;

    $reSortSQL = "UPDATE `product` SET `prod_img1`='$prod_img1',`prod_img2`='$prod_img2',`prod_img3`='$prod_img3',`prod_img4`='$prod_img4'
    WHERE `prod_id`='5003';";
    $reSort =  $pdo->query($reSortSQL);

    $sql = "select * from tibamefe_cgd103g1.product where prod_id='5003 '";
    $newRows = $pdo->query($sql);
    $prodRows2 = $newRows->fetch(PDO::FETCH_ASSOC);

    $msg = array("status" => 0);
    echo json_encode([$prodRows2["prod_img1"],$prodRows2["prod_img2"],$prodRows2["prod_img3"],$prodRows2["prod_img4"]]);
}

?>    