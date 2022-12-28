<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
require_once "./connect_cgd103g1.php";
const MY_DIR = "../images/koalas";

$type = $_POST["type"];
$index = $_POST["index"];
$koala_name = $_POST["koala_name"];

$koala_column = "koala_img" . "$index";

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
            $to = "../images/koalas/" . $fileName; //決定路徑名稱
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
            $msg =
                "上傳檔案失敗，錯誤代碼: " .
                $_FILES["error"] .
                "請通知系統開發人員";
    }
    if ($_FILES["image"]["error"] === 0) {
        try {
            $reSortSQL = "UPDATE `koala` SET `$koala_column`='$fileName' WHERE `koala_name`='$koala_name';";
            $reSort = $pdo->query($reSortSQL);
        } catch (PDOException $e) {
            $msg =
                "錯誤行號 : " .
                $e->getLine() .
                ", 錯誤訊息 : " .
                $e->getMessage();
        }
    }
    echo json_encode($_POST);
} elseif ($type == "del") {
    $delImgSQL = "UPDATE `koala` SET `$koala_column`='null' WHERE `koala_name`='$koala_name';";
    $delImg = $pdo->query($delImgSQL);

    $sql = "select * from tibamefe_cgd103g1.koala where koala_name='$koala_name'";
    $koalas = $pdo->query($sql);
    $koalaRows = $koalas->fetch(PDO::FETCH_ASSOC);

    $newArr = [
        $koalaRows["koala_img1"],
        $koalaRows["koala_img2"],
        $koalaRows["koala_img3"],
        $koalaRows["koala_img4"],
    ];

    $filtered = array_filter($newArr, function ($val) {
        return $val !== "null";
    });
    $result = array_values($filtered);

    $koala_img1 = isset($result[0]) ? $result[0] : null;
    $koala_img2 = isset($result[1]) ? $result[1] : null;
    $koala_img3 = isset($result[2]) ? $result[2] : null;
    $koala_img4 = isset($result[3]) ? $result[3] : null;

    $reSortSQL = "UPDATE `koala` SET `koala_img1`='$koala_img1',`koala_img2`='$koala_img2',`koala_img3`='$koala_img3',`koala_img4`='$koala_img4'
    WHERE `koala_name`='$koala_name';";
    $reSort = $pdo->query($reSortSQL);

    $sql = "select * from tibamefe_cgd103g1.koala where koala_name='$koala_name'";
    $newRows = $pdo->query($sql);
    $koalaRows2 = $newRows->fetch(PDO::FETCH_ASSOC);

    $msg = ["status" => 0];
    echo json_encode([
        $koalaRows2["koala_img1"],
        $koalaRows2["koala_img2"],
        $koalaRows2["koala_img3"],
        $koalaRows2["koala_img4"],
    ]);
}
?>     ?> ?>