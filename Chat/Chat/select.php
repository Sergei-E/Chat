<?php
include "databaseconnect.php";
session_start();
$conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'], $_SESSION['BazaDan']);
$Vivod = "SELECT * FROM messages WHERE IDChat='".$_SESSION['IDChata']."';";
if($result6 = $conn->query($Vivod)){
    foreach($result6 as $row6){
        if($row6['IDOtprav'] ==  $_SESSION['IDUser']){
            echo '<p style="text-align:right; color:#FFF; 
            font-size:20px; 
            font-family: Verdana, Geneva, Tahoma, sans-serif; 
            margin-right:3%; 
            border-radius:20px; 
            width:auto; 
            height: auto; 
            margin-left:50%; 
            padding-right:11%; 
            padding-bottom: 3%;
            background-color:#266455c9;"><br>'.$row6['Message']."</p>";
        }
        else{
            echo '<p style="text-align:left; 
            color:#FFF; font-size:20px; 
            font-family: Verdana, Geneva, Tahoma, sans-serif; 
            margin-left:3%; 
            padding-bottom: 3%;
            border-radius:20px; 
            width:auto; 
            height: auto; 
            margin-right:50%; 
            padding-left:11%;
            background-color:#264664c9;"><br>'.$row6['Message']."</p>";
        }
    }
}
else{
    echo "Ошибка: " . $conn->error;
}
?>