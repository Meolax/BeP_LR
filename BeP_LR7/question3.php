<!DOCTYPE html>
<html lang="en">
<?php
    include ("tester.php");
    if (isset($_REQUEST['button']))
    {
        checkDefaultQuestion($_POST['q3'], 'd', 3);
        header ('location: question4.php');
    }
?>
<body>
<form action="question3.php" method="POST">
        <div>
            <p>3. Какой символ соответсвует логическому оператору ИЛИ?</p>
            
            <label><input type="radio" name="q3" value="a" required >|</label><br>
            <label><input type="radio" name="q3" value="b">^</label><br>
            <label><input type="radio" name="q3" value="c">&&</label><br>
            <label><input type="radio" name="q3" value="d">||</label><br><br>
        </div>
        <input type = "submit" name = button value="question">
</body>
</html>