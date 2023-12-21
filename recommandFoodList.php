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
                            $calories=$_POST["calories"];
                            $location=$_POST["location"];
                            $categories=$_POST["categories"];
                            echo "<table border='2'>";
                            echo "<tr>";
                            echo "<td><center>食物編號</center></td> ";
                            echo "<td><center>食物名稱</center></td> ";
                            echo "<td><center>食物分類</center></td> ";
                            echo "<td><center>店家名稱</center></td> ";
                            echo "<td><center>卡洛里</center></center></center></center></td> ";
                            echo "<td><center>蛋白質</center></center></center></td> ";
                            echo "<td><center>脂肪</center></center></td> ";
                            echo "<td><center>選擇</center></td>";
                            echo "</tr>";
                            foreach($_POST['categories'] as $i){
                                $sql = "SELECT F.Food_Id,F.Food_Name,S.Sup_Name,F.Calories,F.Protein,F.Fat,S.Sup_Location,S.Sup_Id,G.Categories_Name 
                                        FROM foods F, suppliers S, categories G, food_categories FG, connection C 
                                        WHERE F.Food_Id=FG.Food_Id AND FG.Food_Categories=G.Categories_Number 
                                        AND G.Categories_Name='$i' AND F.Food_Id=C.Food_Id AND C.Sup_Id=S.Sup_Id AND S.Sup_Location LIKE '%$location%';";
                                $result = mysqli_query($link,$sql);
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td><center>".$row["Food_Id"]."</center></td><td><center>".$row["Food_Name"]."</center></td><td><center>".$row["Categories_Name"]."</center></td><td><center>".$row["Sup_Name"]."</center></td><td><center>".$row["Calories"]."</center></td><td><center>".$row["Protein"]."</center></td><td><center>".$row["Fat"]."</center></td><td><center><a href = 'select_confirm.php?Food_Id=".$row["Food_Id"]."'>選擇</a></center></td>";
                                echo "</tr>";
                            }
                        }
                            echo "</table>";
                            ?>
                            </center>
                            </body>
</html>