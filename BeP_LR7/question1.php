<!DOCTYPE html>
<html lang="en">
<?php
    include ("tester.php");
    if (isset($_REQUEST['button']))
    {
        checkDefaultQuestion($_POST['q1'], 'a', 1);
        header ('location: question2.php');
    }
?>
<body>
<form action="question1.php" method="POST">
        <div>
            <p>1. Что выведет следующий код</p>
            $x = 'y';<br>
            $y = 'x';<br>
            echo $$x<br><br>
            <label><input type="radio" name="q1" value="a" required >x</label><br>
            <label><input type="radio" name="q1" value="b">y</label><br>
            <label><input type="radio" name="q1" value="c">true</label>
        </div>
        <input type = "submit" name = button value="question">
</body>
</html>