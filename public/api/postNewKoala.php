<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");

const MY_DIR = "../images/koalas";
$images = $_FILES["image"];
foreach ($images["tmp_name"] as $i => $tmp_name) {
    switch ($images["error"][$i]) {
        case UPLOAD_ERR_OK:
            if (file_exists(MY_DIR) == false) {
                mkdir(MY_DIR); //make directory
            }

            $from = $tmp_name;
            $fileExt = pathinfo($images["name"][$i], PATHINFO_EXTENSION);
            $fileName[$i] = uniqid() . "." . $fileExt;

            $to = "../images/koalas/" . $fileName[$i];
            if (copy($from, $to)) {
                $msg[] = "圖像 " . $images["name"][$i] . " 上傳成功";
            } else {
                $msg[] = "圖像 " . $images["name"][$i] . " 上傳失敗";
            }
            break;
        case UPLOAD_ERR_INI_SIZE:
            $msg[] =
                "圖像 " .
                $images["name"][$i] .
                " 上傳檔案太大,不能超過 " .
                ini_get("upload_max_filesize");
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $msg[] =
                "圖像 " .
                $images["name"][$i] .
                " 上傳檔案太大,不能超過 " .
                $_POST["MAX_FILE_SIZE"];
            break;
        case UPLOAD_ERR_PARTIAL:
            $msg[] = "圖像 " . $images["name"][$i] . " 上傳檔案不完整";
            break;
        case UPLOAD_ERR_NO_FILE:
            $msg[] = "圖像 " . $images["name"][$i] . " 没有上傳檔案";
            break;
        default:
            $msg[] =
                "圖像 " .
                $images["name"][$i] .
                " 上傳檔案失敗，錯誤代碼: " .
                $images["error"][$i] .
                "請通知系統開發人員";
    }
}

try {
    require_once "./connect_cgd103g1.php";

    $koala_name = $_POST["koala_name"];
    $koala_dob = $_POST["koala_dob"];
    $koala_sex = $_POST["koala_sex"];
    $koala_info = $_POST["koala_info"];
    $koala_listed = $_POST["koala_listed"];
    // $koala_img1 = $fileName[0] !== "" ? $fileName[0] : null;
    // $koala_img2 = $fileName[1] !== "" ? $fileName[1] : null;
    // $koala_img3 = $fileName[2] !== "" ? $fileName[2] : null;
    // $koala_img4 = $fileName[3] !== "" ? $fileName[3] : null;
    $koala_img1 = isset($fileName[0]) ? $fileName[0] : null;
    $koala_img2 = isset($fileName[1]) ? $fileName[1] : null;
    $koala_img3 = isset($fileName[2]) ? $fileName[2] : null;
    $koala_img4 = isset($fileName[3]) ? $fileName[3] : null;

    $sql = "INSERT INTO tibamefe_cgd103g1.koala ( `koala_name`, `koala_dob`, `koala_sex`, `koala_info`, `koala_listed`, `koala_sum`, `koala_sum_this_month`, `koala_sum_last_month`, `koala_sum_the_month_before_last`, `koala_img1`, `koala_img2`, `koala_img3`, `koala_img4`) VALUES ('$koala_name', '$koala_dob', '$koala_sex', '$koala_info', '$koala_listed', 0, 0, 0, 0, '$koala_img1', '$koala_img2', '$koala_img3', '$koala_img4');";

    $newKoala = $pdo->query($sql);
    // $msg = "新增無尾熊成功";
    $msg = ["status" => 0];
} catch (PDOException $e) {
    $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
}

// $result = ["msg" => $msg];
echo json_encode($msg);
?>
