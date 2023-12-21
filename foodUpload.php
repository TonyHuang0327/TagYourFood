<?php
session_start();
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'a1093310'); mysqli_query($link, 'SET NAMES utf8');
    $sessionID=$_SESSION["ID"];
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>食品營養標示系統</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="https://mpng.subpng.com/20191002/ezc/transparent-diet-and-nutrition-icon-diet-icon-5d942ab0954fd6.4879966615699913446116.jpg" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a href="mainWeb.php" title="回到首頁"><img src ="./assets/img/我的專案.png" width="100" height="70"></a>
                <?php
                echo "歡迎登入!$sessionID";
                ?>
                <form class="d-flex">
                <a href="user.php" title="會員資料"><img src ="./assets/img/1946429.png" width="50" height="50x"></a>
                <a class="btn btn-success" href="login.php">登出</a>
</form>
        </nav>
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="text-center text-white">
                            <h1 class="mb-5">食品營養標示系統<br>TagYourFood</h1>
                            <center><h2 class="mb-5">食物上傳</h2>
                            <form action ="" method="post" style=": 80%" enctype="multipart/form-data">
                            <div style="border-style:groove ; border-width: 3px ; width: 300px; height: 130px ; padding: 5px; text-align: center; background-color: rgb(0,153,0, 0.7);border-radius: 4px;">
                            <font size="5">食物名稱: </font><input type='text' name="foodName" placeholder='' style = "width: 150px; height: 30px">
                            <br/>
                            <font size="5">店家名稱: </font><input type='text' name="supName" placeholder='' style = "width: 150px; height: 30px">
                            <br>
                            <font size="5">店家地址: </font><input type='text' name="supLocation" placeholder='' style = "width: 150px; height: 30px">
                            <br/><br/></div><br>
                            <div style="border-style:groove ; border-width: 3px ; width: 300px; height: 235px ; padding: 5px; text-align: center; background-color: rgb(0,153,0, 0.7);border-radius: 4px;">
                            <font size="5">分類: </font><select name='food_cate' style = "width: 150px; height: 30px"><option value="" selected disabled hidden>--</option>
                            <?php
                            $sql="SELECT Categories_Name From categories ;";
                            $result=mysqli_query($link,$sql);
                            $number=mysqli_num_rows($result);
                            while($row = mysqli_fetch_assoc($result)){
                                $i++;
                                echo '<option value="' ,$i ,'">', $row["Categories_Name"], '</option>';
                                }
                            ?>
                            </select><br><br>
                            <font size="5">熱量: </font><input type='text' name="calories" placeholder='' style = "width: 150px; height: 30px">
                            <br/><br/>
                            <font size="5">蛋白質: </font><input type='text' name="protein" placeholder='' style = "width: 125px; height: 30px">
                            <br/><br/>
                            <font size="5">脂肪: </font><input type='text' name="fat" placeholder='' style = "width: 150px; height: 30px">
                            <br/><br/></div><br>
                            <input type='submit' value = '上傳' style = "width: 120px; height: 40px;border:3px green double;">
                            </form>
                            <?php
                            if(isset($_POST['foodName']) && isset($_POST['supName']) && isset($_POST['supLocation']) && isset($_POST['food_cate']) && isset($_POST['calories']) && isset($_POST['protein']) && isset($_POST['fat']))
                            if($_POST['foodName']!=NULL && $_POST['supName']!=NULL && $_POST['supLocation']!=NULL && $_POST['food_cate']!=NULL && $_POST['calories']!=NULL && $_POST['protein']!=NULL && $_POST['fat']!=NULL){
                                $food_foodName=$_POST['foodName'];
                                $food_supName=$_POST['supName'];
                                $food_supLocation=$_POST['supLocation'];
                                $food_cate=$_POST['food_cate'];
                                $food_calories=$_POST['calories'];
                                $food_protein=$_POST['protein'];
                                $food_fat=$_POST['fat'];
                                $_SESSION['foodName']=$food_foodName;
                                $_SESSION['supName']=$food_supName;
                                $_SESSION['supLocation']=$food_supLocation;
                                $_SESSION['food_cate']=$food_cate;
                                $_SESSION['calories']=$food_calories;
                                $_SESSION['protein']=$food_protein;
                                $_SESSION['fat']=$food_fat;
                                echo "<script type='text/javascript'>";
                                echo "alert ('確認上傳?');"; 
                                echo "</script>";
                                echo "<meta http-equiv='Refresh' content='0; url=foodUploadConfirm.php'>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>