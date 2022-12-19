<?php
/**
*    Credit信用卡付款產生訂單範例
*/
    header('Access-Control-Allow-Origin:*');
    // header("Content-Type:application/json;charset=utf-8");
    //載入SDK(路徑可依系統規劃自行調整)
    include('./ECPay.Payment.Integration.php');
    try {
        require_once("./connect_cgd103g1.php");
        $mem_id = $_POST['mem_id'];
        $sql = "DELETE FROM cart WHERE `cart`.`mem_id` = {$mem_id} AND `cart`.`prod_id` = 5003";
       
    	$obj = new ECPay_AllInOne();
        //服務參數
        $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";   //服務位置
        $obj->HashKey     = '5294y06JbISpM5x9' ;                                           //測試用Hashkey，請自行帶入ECPay提供的HashKey
        $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                           //測試用HashIV，請自行帶入ECPay提供的HashIV
        $obj->MerchantID  = '2000132';                                                     //測試用MerchantID，請自行帶入ECPay提供的MerchantID
        $obj->EncryptType = '1';                                                           //CheckMacValue加密類型，請固定填入1，使用SHA256加密


        //基本參數(請依系統規劃自行調整)
        $MerchantTradeNo = "Test".time() ;
        $obj->Send['ReturnURL']         = "http://localhost/cgd103_g1/public/api/ECPay_ReturnURL.php" ;    //付款完成通知回傳的網址
        $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                          //訂單編號
        $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                       //交易時間
        $obj->Send['TotalAmount']       = 2000;                                      //交易金額
        $obj->Send['TradeDesc']         = "good to drink" ;                          //交易描述
        $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::Credit ;              //付款方式:Credit
        $obj->Send['IgnorePayment']     = ECPay_PaymentMethod::GooglePay ;           //不使用付款方式:GooglePay
        $obj->Send['ClientBackURL'] = "https://www.google.com.tw/?hl=zh_TW";
        //訂單的商品資料
        array_push($obj->Send['Items'], array('Name' => "{$mem_id}", 'Price' => (int)"2000",
                   'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));


        //產生訂單(auto submit至ECPay)
        $reservation = $pdo->query($sql);
        $obj->CheckOut();
    
    } catch (Exception $e) {
    	echo $e->getMessage();
    } 


 
?>