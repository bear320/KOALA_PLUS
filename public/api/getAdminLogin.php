
<?php 
//header設置
require_once("./headerUse.php");
//DB連線設置
require_once("./connect_cgd103g1.php");

$login_account = empty( $_GET["emp_account"] ) ? ( $_POST["emp_account"] ?? "" ) : $_GET["emp_account"];
$login_psw = empty( $_GET["emp_psw"] ) ? ( $_POST["emp_psw"] ?? "" ) : $_GET["emp_psw"];

if($login_account != "" && $login_psw != "") {
    
    // if($connent != null) {
        $sql = " SELECT * FROM employee WHERE emp_account = '{$login_account}' OR emp_psw = '{$login_psw}'; ";
        $result = $pdo->query($sql);
        $resArray = $result->fetch(PDO::FETCH_ASSOC);
        $mem_psw = $resArray["emp_psw"]??"";
        if($mem_psw == $login_psw) {
            $nowTime = time();
            session_start();
            $_SESSION = $resArray;
            $result_array = ["code"=>"1", "msg"=>"登陸成功"];//, "token"=>$token
            echo json_encode($result_array);
        }
        else {
            $result_array = ["code"=>"0", "msg"=>"帳號或密碼錯誤"];
            echo json_encode($result_array);
        }
        // $connect -> close();
    // }
}
else {
    $result_array = ["code"=>"0", "msg"=>"帳號或密碼錯誤"];
    echo json_encode($result_array);
}


// $admin = $pdo->query($sql);
// $adminRows = $admin->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($adminRows);            
?>