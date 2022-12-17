
<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g1.php");
$login_account = empty( $_GET["mem_account"] ) ? ( $_POST["mem_account"] ?? "" ) : $_GET["mem_account"];
$login_psw = empty( $_GET["mem_psw"] ) ? ( $_POST["mem_psw"] ?? "" ) : $_GET["mem_psw"];

// $sql = "select * from tibamefe_cgd103g1.employee;";

if($login_account != "" & $login_psw != "") {
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connect = new mysqli("localhost", "root", "CharmyTseng0118", "tibamefe_cgd103g1", 3306);
    // $connect -> set_charset('utf8mb4');
    if($connent != null) {
        $sql = " select * from tibamefe_cgd103g1.employee where mem_account = '$login_account' or mem_psw = '$login_psw'; ";
        $result = $connent -> query($sql);
        $resArray = mysqli_fetch_array($result);
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


// $admin = $pdo->query($sql);
// $adminRows = $admin->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($adminRows);            
?>