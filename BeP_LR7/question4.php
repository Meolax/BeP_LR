<!DOCTYPE html>
<html lang="en">
<?php
    include ("tester.php");
    if (isset($_REQUEST['button']))
    {
        checkDefaultQuestion($_POST['q4'], 'c', 4);
        header ('location: question5.php');
    }
?>
<body>
<form action="question4.php" method="POST">
        <div>
            <p>4. Укажите правильную последовательность кода, чтобы определить переменную 'age', инкрементировать
            её на еденицу и вывксти на экран</p>
            ?&gt;<br>
            &lt;?php<br>
            echo $age<br>
            $age = 21;<br>
            $age++;<br><br>
            <label><input type="radio" name="q4" value="a" required >1-2-3-4-5</label><br>
            <label><input type="radio" name="q4" value="b">2-4-3-5-1</label><br>
            <label><input type="radio" name="q4" value="c">2-4-5-3-1</label>
        </div>
        <input type = "submit" name = button value="question">
</body>
</html>