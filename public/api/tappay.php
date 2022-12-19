<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
$prime = 'test_3a2fb2b7e892b914a03c95dd4dd5dc7970c908df67a49527c0a648b2bc9'; // 請將這裡替換成您取得的 Prime
// $prime = $_GET['prime']; // 請將這裡替換成您取得的 Prime
$partner_key = "partner_YNtWVqJYUfL2NXpwQVOO6X4wCAgNuxojfrYWIbxz236ugjEFHIv0xkqy"; // 請將這裡替換成您的 Tappay 帳號的 API Key
$merchant_id = "shiba198345_CTBC_Union_Pay"; // 請將這裡替換成您的 Tappay 帳號的 Merchant ID

$header = array(
    "Content-Type: application/json",
    "x-api-key: $partner_key",
    "x-gw-merchant-id: $merchant_id"
);

$post_data = array(
    "prime" => $prime,
    "partner_key" => $partner_key,
    "merchant_id" => $merchant_id ,
    "details" => "TapPay Test",
    "amount" => 8787,
    "cardholder" => array(
      "phone_number" => '0987168168',
      "name" => '王大明',
      "email" => 'qwe1234@gmail.com'
    ),
    "remember" => true
  );

$options = array(
    CURLOPT_URL => "https://sandbox.tappaysdk.com/tpc/payment/pay-by-prime",
    CURLOPT_HEADER => false,
    CURLOPT_VERBOSE => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $header,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($post_data)
);

$curl = curl_init();
curl_setopt_array($curl, $options);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
$response = curl_exec($curl);
$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);
$mgs = 'not';

if ($http_status == 200) {
    // 支付成功
    // 在這裡處理您的應用
    $mgs = 'nice';
}

echo json_encode($response) ;
?>