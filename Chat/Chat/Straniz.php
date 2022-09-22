<!DOCTYPE html>
<html>

<head>
    <title>Главная страница</title>
    <meta charset="utf-8" />
    <link type="text/css" href="Straniz.css" rel="stylesheet"/>
</head>

<body>
    <header>
        <div id="Hapka1">
            <img src="Logo.jpg"/> 
        </div>
        <div id="Hapka2">
            <h1>Закрытый чат</h1>
        </div>
        <div id="Hapka3">
<p>Добро пожаловать <br> <?php 
session_start();
$conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'], $_SESSION['BazaDan']);
$sql = "SELECT * FROM `author`,`user` WHERE author.IDUser = user.IDUser and Telefon = ".$_SESSION['LoginSot2'].";";
if($result = $conn->query($sql)){
    foreach($result as $row){
        $_SESSION['IDUser'] = $row["IDUser"];
        $_SESSION['User'] = $row["FIO"];
        echo $_SESSION['User']; 
    }
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?></p>
</div>
<div id="Hapka4">
<a href="index.php">Выход</a>
</div>
    </header>
<form>
   
<?php
$conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'], $_SESSION['BazaDan']);
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM `user`";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; 
    echo "<div class='conteiner'>";
    foreach($result as $row){
        session_start(); 
        echo "<a href= 'Messages.php?user=".$row['FIO']."'>".$row['FIO']."</a></br></br>";
        $_SESSION['FIOPoluh1'] = $_GET['user'];
    }
     echo "</div>";
     $result->free();
}
else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>

</form>

</body>
</html>