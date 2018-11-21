html>
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
            $conn = mysqli_connect( $dbServerName, $dbUserName, $dbPassword, $dbName);
            mysqli_query($conn, "SET NAMES utf8;");

            $sql = "SHOW TABLES";
            $tablesName = mysqli_query($conn, $sql);

            while ($tableName = mysqli_fetch_assoc($tablesName)){
                
                if (findRowsInTableWithWord ($tableName[$wayForTable], $wayForTable, $word) -> num_rows > 0) {
                    echo "<table>";

                    $columsName = GetColumsNameFromTable ($tableName[$wayForTable], $wayForTable);
                    echo "<tr><th colspan='".(mysqli_field_count($conn)+1)."'>".$tableName[$wayForTable]."</th></tr>";
                    
                    fillColumsHeader ($columsName);
                
                    $rowsOfTable = findRowsInTableWithWord ($tableName[$wayForTable], $wayForTable, $word);
                    fillRows ($rowsOfTable);
                    
                    echo "</stable>";
                }                
            }         
         }
        
        function fillColumsHeader ($columsName)
        {
            echo "<tr>";
            while ($columName = mysqli_fetch_assoc($columsName)){                  
                echo "<th>".$columName['Field']."</th>";                   
            }
            echo "</tr>";
        }
        
        function fillRows ($rowsOfTable)
        {
            while ($row2 = mysqli_fetch_assoc($rowsOfTable)){
                echo "<tr>";
                foreach($row2 as $inneritem)
                {
                    echo "<td>".$inneritem."</td>";
                }
                echo "</tr>";
            } 
        }

        function GetColumsNameFromTable ($tableName, $wayForTable)
        {
            $sql = "DESCRIBE ".$tableName;
            return mysqli_query($GLOBALS['conn'], $sql);
        }

        function findRowsInTableWithWord ( $tableName, $wayForTable, $str)
        {
            $query = "Select * from ".$tableName." where concat ( ";
            
            $columsName = GetColumsNameFromTable ( $tableName, $wayForTable);
            while ($columName = mysqli_fetch_assoc($columsName)){                  
                $query .= $tableName.".".$columName['Field'].", \" \",";                   
            }
            $query = substr($query, 0, -1);
            $query .= ") like \"%".$str."%\";";
            return mysqli_query($GLOBALS['conn'], $query);
        }
        ?>
    </body>
</html> 