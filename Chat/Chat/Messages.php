<!DOCTYPE html>
<html>

<head>
    <title>Сообщения</title>
    <meta charset="utf-8" />
    <!--<meta http-equiv="refresh" content="30">Автообновление-->
    <link type="text/css" href="Messages4.css" rel="stylesheet"/>
    <!--<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>-->
  <script src="jquery-3.6.0.js"></script>
</head>

<body onload="Output();">
    <header>
    <h1>Получатель: <?php
    include "databaseconnect.php";
         session_start();
         $conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'], $_SESSION['BazaDan']);
         $sql = "SELECT * FROM `author`,`user` WHERE author.IDUser = user.IDUser and FIO = '".$_GET['user']."';";
         echo $_GET['user']."</br>";//получатель
         if($result = $conn->query($sql)){
            foreach($result as $row){
                $_SESSION['IDPoluh'] = $row["IDUser"];
                $_SESSION['Telefon1'] = $row["Telefon"]; 
            }
            $result->free();
        
        } else{
            echo "Ошибка: " . $conn->error;
        }
        $sql1= "SELECT * FROM `litschat` where `IDsozdat`= '".$_SESSION['IDUser']."' and `IDpoluh` = '".$row["IDUser"]."';";
        $result1 = mysqli_query($conn,$sql1);
        if ( $result1->num_rows > 0 ){
        /*echo "Чат создан";*//*Важно!!!!*/ 
        foreach($result1 as $row1)
        {
            session_start();
            /*echo $row1['ChatName'];*//*Важно!!!!*/ 
            $_SESSION['IDChata'] = $row1["ID"];
            /*include "insert.php";*/
        }
        }
        else{
        $sql2= "SELECT * FROM `litschat` where `IDsozdat`= '".$row["IDUser"]."' and `IDpoluh` = '".$_SESSION['IDUser']."';";
        $result2 = mysqli_query($conn,$sql2);
        if ( $result2->num_rows > 0 ){
        /*echo "Чат создан для получателя";*//*Важно!!!!*/ 
        foreach($result2 as $row2)
        {
            session_start();
            /*echo $row2['ChatName'];*//*Важно!!!!*/ 
            $_SESSION['IDChata'] = $row2["ID"];
            /*include "insert.php";*/
        }
        }
        else {
            random_number(); 
        $ran = random_number();
        echo "Имя чата " .$ran;
        mysqli_query($conn,"INSERT INTO litschat (ChatName, IDsozdat, IDpoluh, DataSozdan) VALUES ('".$ran."','".$_SESSION['IDUser']."','".$_SESSION['IDPoluh']."','".date('d.m.Y')."');");
        if(mysqli_query($conn, $sql)){
        $POl="Данные успешно добавлены";
        echo ("<script>console.log('".$POl."');</script>");
        } 
        else{
        $POl="Данные не добавлены";
        echo ("<script>console.log('".$POl."');</script>");
        }
        }
        }
        function random_number($length = 6)
        {
            $arr = array(
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
                'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
            );
            $res = '';
            for ($i = 0; $i < $length; $i++) {
                $res .= $arr[random_int(0, count($arr) - 1)];
            }
            return $res;
        }
        ?>
        </h1>
    </header>
<form method="POST" action="" id="MessForm">
<article id="MessageSMS">    
 </article> 
 <section id="s"></section>  
 <div>
<textarea type="text" id="sms" name="sms"  placeholder="Поле ввода"></textarea>
<input type="submit" id="Output" value=&#9993;>
</div>
</form>
<footer>
    <a href="Straniz.php">Вернуться к пользователям</a>
</footer>
<script type="text/javascript">
  var block = document.getElementById("MessageSMS");
  block.scrollTop = 9999;
</script>
<script src="messages3.js"></script>
</body>

</html>