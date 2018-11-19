<!DOCTYPE html>
<html lang="en">
<?php
    include ("tester.php");
    if (isset($_REQUEST['button']))
    {
        checkDefaultQuestion($_POST['q9'], 'b', 9);
        header ('location: question10.php');
    }
?>
<body>
<form action="question9.php" method="POST">
        <div>
            <p>9. Перед PHP выражением else if должно предшествовать вырадение if для его использования.</p>
            <label><input type="radio" name="q9" value="a" required >Ложь</label><br>
            <label><input type="radio" name="q9" value="b">Верно</label><br><br>
        </div>
        <input type = "submit" name = button value="question">
</body>
</html>