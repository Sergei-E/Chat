<!DOCTYPE html>
<html>

<head>
    <title>Регистрация</title>
    <meta charset="utf-8" />
    <link type="text/css" href="Style1.css" rel="stylesheet" />
</head>

<body>
    <form method="POST">
    <div id="Oblact">
        <div class = "Pole"> 
        <h1>Регистрация</h1>
        </div>
        <div class="Pole">
            <p><input type="text" name="FIO" placeholder="ФИО" /></p>
        </div>
        <div class="Pole">
            <p><input type="text" name="Email" placeholder="Email" /></p>
        </div>
        <div class="Pole">
            <p><input type="text" name="Password" placeholder="Пароль" /></p>
        </div>
        <div class="Pole">
            <p><input type="text" name="ProwPassword" placeholder="Подтвердите пароль" /></p>
        </div>
        <div class="Pole">
            <p><input type="text" name="Telefon" placeholder="Мобильный телефон" /></p>
        </div>
        <!--<table>
            <tr>
                <td><label>ФИО </label></td>
                <td><input class="PoleVvoda" type="text" name="FIO"></td>
            </tr>-->
            <!--<tr> 
                <td><label>Email </label></td>
                <td> <input class="PoleVvoda" type="text" name="Email"></td>
            </tr>-->
            <!--<tr> 
                <td> <label>Пароль </label></td>
                <td><input class="PoleVvoda" type="text" name="Password"></td>
            </tr>-->
            <!--<tr> 
                <td><label>Подтвердите пароль </label></td>
                <td><input class="PoleVvoda" type="text" name="ProwPassword"></td>
            </tr>
            <tr> 
                <td><label>Мобильный телефон </label></td>
                <td><input type="text" name="Telefon"></td>
            </tr>
        </table>-->
        <input id="Forms" type="submit" value="Зарегистрироваться">
        </div>
        <div id="PoleInfo">
            <div id="Logo">
            <p><img src="Logo.jpg"/></p>
            <h2>Имя чата (придумаю)</h2>
            </div>
            <div id="Info">
                <p><a class="Sslki" href="index.php">Авторизация</a></p>
                <p class="Sslki">Руководство пользователя</p>
                <p class="Sslki">Политика конфиденциальности</p>
            </div>
        </div>
    <!--<a href="databaseconnect.php">Подкл. к БД</a>-->
    <?php 
    include "databaseconnect.php";
    session_start();
    $Password = $_POST['Password'];
    $ProwPassword = $_POST['ProwPassword'];
    $FIO = $_POST['FIO'];
    $LoginSot=$_POST['Telefon'];
    $_SESSION['LoginSot2']=$LoginSot;
    $Email = $_POST['Email'];
    if ($Password == $ProwPassword){
        if($FIO == null || $Email == null || $Password == null || $ProwPassword == null){
            echo "<p class='Error'>&#9672;Паля недолжны быть пустыми</p>";
        } 
           else{
            try {
                session_start();
                $conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'],$_SESSION['Password'], $_SESSION['BazaDan']);
                $POl = "Успешное подключение к базе данных chat.";
                echo ("<script>console.log('".$POl."');</script>");
                } 
                catch (PDOException $pe) {
                    die("Не удалось подключиться к базе данных:" . $pe->getMessage());
                }
                mysqli_query($conn,"INSERT INTO user (FIO) VALUES ('".$_POST['FIO']."');");
                $ID = mysqli_insert_id($conn);
                $sql = "INSERT INTO author ( IDUser, Email, Password, ProwPassword, Telefon) VALUES ('".$ID."','".$_POST['Email']."','".$_POST['Password']."','".$_POST['ProwPassword']."','".$_POST['Telefon']."');";
                if(mysqli_query($conn, $sql)){
                $POl="Данные успешно добавлены";
                echo ("<script>console.log('".$POl."');</script>");
                echo "<script>window.location = 'Straniz.php';</script>";
                } 
                else{
                $POl="Данные не добавлены";
                echo ("<script>console.log('".$POl."');</script>");
                }  
    }
}
    else{
        echo "<p class='Error'>&#9672;Пароли не совпадают</p>";
    }
    ?>
     </form>
</body>

</html>