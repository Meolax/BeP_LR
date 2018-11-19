<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        padding: 10px;
    }

    *.pad {
        padding: 15px;
    }
    button {
        width: 200px;
    }
    </style>
<?php
    session_start();
    if(isset($_POST['submit'])){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['group'] = $_POST['group'];
        $_SESSION['ball'] = [];
        header('location: question1.php');
    }
?>
<body>
    <form action="login.php" method="POST">
        Имя: <input name = name pattern = "[A-Z]{1,1}[a-z]{3,10}"  maxlength = 11 required>
        <br><br>
        Группа: <input name = group pattern = "\d{4,5}"  maxlength = 5 required>
        <br><br>
        <button type="submit" name="submit" value="submit">Зарегистрироваться</button>
    </form>
</body>
</html>