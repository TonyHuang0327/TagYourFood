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
    $sessionSupLocation=$_SESSION['supLocation'];
    $sessionFoodCate=$_SESSION['food_cate'];
    $sessionCalories=$_SESSION['calories'];
    $sessionProtein=$_SESSION['protein'];
    $sessionFat=$_SESSION['fat'];
    $SQL="INSERT INTO foods (Food_Name, Calories, Protein, Fat)
          VALUES ('$sessionFoodName','$sessionCalories','$sessionProtein','$sessionFat');";
    $result = mysqli_query($link,$SQL);
    $SQL2="INSERT INTO suppliers (sup_Name, sup_Location)
          VALUES ('$sessionSupName','$sessionSupLocation');";
    $result2 = mysqli_query($link,$SQL2);
    if($result==1 && $result2==1){
        $sqlfoodId="SELECT Food_Id FROM foods WHERE Food_Name='$sessionFoodName';";
        $foodId=mysqli_fetch_array(mysqli_query($link,$sqlfoodId));
        $Food_ID=$foodId[0];
        $SQL3="INSERT INTO food_categories (Food_Id, Food_Categories)
          VALUES ('$Food_ID','$sessionFoodCate');";
        $result3 = mysqli_query($link,$SQL3);
        if($result3==1){
            $plusone="UPDATE categories SET amount=amount+1 WHERE Categories_Number='$sessionFoodCate';";
            $plusresult=mysqli_query($link,$plusone);
            if($plusresult==1){
                echo "<script type='text/javascript'>";
                echo "alert ('上傳成功');"; 
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=createConnection.php'>";
            }
            }
        }
?>