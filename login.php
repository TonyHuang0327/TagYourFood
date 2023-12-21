<?php
session_start();
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '',  // 密碼
    'a1093310'); mysqli_query($link, 'SET NAMES utf8');
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
                <a href="index.php" title="回到首頁"><img src ="./assets/img/我的專案.png" width="100" height="70"></a>
            </div>
        </nav>
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <center>
                            <h1 class="mb-5">食品營養標示系統<br>TagYourFood</h1>
                            <form action ="" method="post" style=": 80%" enctype="multipart/form-data">
                            <div style="border-style:groove ; border-width: 3px ; width: 500px; height: 300px ; padding: 5px; text-align: center; background-color: rgb(0,153,0, 0.7);border-radius: 4px;">
                            <br/><br/>
                            <font size="5">帳號: </font><input type='text' name="account" placeholder='account' style = "width: 250px; height: 30px">
                            <br/><br/>
                            <font size="5">密碼: </font><input type='password' name="password" placeholder='password' style = "width: 250px; height: 30px">
                            <br/><br/>
                            <a href='forgetPassword.php'>忘記密碼</a>
                            <br/><br/><br/>
                            <input type='submit' value = '登入' style = "width: 120px; height: 40px">
                            </center>
                            <?php
if(isset($_POST["account"]))
    if($_POST["account"]!=null){
		$usr_Act=$_POST["account"];
		$usr_Psw=$_POST["password"];

        $SQL="SELECT * FROM user WHERE User_Account='$usr_Act' AND User_Password='$usr_Psw'";
        $result=mysqli_query($link,$SQL);
        if(mysqli_num_rows($result)==1){
            $_SESSION["ID"]=$usr_Act;
            echo "<script type='text/javascript'>";
            echo "alert ('登入成功');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=mainWeb.php'>";
        }
        else{
            echo "<script type='text/javascript'>";
            echo "alert ('帳號或密碼錯誤');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=login.php'>";
        }
}
?>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
</body>
</html>