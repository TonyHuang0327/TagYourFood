<?php
session_start();
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'a1093310'); mysqli_query($link, 'SET NAMES utf8');
    $sessionID=$_SESSION["ID"];
    $sessionFoodName=$_SESSION['foodName'];
    $sessionSupName=$_SESSION['supName'];
    $today = date('Y/m/d');
        $SQLsearchFID="SELECT Food_Id FROM foods WHERE Food_Name='$sessionFoodName';";
        $searchFID=mysqli_fetch_array(mysqli_query($link,$SQLsearchFID));
        $SQLsearchSID="SELECT Sup_Id FROM suppliers WHERE Sup_Name='$sessionSupName';";
        $searchSID=mysqli_fetch_array(mysqli_query($link,$SQLsearchSID));
        $SQL2="INSERT INTO connection (Food_Id, Sup_Id, Update_Date)
               VALUES ('$searchFID[0]','$searchSID[0]','$today');";
        $result2 = mysqli_query($link,$SQL2);
        header("Location:mainWeb.php");
        ?>