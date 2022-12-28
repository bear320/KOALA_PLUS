<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

const MY_DIR = "../images/article";
$type=isset($_POST["type"])?$_POST["type"]:'';

require_once("./connect_cgd103g1.php");

if($type=='star'){
    $sql = "UPDATE tibamefe_cgd103g1.news 
    SET news_star = :news_star
    WHERE news_id = :news_id;";
    $updateNews = $pdo->prepare($sql);
    $updateNews->bindValue(":news_id", $_POST["news_id"]);
    $updateNews->bindValue(":news_star", $_POST["news_star"]);
    $updateNews->execute();

    $msg = "狀態已更新";
}else if($type=='edit'){

    switch ($_FILES["news_img"]["error"]) {
        case UPLOAD_ERR_OK:
            if (file_exists(MY_DIR) == false) {
                mkdir(MY_DIR); //make directory
            }
            $from = $_FILES["news_img"]["tmp_name"];

            $fileExt = pathinfo($_FILES["news_img"]["name"], PATHINFO_EXTENSION); //取得副檔名
            $fileName = uniqid() . "." . $fileExt; //決定檔案名稱, 如a313feexrer.gif
            $to = "../images/article/".$fileName; //決定路徑名稱
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
            $fileName = "";
            $msg = "没有上傳檔案";
            break;
        default:
            $msg = "上傳檔案失敗，錯誤代碼: " . $_FILES["error"] . "請通知系統開發人員";
    }

    try {
        
         if($fileName!=""){ 
                $sql = "UPDATE `news` SET `news_img`=:news_img,`news_title`=:news_title,`news_content`=:news_content,`news_date`=:news_date,`news_category`=:news_category,`news_status`=:news_status WHERE `news_id`=:news_id";
                $newArticle = $pdo->prepare($sql);
                $newArticle->bindValue(":news_img", $fileName);
                $newArticle->bindValue(":news_title", $_POST["news_title"]);
                $newArticle->bindValue(":news_content", $_POST["news_content"]);
                $newArticle->bindValue(":news_date", $_POST["news_date"]);
                $newArticle->bindValue(":news_category", $_POST["news_category"]);
                $newArticle->bindValue(":news_status", $_POST["news_status"]);
                $newArticle->bindValue(":news_id", $_POST["news_id"]);
                $newArticle->execute(); 
       } else{
                $sql = "UPDATE `news` SET `news_title`=:news_title,`news_content`=:news_content,`news_date`=:news_date,`news_category`=:news_category,`news_status`=:news_status WHERE `news_id`=:news_id";
                $newArticle = $pdo->prepare($sql);
                $newArticle->bindValue(":news_id", $_POST["news_id"]);
                $newArticle->bindValue(":news_title", $_POST["news_title"]);
                $newArticle->bindValue(":news_content", $_POST["news_content"]);
                $newArticle->bindValue(":news_date", $_POST["news_date"]);
                $newArticle->bindValue(":news_category", $_POST["news_category"]);
                $newArticle->bindValue(":news_status", $_POST["news_status"]);
                $newArticle->execute();
            } 
        
            $msg = "已完成";
        } catch (PDOException $e) {
            $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
        }
}

$result = ["msg" => $msg];
echo json_encode($result);

?>