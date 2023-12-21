<?php
session_start();
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'a1093310'); mysqli_query($link, 'SET NAMES utf8');
    $sessionID=$_SESSION["ID"];
    $GETFood_Id=$_GET["Food_Id"];
    $SQLlike="INSERT INTO likes_foods (usr_account, Food_Id)
    VALUES ('$sessionID', '$GETFood_Id');";
    $resultlike=mysqli_query($link,$SQLlike);
    $SQLplus="UPDATE foods SET Being_Liked=Being_Liked+1 WHERE Food_Id='$GETFood_Id';";
    $resultplus= mysqli_query($link,$SQLplus);
    if($resultlike==1 && $resultplus==1){
        echo "<script type='text/javascript'>";
        echo "alert ('新增至我的最愛成功');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=mainWeb.php'>";
    }
?>