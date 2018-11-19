<!DOCTYPE html>
<html lang="en">
<?php
    include ("tester.php");
    if (isset($_REQUEST['button']))
    {
        checkDefaultQuestion($_POST['q10'], 'a', 10);
        header ('location: result.php');
    }
?>
<body>
<form action="question1.php" method="POST">
        <div>
            <p>10. Модификации для открытия файла, при которой файл открывается для чтения/записи. Создаётся новый файл, если
            он до этого не существовал.</p>
            <label><input type="radio" name="q10" value="a" required >a+</label><br>
            <label><input type="radio" name="q10" value="b">x+</label><br>
            <label><input type="radio" name="q10" value="c">w+</label><br><br>
        </div>
        <input type = "submit" name = button value="question">
</body>
</html>