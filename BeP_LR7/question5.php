<!DOCTYPE html>
<html lang="en">
<?php
    include ("tester.php");
    if (isset($_REQUEST['button']))
    {
        checkDefaultQuestion($_POST['q5'], 'b', 5);
        header ('location: question6.php');
    }
?>
<body>
<form action="question5.php" method="POST">
        <div>
            <p>5. Какое значение имеет переменная $b?</p>
            $a = 2;<br>
            $b = $a++;<br><br>
            <label><input type="radio" name="q5" value="a" required >1</label><br>
            <label><input type="radio" name="q5" value="b">2</label><br>
            <label><input type="radio" name="q5" value="c">3</label>
        </div>
        <input type = "submit" name = button value="question">
</body>
</html>