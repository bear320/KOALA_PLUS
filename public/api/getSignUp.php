<?php
// try {
//     require_once("./headerUse.php");   //header設置
//     require_once("./connect_cgd103g1.php");   //DB連線設置

//     $sql = "UPDATE tibamefe_cgd103g1.support SET sup_note = :sup_note WHERE sup_id = :sup_id;";

//     $updateSupport = $pdo->prepare($sql);
//     $updateSupport->bindValue(":sup_id", $_POST["sup_id"]);
//     $updateSupport->bindValue(":sup_note", $_POST["sup_note"]);
//     $updateSupport->execute();
//     $msg = "資料已更新";
// } catch (PDOException $e) {
//     $msg = "錯誤行號 : " . $e->getLine() . ", 錯誤訊息 : " . $e->getMessage();
// }

// $result = ["msg" => $msg];
// echo json_encode($result);

// try {
//     session_start();
// 	header('Content-Type:application/json; charset=utf-8');
// 	$myid = $_POST[userid];
// 	$mycode = md5($_POST[usercode]);
// 	$myname = $_POST[username];
// 	$mymail = $_POST[usermail];
// 	$gm = 'vchenzhecom';
// 	$conn = new mysqli("47.106.190.129:3306", "root", "52F7cbad94f2", "personal");
// 	$test = "SELECT * FROM user_login WHERE `user_id` = '$myid'";
// 	$testResult = $conn->query($test);
// 	if(mysqli_num_rows($testResult)==0)
// 	{
// 		$path="/home/www/htdocs/carelesswhisper/src/img/".$myid; //判断目录存在否，存在给出提示，不存在则创建目录
// 		if (is_dir($path)){
// 			$result = ['code'=>'1','msg'=>'覆盖用户目录']; 
// 		}
// 		else{//第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
// 			$res=mkdir(iconv("UTF-8", "GBK", $path),0777,true); 
// 			$result = ['code'=>'1','msg'=>'注册成功'];
// 		}
// 		$conn->query(" INSERT INTO user_login VALUES('$myid','$mycode','$myname','$mymail','imageFile/image.jpg','未填','未填','未填','未填','0') ");
// 		$conn->query("INSERT INTO personal_follow VALUES('$gm','$myid',1,'2019',0)");
// 		$conn->query("INSERT INTO personal_follow VALUES('$myid','$gm',1,'2019',0)");
// 		$conn->close();
		
// 	}
// 	else{
// 		$result = ['code'=>'0','msg'=>'此用户名已被使用']; 
// 	}
// 	$_SESSION['code']='';
// 	echo json_encode($result);
// }









// const MY_DIR = "images";

// switch($_FILES["image"]["error"] ){
// 	case UPLOAD_ERR_OK : 
		
// 		if( file_exists(MY_DIR) == false){
// 			mkdir(MY_DIR); //make directory
// 		}
// 		$from = $_FILES["image"]["tmp_name"];

// 		//$_FILES["image"]["name"]; //smile.gif,  sara.smile.gif, a313feexrer.gif
// 		$fileExt = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION); //取得副檔名
// 		$fileName = uniqid() . ".". $fileExt; //決定檔案名稱, 如a313feexrer.gif
// 		$to = MY_DIR . "/". $fileName; //決定路徑名稱
// 		if(copy( $from, $to)){
// 			$msg = "上傳成功";
// 		}else{
// 			$msg = "上傳失敗";
// 		}
// 		break;
// 	case UPLOAD_ERR_INI_SIZE:
// 	    $msg = "上傳檔案太大,不能超過 ". ini_get("upload_max_filesize") ;	
// 	    break;
// 	case UPLOAD_ERR_FORM_SIZE:
// 	    $msg = "上傳檔案太大,不能超過 ".$_POST["MAX_FILE_SIZE"];			    
// 	    break;
//     case UPLOAD_ERR_PARTIAL:
//     	$msg = "上傳檔案不完整";
//     	break;
//     case UPLOAD_ERR_NO_FILE:
//         $msg = "没有上傳檔案";
//         break;
//     default:
//         $msg = "上傳檔案失敗，錯誤代碼: ".$_FILES["error"]."請通知系統開發人員";
// }
// if( $_FILES["image"]["error"] === 0){
  	
	try{
		//header設置
        require_once("./headerUse.php");
        //DB連線設置
        require_once("./connect_cgd103g1.php");
		//sql 指令
		$sql = "insert into tibamefe_cgd103g1.member values (null, :mem_name, :mem_account, :mem_psw)";
		//編譯, 執行
		$products = $pdo->prepare($sql);	
		$products->bindValue(":mem_name", $_POST["mem_name"]);
		$products->bindValue(":mem_account", $_POST["mem_account"]);
		$products->bindValue(":mem_psw", $_POST["mem_psw"]);
		$products->execute();	

	    $msg = "新增成功";
	} catch (PDOException $e) {
		$msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
	}	
// }
//輸出結果
$result = ["msg"=>$msg];
echo json_encode($result);
?>
