<?php
session_start();
$sessionID=$_SESSION["ID"];
$GETfood_Id=$_GET["Food_Id"];

$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'a1093310'); mysqli_query($link, 'SET NAMES utf8');
$sql = "DELETE FROM user_eatdiary WHERE usr_account = '$sessionID' AND Food_Id='$GETfood_Id'";
$result = mysqli_query($link,$sql);
if($result==1){
    echo "<script type='text/javascript'>";
    echo "alert ('刪除成功');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=eatDiary.php'>";
}
?>