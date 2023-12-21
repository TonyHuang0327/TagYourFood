<?php
session_start();
$sessionID=$_SESSION["ID"];
$GETfood_Id=$_GET["Food_Id"];
$GETsup_Id=$_GET["Sup_Id"];
date_default_timezone_set("Asia/Taipei");
$today = date('Y/m/d');

$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'a1093310'); mysqli_query($link, 'SET NAMES utf8');
$sql = "INSERT INTO user_eatDiary (usr_account,Food_Id,Date) VALUES ('$sessionID','$GETfood_Id','$today')";
$result = mysqli_query($link,$sql);
$plusone="UPDATE foods SET Being_Selected=Being_Selected+1 WHERE Food_Id='$GETfood_Id';";
$result2= mysqli_query($link,$plusone);
$plusoneSuppliers="UPDATE suppliers SET Being_Selected=Being_Selected+1 WHERE Sup_Id='$GETsup_Id';";
$result3= mysqli_query($link,$plusoneSuppliers);
if($result==1 && $result2==1 && $result3){
    echo "<script type='text/javascript'>";
    echo "alert ('新增至飲食紀錄成功');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=mainWeb.php'>";
}
?>