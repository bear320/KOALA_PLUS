<?php 
/**
 * 編輯會員資料/會員密碼接口 會員登出功能
 * 接 components / MemCentre.vue
*/

//header設置
require_once("./headerUse.php");
//驗證登入
require_once("./verifyFrontLogin.php");

session_destroy();
//刪除當前用戶對應的 session 檔案以及釋放 session ID，內存中的 $_SESSION 變數內容依然保留。

echo json_encode(["status"=>1,"msg"=>"已登出"]);
return true;


?>
