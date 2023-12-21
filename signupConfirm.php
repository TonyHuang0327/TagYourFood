<?php
session_start();
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'a1093310'); mysqli_query($link, 'SET NAMES utf8');
    $sessionAct = $_SESSION["Act"];
    $sessionPsw = $_SESSION["Psw"];
    $sessionMail = $_SESSION["Email"];
        $addSQL ="INSERT INTO user (User_Account,User_Password,User_Email) VALUES('$sessionAct','$sessionPsw','$sessionMail')";
        $addResult = mysqli_query($link,$addSQL);
        $createBMI = "INSERT INTO User_bodyindex (User_Account,Height,Weight,Age,Exercise_Frequency) VALUES('$sessionAct','0','0','0','0')";
        $BMIresult = mysqli_query($link,$createBMI);
        if($addResult==1){
            echo "<script type='text/javascript'>";
            echo "alert ('註冊成功');"; 
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=login.php'>";
        }
?>