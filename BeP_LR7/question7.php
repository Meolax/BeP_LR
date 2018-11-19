<!DOCTYPE html>
<html lang="en">
<?php
    include ("tester.php");
    if (isset($_REQUEST['button']))
    {
        checkDefaultQuestion($_POST['q7'], 'a', 7);
        header ('location: question8.php');
    }
?>
<body>
<form action="question7.php" method="POST">
        <div>
            <p>7. В следующем примере, числовой инекс присваивается автоматически.</p>
            &lt;?php<br>
            $items = array ("A", "B", "C");<br>
            ?&gt;<br><br>
            <label><input type="radio" name="q7" value="a" required >Верно</label><br>
            <label><input type="radio" name="q7" value="b">Ложь</label><br>
        </div>
        <input type = "submit" name = button value="question">
</body>
</html>