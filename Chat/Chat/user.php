<!DOCTYPE html>
<html>
<head>
<title> Пользователь</title>
<meta charset="utf-8" />
<!--<link type="text/css" href="Style1.css" rel="stylesheet"/>-->
</head>
<body>
    <form method="POST">
   
    <?php
session_start();
echo $_GET['user'];
?>
</form>
</body>
</html>