<?php
    include ("tester.php");
    echo "Имя: ".$_SESSION['name'];
    echo "<br>";
    echo "Группа: ".$_SESSION['group'];
    echo "<br>";
    echo "Балл: ". getBall ();
?>