<!DOCTYPE html>
<html lang="en">
<?php
    include ("tester.php");
    if (isset($_REQUEST['button']))
    {
        checkDefaultQuestion($_POST['q2'], 'b', 2);
        header ('location: question3.php');
    }
?>
<body>
<form action="question2.php" method="POST">
        <div>
            <p>2. Правильная последовательность, чтобы определить переменную и вывести её</p>
            &lt;?php<br>
            $test = 42;<br>
            ?&gt;<br>
            echo $test;<br><br>
            <label><input type="radio" name="q2" value="a" required >1-2-3-4</label><br>
            <label><input type="radio" name="q2" value="b">1-2-4-3</label><br>
            <label><input type="radio" name="q2" value="c">1-3-2-4</label>
        </div>
        <input type = "submit" name = button value="question">
</body>
</html>