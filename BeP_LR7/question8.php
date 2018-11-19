<!DOCTYPE html>
<html lang="en">
<?php
    include ("tester.php");
    if (isset($_REQUEST['button']))
    {
        checkDefaultQuestion($_POST['q8'], 'c', 8);
        header ('location: question9.php');
    }
?>
<body>
<form action="question8.php" method="POST">
        <div>
            <p>8. Что выведет следующий код?</p>
            $x = 0;<br>
            while($x<=7){ $x++; }<br>
            echo $x<br><br>
            <label><input type="radio" name="q8" value="a" required >6</label><br>
            <label><input type="radio" name="q8" value="b">7</label><br>
            <label><input type="radio" name="q8" value="c">8</label>
        </div>
        <input type = "submit" name = button value="question">
</body>
</html>