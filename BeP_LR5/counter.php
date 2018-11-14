<?php 
    $f=fopen ("stat.dat", "a+");
    $count=fread($f, 100);
    $count++;
    ftruncate($f,0);
    fwrite($f,$count);
    fclose($f);
    echo "Count: ", $count;
 ?>