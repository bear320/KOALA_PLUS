<?php
//include "db_func.php"; 
require_once 'ECPay.Payment.Integration.php';
require_once("./connect_cgd103g1.php");

// 將 post 資料轉成字串 儲存 SaveData
$String = print_r( $_POST, true );
//file_put_contents( 'tmp/ECPay.txt', $String, FILE_APPEND );
 
//writelogV1("tmp/log.txt" ,"ECPay_ReturnURL.php======================");  
//writelogV1("tmp/log.txt" ,$String); 
 
 
define( 'ECPay_MerchantID', '2000132' );
define( 'ECPay_HashKey', '5294y06JbISpM5x9' );
define( 'ECPay_HashIV', 'v77hoKGq4kWxNNIS' );
 
// 重新整理回傳參數。
$arParameters = $_POST;
foreach ($arParameters as $keys => $value) {
    if ($keys != 'CheckMacValue') {
        if ($keys == 'PaymentType') {
            $value = str_replace('_CVS', '', $value);
            $value = str_replace('_BARCODE', '', $value);
            $value = str_replace('_CreditCard', '', $value);
        }
        if ($keys == 'PeriodType') {
            $value = str_replace('Y', 'Year', $value);
            $value = str_replace('M', 'Month', $value);
            $value = str_replace('D', 'Day', $value);
        }
        $arFeedback[$keys] = $value;
    }
}
 
// 計算出 CheckMacValue
$CheckMacValue = ECPay_CheckMacValue::generate( $arParameters, ECPay_HashKey, ECPay_HashIV );
 
// 必須要支付成功並且驗證碼正確
if ( $_POST['RtnCode'] =='1' && $CheckMacValue == $_POST['CheckMacValue'] ){
    // 
    // 要處理的程式放在這裡，例如將線上服務啟用、更新訂單資料庫付款資訊等
    // 
    $sql = "DELETE FROM cart WHERE `cart`.`mem_id` = 1001 AND `cart`.`prod_id` = 5002";
    $reservation = $pdo->query($sql);
}
 
// 接收到資訊回應綠界
echo '1|OK';


/*  //回傳結果內容
Array ( 
[CustomField1] => 2021063000000001 		//自訂欄位
[CustomField2] => 						//自訂欄位
[CustomField3] => 						//自訂欄位
[CustomField4] => 						//自訂欄位
[MerchantID] => 2000132 				//特店編號
[MerchantTradeNo] => 1625040839 		//特店交易編號(店家的交易編號.傳送給綠界)
[PaymentDate] => 2021/06/30 16:15:25 	//特店付款時間
[PaymentType] => Credit_CreditCard 		//特店付款方式
[PaymentTypeChargeFee] => 1 			//交易手續費
[RtnCode] => 1 							//交易狀態.1代表成功.其他表示異常
[RtnMsg] => 交易成功 					//交易訊息
[SimulatePaid] => 0 					//是否為模擬付款.0非模擬
[StoreID] => 							//特店旗下店面代號
[TradeAmt] => 60 						//交易金額
[TradeDate] => 2021/06/30 16:13:59 						//訂單成立時間
[TradeNo] => 2106301613594069 							//綠界交易編號
[CheckMacValue] => 74DDA40F0DCCD7DD740FA2155F6BAF00 	//檢查碼
)  */