
<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
$login_account = empty( $_GET["mem_account"] ) ? ( $_POST["mem_account"] ?? "" ) : $_GET["mem_account"];
$login_psw = empty( $_GET["mem_psw"] ) ? ( $_POST["mem_psw"] ?? "" ) : $_GET["mem_psw"];

// $sql = "select * from tibamefe_cgd103g1.employee;";

if($login_account != "" & $login_psw != "") {
    $connect = new mysql("localhost:8080", "root", "", "personal");
    if($connent != null) {
        $sql = " select * from tibamefe_cgd103g1.employee where mem_account = '$login_account' or mem_psw = '$login_psw'; ";
        $result = $connent -> query($sql);
        $resArray = mysql_fetch_array($result);
        if($resArray["user_password"] == $login_psw) {
            $_SESSION["zzz_user_id"] = $resArray["user_id"];
            $result_array[0] = ["code"=>"1", "msg"=>"登陸成功"];
            echo json_encode($result_array);
        }
        else {
            $result_array[0] = ["code"=>"0", "msg"=>"帳號或密碼錯誤"];
            echo json_encode($result_array);
        }
        $connect -> close();
    }
}
else {
    $result_array[0] = ["code"=>"0", "msg"=>"帳號或密碼錯誤"];
    echo json_encode($result_array);
}


$admin = $pdo->query($sql);
$adminRows = $admin->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($adminRows);            
?>