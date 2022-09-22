<!DOCTYPE html>
<html>
<head>
<title> Авторизация</title>
<meta charset="utf-8" />
<link type="text/css" href="Style1.css" rel="stylesheet" />
</head>
<body>
<form method="POST">
        <div id="Oblact">
            <div class="Pole">
                <h1>АВТОРИЗАЦИЯ</h1>
            </div>
            <div class="Pole">
                <p><input type="text" name="LoginSot2" placeholder="Логин" /></p>
            </div>
            <div class="Pole">
                <p><input type="password" name="PasswordSot1" placeholder="Пароль"/></p>
            </div>
            <div class="Pole">
                <p><input id="Vhod" type="submit" value="Войти"></p>
            </div>
        </div>
        <div id="PoleInfo">
            <div id="Logo">
            <p><img src="Logo.jpg"/></p>
            <h2>Имя чата (придумаю)</h2>
            </div>
            <div id="Info">
                <p><a class="Sslki" href="register.php">Регистрация</a></p>
                <p class="Sslki">Руководство пользователя</p>
                <p class="Sslki">Политика конфиденциальности</p>
            </div>
        </div>
    <?php
    include "databaseconnect.php";
    $LoginSot=$_POST['LoginSot2'];
$_SESSION['LoginSot2']=$LoginSot;
$PasswordSot=$_POST["PasswordSot1"];
session_start();
$conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'], $_SESSION['BazaDan']);
$sql = "SELECT * FROM `author`, `user`;";
if($result = $conn->query($sql)){
    foreach($result as $row){
         if( $row["Telefon"] == $_POST['LoginSot2'] && $row["Password"] == $_POST['PasswordSot1']){    
            $Po="Верно";
            echo ("<script>console.log('".$Po."');</script>");
            echo "<script>window.location = 'Straniz.php';</script>";               
         }
         else{
            $Po="Неверно";
            echo ("<script>console.log('".$Po."');</script>");
         }     
    }
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
</form>
</body>
</html>