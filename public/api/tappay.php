<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
// $prime = 'test_3a2fb2b7e892b914a03c95dd4dd5dc7970c908df67a49527c0a648b2bc9'; // 請將這裡替換成您取得的 Prime
$prime = $_GET['prime']; // 請將這裡替換成您取得的 Prime
$partner_key = "partner_YNtWVqJYUfL2NXpwQVOO6X4wCAgNuxojfrYWIbxz236ugjEFHIv0xkqy"; // 請將這裡替換成您的 Tappay 帳號的 API Key
$merchant_id = "shiba198345_TAISHIN"; // 請將這裡替換成您的 Tappay 帳號的 Merchant ID




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
    "amount" => 100,
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
$mem_id = $_REQUEST['mem_id'];
$ord_person=$_REQUEST['ord_person'];
$ord_phone=$_REQUEST['ord_phone'];
$ord_add=$_REQUEST['ord_add'];
$coupon_id =$_REQUEST['coupon_id'];

// SQL相關
require_once("./connect_cgd103g1.php");
$sumSQL = "SELECT c1.mem_id,c1.prod_id,c1.cart_qty,c2.prod_price, c1.cart_qty * c2.prod_price 'times', sum(c1.cart_qty * c2.prod_price) 'sum' FROM cart c1 JOIN product c2 ON c1.prod_id = c2.prod_id where c1.mem_id={$mem_id}";
$sumQuery = $pdo->query($sumSQL);
$sum=$sumQuery->fetch(PDO::FETCH_ASSOC);

$order_sum = (int) $sum['sum'];

$order_discount = 0;

if($coupon_id==='undefined'){
  return;  
}else{
  $couponSQL = "SELECT * FROM `coupon` WHERE coupon_id={$coupon_id}";
  $couponQuery = $pdo->query($couponSQL);
  $couponRes=$couponQuery->fetch(PDO::FETCH_ASSOC);
  
  $discount = isset($couponRes['coupon_discount'])? (float) $couponRes['coupon_discount']:0;
  $order_discount =($discount==0) ? 0:$order_sum - $discount * $order_sum;
}

$order_pay = $order_sum - $order_discount;

$insertOrderSQL = "INSERT INTO `orders`(`mem_id`, `coupon_id`, `ord_date`, `ord_sum`, `ord_disc`, `ord_pay`, `ord_person`, `ord_phone`, `ord_add`) VALUES ('$mem_id',$coupon_id,curdate(),'$order_sum','$order_discount','$order_pay','$ord_person','$ord_phone','$ord_add')";
$insertOrder = $pdo->query($insertOrderSQL);
}

/* **********建立商品訂單********** */

$cartSQL = "SELECT c1.mem_id,c1.prod_id,c1.cart_qty,c2.prod_price FROM cart c1 JOIN product c2 ON c1.prod_id = c2.prod_id where c1.mem_id={$mem_id}";
$cartQuery = $pdo->query($cartSQL);
$cart=$cartQuery->fetchAll(PDO::FETCH_ASSOC);

foreach($cart as $item){
  $insertOrderListSQL = "INSERT INTO order_list(ord_id, prod_id, ord_qty, prod_price) SELECT (SELECT MAX(ord_id) FROM orders) AS ord_id, '{$item['prod_id']}', '{$item['cart_qty']}', '{$item['prod_price']}'";
  $insertOrderList = $pdo->query($insertOrderListSQL);

}

/* **********刪除會員的購物車********** */

foreach($cart as $item){
  $insertOrderListSQL = "DELETE FROM cart WHERE mem_id = {$mem_id} AND prod_id = {$item['prod_id']}";
  $insertOrderList = $pdo->query($insertOrderListSQL);
}

/* **********更新會員的點數********** */

$point = $order_sum * 0.1;

$updatePointSQL = "UPDATE `member` SET `mem_point`=mem_point + {$point} WHERE mem_id={$mem_id}";
$updatePointQuery = $pdo->query($updatePointSQL);

/* **********更改會員優惠卷的狀態********** */


if($coupon_id==='undefined'){
  return;  
}else{
  $updateMemCouponSQL = "UPDATE `my_coupon` SET `coupon_status`='1' WHERE mem_id={$mem_id} and coupon_id={$coupon_id}";
  $updateMemCouponQuery = $pdo->query($updateMemCouponSQL);
}




echo json_encode($response) ;
?>

