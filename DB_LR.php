<html>
    <head>
        <style>
            table, th, td {
                margin-bottom: 50px;
                margin-left: auto;
                margin-right: auto;
                border: 2px solid black;
            }
        </style>
        <title>Show ALL</title>
    </head>
    <body>
        <?php
            $dbServerName="localhost";
            $dbUserName="root";
            $dbPassword="data#base56";
            $dbName="medcart";
            $conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);
            mysqli_query($conn, "SET NAMES utf8;");
            $sql = "SHOW TABLES";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                echo "<table>";
                $sql = "DESCRIBE ".$row['Tables_in_medcart'];
                $result2 = mysqli_query($conn, $sql);
                echo "<tr><th colspan='".(mysqli_field_count($conn)+1)."'>".$row['Tables_in_medcart']."</th></tr>";
                echo "<tr>";
                while ($row2 = mysqli_fetch_assoc($result2)){                  
                    echo "<th>".$row2['Field']."</th>";                   
                }
                echo "</tr>";
                $sql = "Select * From ".$row['Tables_in_medcart'];
                $result2 = mysqli_query($conn, $sql);
                while ($row2 = mysqli_fetch_assoc($result2)){
                    echo "<tr>";
                    $i =0;
                    foreach($row2 as $inneritem){
                        $fk = getRefIfThisIsFK($row['Tables_in_medcart'],array_keys($row2)[$i]);
                        if(!is_null($fk)){
                            echo "<td>".GetValueOfFK($fk,(int)$inneritem,array_keys($row2)[$i])."</td>";
                        }
                        else{
                            echo "<td>".$inneritem."</td>";
                        }
                        $i++;
                    }
                    echo "</tr>";
                } 
                echo "</stable>";
            }

            function getRefIfThisIsFK($table,$column){
                $sql = "select referenced_table_name as 'references' from
                information_schema.key_column_usage where
                referenced_table_name is not null and table_name='".$table."' and column_name='".$column."';"; 
                $result = mysqli_query($GLOBALS['conn'], $sql);
                $row = mysqli_fetch_assoc($result);
                return $row['references'];
            }
            
            function GetValueOfFK($table,$id, $column){
                $sql = "Select * From ".$table." Where ".$column."=$id";
                $result = mysqli_query($GLOBALS['conn'], $sql);
                $row = mysqli_fetch_row($result);
                return  $row[1];
            }
        ?>
    </body>
</html> 