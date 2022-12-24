<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=utf-8");
// $prime = 'test_3a2fb2b7e892b914a03c95dd4dd5dc7970c908df67a49527c0a648b2bc9';

// 請將這裡替換成您取得的 Prime
$prime = $_GET["prime"];
// 請將這裡替換成您的 Tappay 帳號的 API Key
$partner_key =
    "partner_YNtWVqJYUfL2NXpwQVOO6X4wCAgNuxojfrYWIbxz236ugjEFHIv0xkqy";
// 請將這裡替換成您的 Tappay 帳號的 Merchant ID
$merchant_id = "shiba198345_TAISHIN";

$header = [
    "Content-Type: application/json",
    "x-api-key: $partner_key",
    "x-gw-merchant-id: $merchant_id",
];

$post_data = [
    "prime" => $prime,
    "partner_key" => $partner_key,
    "merchant_id" => $merchant_id,
    "details" => "TapPay Test",
    "amount" => 100,
    "cardholder" => [
        "phone_number" => "0987168168",
        "name" => "王大明",
        "email" => "qwe1234@gmail.com",
    ],
    "remember" => true,
];

$options = [
    CURLOPT_URL => "https://sandbox.tappaysdk.com/tpc/payment/pay-by-prime",
    CURLOPT_HEADER => false,
    CURLOPT_VERBOSE => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $header,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($post_data),
];

$curl = curl_init();
curl_setopt_array($curl, $options);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
$response = curl_exec($curl);
$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);
$mgs = "not";

// 支付成功
if ($http_status == 200) {
    // 在這裡處理您的應用
    $mem_id = $_REQUEST["mem_id"];
    $type = $_REQUEST["type"];
    $koala_id = $_REQUEST["koala_id"];
    // $koala_id = isset($_REQUEST["koala_id"]) ? $_REQUEST["koala_id"] : "";

    require_once "./connect_cgd103g1.php";

    switch ($type) {
        // 方案 --> 資助所有無尾熊
        case "0":
            // 新增資助訂單
            $sql1 = "INSERT INTO `tibamefe_cgd103g1`.`support` ( `mem_id`, `sup_date`, `koala_id`, `sup_plan`, `sup_price`,`sup_note` ) VALUES 
            ({$mem_id}, CURDATE(), '02001', '1', '300', '');";

            // 更新無尾熊資助總金額
            $sql2 = "UPDATE koala
            SET koala_sum = koala_sum + 300
            WHERE koala_id = 2001;";

            // 更新無尾熊本月資助總金額
            $sql3 = "UPDATE koala
            SET koala_sum_this_month = (SELECT IFNULL(SUM(sup_price), 0)
                                        FROM support
                                        WHERE MONTH(sup_date) = MONTH(CURRENT_DATE) AND koala.koala_id = support.koala_id);";

            // 更新無尾熊上月資助總金額
            $sql4 = "UPDATE koala
            SET koala_sum_last_month = (SELECT IFNULL(SUM(sup_price), 0)
                                        FROM support
                                        WHERE YEAR(sup_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(sup_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) AND koala.koala_id = support.koala_id);";

            // 更新無尾熊上上月資助總金額
            $sql5 = "UPDATE koala
            SET koala_sum_the_month_before_last = (SELECT IFNULL(SUM(sup_price), 0)
                                                   FROM support
                                                   WHERE YEAR(sup_date) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH) AND MONTH(sup_date) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH) AND koala.koala_id = support.koala_id);";

            // 更新會員資助認養總金額
            $sql6 = "UPDATE member
            SET support_sum = support_sum + 300
            WHERE mem_id = {$mem_id};";

            // 更新會員點數
            $sql7 = "UPDATE member
            SET mem_point = mem_point + 300
            WHERE mem_id = {$mem_id};";

            $supportAll = $pdo->query($sql1);
            $supportAll = $pdo->query($sql2);
            $supportAll = $pdo->query($sql3);
            $supportAll = $pdo->query($sql4);
            $supportAll = $pdo->query($sql5);
            $supportAll = $pdo->query($sql6);
            $supportAll = $pdo->query($sql7);
            $supportAllRow = $supportAll->fetch(PDO::FETCH_ASSOC);

            break;

        // 方案 --> 認養無尾熊
        case "1":
            // 新增認養訂單
            $sql1 = "INSERT INTO `tibamefe_cgd103g1`.`support` ( `mem_id`, `sup_date`, `koala_id`, `sup_plan`, `sup_price`,`sup_note` ) VALUES ({$mem_id}, CURDATE(), {$koala_id}, '1', '1000', '');";

            // 更新無尾熊認養總金額
            $sql2 = "UPDATE koala
            SET koala_sum = koala_sum + 1000
            WHERE koala_id = {$koala_id};";

            // 更新無尾熊本月認養總金額
            $sql3 = "UPDATE koala
            SET koala_sum_this_month = (SELECT IFNULL(SUM(sup_price), 0)
                                        FROM support
                                        WHERE MONTH(sup_date) = MONTH(CURRENT_DATE) AND koala.koala_id = support.koala_id);";

            // 更新無尾熊上月認養總金額
            $sql4 = "UPDATE koala
            SET koala_sum_last_month = (SELECT IFNULL(SUM(sup_price), 0)
                                        FROM support
                                        WHERE YEAR(sup_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(sup_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) AND koala.koala_id = support.koala_id);";

            // 更新無尾熊上上月認養總金額
            $sql5 = "UPDATE koala
            SET koala_sum_the_month_before_last = (SELECT IFNULL(SUM(sup_price), 0)
                                                  FROM support
                                                  WHERE YEAR(sup_date) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH) AND MONTH(sup_date) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH) AND koala.koala_id = support.koala_id);";

            // 更新會員資助認養總金額
            $sql6 = "UPDATE member
            SET support_sum = support_sum + 1000
            WHERE mem_id = {$mem_id};";

            // 更新會員點數
            $sql7 = "UPDATE member
            SET mem_point = mem_point + 1000
            WHERE mem_id = {$mem_id};";

            $adoptKoala = $pdo->query($sql1);
            $adoptKoala = $pdo->query($sql2);
            $adoptKoala = $pdo->query($sql3);
            $adoptKoala = $pdo->query($sql4);
            $adoptKoala = $pdo->query($sql5);
            $adoptKoala = $pdo->query($sql6);
            $adoptKoala = $pdo->query($sql7);
            $adoptKoalaRow = $adoptKoala->fetch(PDO::FETCH_ASSOC);
            break;

        default:
            break;
    }
}

echo json_encode($response);
?>
