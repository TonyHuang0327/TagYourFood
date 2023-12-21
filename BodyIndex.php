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
                            <center><h2 class="mb-5">身體資料上傳</h2>
                            <form action ="" method="post" style=": 80%" enctype="multipart/form-data">
                            <div style="border-style:groove ; border-width: 3px ; width: 500px; height: 300px ; padding: 5px; text-align: center; background-color: rgb(0,153,0, 0.7);border-radius: 4px;">
                            <br/>
                            <font size="5">身高: </font><input type='text' name="height" placeholder='公分(cm)' style = "width: 150px; height: 30px">
                            <br/><br/>
                            <font size="5">體重: </font><input type='text' name="weight" placeholder='公斤(kg)' style = "width: 150px; height: 30px">
                            <br/><br/>
                            <font size="5">年齡: </font><input type='text' name="age" placeholder='' style = "width: 150px; height: 30px">
                            <br/><br/>
                            <font size="5">運動頻率: </font><select name='frequency' style = "width: 50px; height: 30px"><option value="" selected disabled hidden>--</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option></select><font size="5">次/每週 </font>
                            <br/><br/><br><br>
                            <input type='submit' value = '上傳/修改' style = "width: 120px; height: 40px;border:3px green double;">
                            </form>
                            </div>
                            <?php
                            if(isset($_POST['height']) && isset($_POST['weight']) && isset($_POST['age']) && isset($_POST['frequency']))
                            if($_POST['height']!=NULL && $_POST['weight']!=NULL && $_POST['age']!=NULL && $_POST['frequency']!=NULL){
                                $usr_height=$_POST['height'];
                                $usr_weight=$_POST['weight'];
                                $usr_age=$_POST['age'];
                                $usr_frequency=$_POST['frequency'];
                                $_SESSION['height']=$usr_height;
                                $_SESSION['weight']=$usr_weight;
                                $_SESSION['age']=$usr_age;
                                $_SESSION['frequency']=$usr_frequency;
                                header("Location:BMIupload.php");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>