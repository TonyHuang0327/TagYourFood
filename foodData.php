<?php
session_start();
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'a1093310'); mysqli_query($link, 'SET NAMES utf8');
    $sessionID=$_SESSION["ID"];
    $GETFood_Name=$_GET["Food_Name"];
    $GETSup_Name=$_GET["Sup_Name"];
    $GETSup_Location=$_GET["Sup_Location"];
    $GETCalories=$_GET["Calories"];
    $GETProtein=$_GET["Protein"];
    $GETFat=$_GET["Fat"];
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
                            <center><h2 class="mb-5">食物資料</h2>
                            <div style="border-style:groove ; border-width: 3px ; width: 300px; height: 90px ; padding: 5px; text-align: center; background-color: rgb(0,153,0, 0.7);border-radius: 4px;">
                            <font size="5">食品名稱: <?php echo $GETFood_Name;?>
                            </font></br>
                            <font size="5">店家名稱: <?php echo $GETSup_Name;?>
                            </font></div><br>
                            <div style="border-style:groove ; border-width: 3px ; width: 650px; height: 50px ; padding: 5px; text-align: center; background-color: rgb(0,153,0, 0.7);border-radius: 4px;">
                            <font size="5">店家地址: <?php echo $GETSup_Location;?>
                            </font></div><br>
                            <div style="border-style:groove ; border-width: 3px ; width: 300px; height: 120px ; padding: 5px; text-align: center; background-color: rgb(0,153,0, 0.7);border-radius: 4px;">
                            <font size="5">卡路里: <?php echo $GETCalories;?></font>
                            <br>
                            <font size="5">蛋白質: <?php echo $GETProtein;?></font>
                            <br>
                            <font size="5">脂肪: <?php echo $GETFat;?></font>
                            <br></div><br>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>