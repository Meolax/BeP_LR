<!DOCTYPE html>
<html lang="en">
<?php
    include ("tester.php");
    if (isset($_REQUEST['button']))
    {
        checkDefaultQuestion($_POST['q6'], 'a', 6);
        header ('location: question7.php');
    }
?>
<body>
<form action="question6.php" method="POST">
        <div>
            <p>6. Числовой массив хранит каждый элемент с числовым индексом.</p>            
            <label><input type="radio" name="q6" value="a" required >Верно</label><br>
            <label><input type="radio" name="q6" value="b">Ложь</label><br><br>
        </div>
        <input type = "submit" name = button value="question">
</body>
</html>