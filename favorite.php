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
                </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">食品營養標示系統<br>TagYourFood</h1>
                            <center>
                            <?php
                            $sql = "SELECT F.Food_Id,F.Food_Name,S.Sup_Name,F.Calories,F.Protein,F.Fat 
                                    FROM foods F,suppliers S,connection C,likes_foods L 
                                    WHERE F.Food_Id=C.Food_Id AND C.Sup_Id=S.Sup_Id AND L.usr_account='$sessionID'AND L.Food_Id=F.Food_Id;";
                            $result = mysqli_query($link,$sql);
                            echo "<table border='2'>";
                            echo "<tr>";
                            echo "<td><center>食物編號</center></td> ";
                            echo "<td><center>食物名稱</center></td> ";
                            echo "<td><center>店家名稱</center></td> ";
                            echo "<td><center>卡洛里</center></center></center></center></td> ";
                            echo "<td><center>蛋白質</center></center></center></td> ";
                            echo "<td><center>脂肪</center></center></td> ";
                            echo "<td><center>移除</center></td>";
                            echo "</tr>";
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td><center>".$row["Food_Id"]."</center></td><td><center>".$row["Food_Name"]."</center></td><td><center>".$row["Sup_Name"]."</center></td><td><center>".$row["Calories"]."</center></td><td><center>".$row["Protein"]."</center></td><td><center>".$row["Fat"]."</center></td><td><center><a href = 'deleteFav.php?Food_Id=".$row["Food_Id"]."'>移除</a></center></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            ?>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>