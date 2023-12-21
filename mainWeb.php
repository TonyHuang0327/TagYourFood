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
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">食品營養標示系統<br>TagYourFood</h1>
                            <!-- Signup form-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form method="post">
                                <div class="row">
                                    <div class="col">
                                        <input type="input" name="foodname" class="form-control form-control-lg" placeholder="你今天吃甚麼?" />
                                        <div class="invalid-feedback text-white" data-sb-feedback="FoodName:required">你吃空氣嗎?</div>
                                    </div>
                                    <div class="col-auto"><button class="btn btn-success btn-lg" type="submit"formaction="loginFoodList.php" formmethod="post">查詢</button></div>
                                </div>
                                <br>
                                <a class="btn btn-success" href="foodUpload.php">食品上傳</a>&nbsp;
                                <a class="btn btn-success" href="eatDiary.php">飲食紀錄</a>&nbsp;
                                <a class="btn btn-success" href="recommand.php">今日推薦</a>&nbsp;
                            </form><br></br><font size='6'><b>排行榜</b></font><br><br>
                            <?php
                            $sqlRanking = "SELECT Food_Name,Calories,(Being_Selected+Being_Liked) as hot FROM foods ORDER BY hot DESC LIMIT 10;";
                            $resultRanking = mysqli_query($link,$sqlRanking);
                            echo "<table border='2' align='left'>";
                            echo "<tr>";
                            //echo "<td><center>食物排名</center></td> ";
                            echo "<td><center>食物名稱 TOP 10 !</center></td> ";
                            echo "<td><center>卡路里</center></center></center></center></td> ";
                            echo "<td><center>熱門度</center></center></center></center></td> ";
                            echo "</tr>";
                            while($row=mysqli_fetch_assoc($resultRanking)){
                                echo "<tr>";
                                echo "<td><center>".$row["Food_Name"]."</center></td><td><center>".$row["Calories"]."</center></td><td><center>".$row["hot"]."</center></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            ?>
                            <?php
                            $sqlSupRanking = "SELECT Sup_Name,Sup_Location,Being_Selected FROM suppliers ORDER BY Being_Selected DESC LIMIT 10;";
                            $resultSupRanking = mysqli_query($link,$sqlSupRanking);
                            echo "<table border='2' align='right'>";
                            echo "<tr>";
                            //echo "<td><center>食物排名</center></td> ";
                            echo "<td><center>商家名稱 TOP 10 !</center></td> ";
                            echo "<td><center>地址</center></center></center></center></td> ";
                            echo "<td><center>熱門度</center></center></center></center></td> ";
                            echo "</tr>";
                            while($row=mysqli_fetch_assoc($resultSupRanking)){
                                echo "<tr>";
                                echo "<td><center>".$row["Sup_Name"]."</center></td><td><center>".$row["Sup_Location"]."</center></td><td><center>".$row["Being_Selected"]."</center></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            ?>
                            <br><br>
                            <font size=6><b>從分類選擇</b></font><br>
                            <?php
                            $sql = "SELECT Categories_Name,amount FROM categories;";
                            $result = mysqli_query($link,$sql);
                            echo "<table border='3' align='center' width='200'>";
                            echo "<tr>";
                            echo "<td><center>分類名稱</center></td> ";
                            echo "<td><center>食物數量</center></td> ";
                            echo "</tr>";
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td><center><a href = 'categories.php?Categories_Name=".$row["Categories_Name"]."' style='color:white;''>".$row["Categories_Name"]."</a></center></td><td>".$row["amount"]."</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            ?>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </header>
        <!-- Icons Grid-->
        
    </body>
</html>
