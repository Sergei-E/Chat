<?php
include "databaseconnect.php";
session_start();
    $conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'], $_SESSION['BazaDan']);
    $text = $_POST['text1'];
    /*$text= "Привет";*/
    if($text == ""){
        $POl="пустая строка";
        echo ("<script>console.log('".$POl."');</script>");
    }
    else{
    $sql = "INSERT INTO messages (IDChat, Message, data, IDOtprav, IDPoluch) VALUES ('".$_SESSION['IDChata']."','".$text."','".date('d.m.Y')."','".$_SESSION['IDUser']."','".$_SESSION['IDPoluh']."');";
    if($conn->query($sql)){
        $POl="Данные успешно добавлены";
        echo ("<script>console.log('".$POl."');</script>");
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
   /* $rows= array();*/

  /* $Vivod = "SELECT * FROM messages WHERE IDChat='".$_SESSION['IDZap']."';";
   if($result6 = $conn->query($Vivod)){
      foreach($result6 as $row6){
     /* echo '<p>'.$row6['data']."<br>".$row6['Message']."</p>";*/
/* $rows['data1'] =$row6['data'];
  $rows['Messages1'] = $row6['Message'];
   json_encode($rows);
      }
  }
  else{
      echo "Ошибка: " . $conn->error;
  }*/

   /* $Vivod = "SELECT * FROM messages WHERE IDChat='".$_SESSION['IDZap']."';";
    if($result6 = $conn->query($Vivod)){
    foreach($result6 as $row6){
    echo '<p>'.$row6['data']."<br>".$row6['Message']."</p>";
    }
}
else{
    echo "Ошибка: " . $conn->error;
}/*
    if($result6 = $conn->query($Vivod)){
        foreach($result6 as $row6)
        {
        echo '<p id="Hat">'.$row6['data']."<br>".$row6['Message']."</p>";
        } 
    }
    else{
        echo "Ошибка: " . $conn->error;
    }*/
 /*if(mysqli_query($conn,$Vivod)){
        $result6 = mysqli_query($conn,$Vivod);
        while($myrow= mysqli_fetch_assoc($result6))
        $rows[] =$myrow;  
        echo json_encode($rows); 
 }*/
 
?>