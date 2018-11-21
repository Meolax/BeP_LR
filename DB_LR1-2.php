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
            $wayForTable = 'Tables_in_'.$dbName;
            $conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);
            mysqli_query($conn, "SET NAMES utf8;");

            $sql = "SHOW TABLES";
            $tablesName = mysqli_query($conn, $sql);

            while ($tableName = mysqli_fetch_assoc($tablesName)){
                echo "<table>";
                $columsName = GetColumsNameFromTable ($tableName[$wayForTable], $wayForTable);
                echo "<tr><th colspan='".(mysqli_field_count($conn)+1).
                "'>".$tableName[$wayForTable]."</th></tr>";
                    
                fillColumsHeader ($columsName);

                $sql = "Select * From ".$tableName[$wayForTable];
                $rowsOfTable = mysqli_query($conn, $sql);
                fillRows ($rowsOfTable, $tableName[$wayForTable]);

                echo "</stable>";
            }
            
        function fillColumsHeader ($columsName)
        {
            echo "<tr>";
            while ($columName = mysqli_fetch_assoc($columsName)){                  
                echo "<th>".$columName['Field']."</th>";                   
            }
            echo "</tr>";
        }

        function fillRows ($rowsOfTable, $table)
        {
            while ($row = mysqli_fetch_assoc($rowsOfTable)){
                echo "<tr>";
                $i = 0;
                foreach($row as $inneritem){
                    $fk = getRefIfThisIsFK($table,array_keys($row)[$i]);
                    if(!is_null($fk)){
                        echo "<td>".GetValueOfFK($fk,(int)$inneritem,array_keys($row)[$i])."</td>";
                    }
                    else{
                        echo "<td>".$inneritem."</td>";
                    }
                    $i++;
                }
                echo "</tr>";
            } 
        }

        function GetColumsNameFromTable ($tableName, $wayForTable)
        {
            $sql = "DESCRIBE ".$tableName;
            return mysqli_query($GLOBALS['conn'], $sql);
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