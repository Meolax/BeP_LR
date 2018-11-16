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
        <form method = "Post">
            <input name="Word" type="text" style = "margin: 10px">
            <input type = "submit" value="send"><br>
        </form><br> <br>
        <?php
         if (isset($_REQUEST['Word']))
         {
            $word = $_REQUEST['Word'];
            $dbServerName="localhost";
            $dbUserName="root";
            $dbPassword="data#base56";
            $dbName="medcart";
            $wayForTable = 'Tables_in_'.$dbName;
            $conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);
            mysqli_query($conn, "SET NAMES utf8;");

            $sql = "SHOW TABLES";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)){
                
                if (findStringInTable ($row[$wayForTable], $wayForTable, $word) -> num_rows > 0) {
                    echo "<table>";
                    $columsName = GetColumsNameFromTable ($row[$wayForTable], $wayForTable);
                    echo "<tr><th colspan='".(mysqli_field_count($conn)+1)."'>".$row[$wayForTable]."</th></tr>";
                    echo "<tr>";
                    while ($row2 = mysqli_fetch_assoc($columsName)){                  
                        echo "<th>".$row2['Field']."</th>";                   
                    }
                    echo "</tr>";

                
                    $rowOfTable = findStringInTable ($row[$wayForTable], $wayForTable, $word);

                    while ($row2 = mysqli_fetch_assoc($rowOfTable)){
                        echo "<tr>";
                        $i =0;
                        foreach($row2 as $inneritem)
                        {
                            echo "<td>".$inneritem."</td>";
                            $i++;
                        }
                        echo "</tr>";
                    } 
                    echo "</stable>";
                }                
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
                $sql = "Select * From ".$table." Where ".$column."=$id limit 1";
                $result = mysqli_query($GLOBALS['conn'], $sql);
                $row = mysqli_fetch_row($result);
                return  $row[1];
            }

            function findStringInTable ( $tableName, $wayForTable, $str)
            {
                $query = "Select * from ".$tableName." where concat ( ";
                
                $columsName = GetColumsNameFromTable ( $tableName, $wayForTable);
                while ($columName = mysqli_fetch_assoc($columsName)){                  
                   $query .= $columName['Field'].", \" \",";                   
                }
                $query = substr($query, 0, -1);
                $query .= ") like \"%".$str."%\";";
                return mysqli_query($GLOBALS['conn'], $query);
            }
        ?>
    </body>
</html> 