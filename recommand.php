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
                <a class="btn btn-success" href="login.php">登出</a></form>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">食品營養標示系統<br>TagYourFood</h1>
                            <h2>今日推薦</h2>
                            <form action="recommandFoodList.php" method="post" width = "500">
                                限制熱量(cal): <input type="range" name="calories" value="1800" min="0" max="3000" step="50" oninput="this.nextElementSibling.value = this.value">
                                <output>1800</output>(cal)<br><font size="5">分類</font><br>
                                <?php
                            $sql="SELECT Categories_Name From categories ;";
                            $result=mysqli_query($link,$sql);
                            $number=mysqli_num_rows($result);
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<input type="checkbox"  name="categories[]" value="' , $row["Categories_Name"],'">', $row["Categories_Name"], '</input>';
                                }
                            ?><br><br>
                            地區:<input type ="text" name="location"></input><br><br>
                            <input type="submit" value="推薦我!!"></input>
                            </form>  
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </header>
        <!-- Icons Grid-->
        
    </body>
</html>
