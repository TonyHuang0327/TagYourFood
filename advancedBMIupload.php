<?php
session_start();
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'a1093310'); mysqli_query($link, 'SET NAMES utf8');
    $sessionID=$_SESSION["ID"];
    $sessionbodyFat=$_SESSION['bodyFat'];
    $sessionWHR=$_SESSION['WHR'];
    $SQL="UPDATE user_bodyindex SET Body_Fat='$sessionbodyFat',WHR='$sessionWHR' WHERE User_Account='$sessionID';";
    $result = mysqli_query($link,$SQL);
    if($result==1){
        echo "<script type='text/javascript'>";
        echo "alert ('上傳成功');"; 
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=user.php'>";
    }
?>