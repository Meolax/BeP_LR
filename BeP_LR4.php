<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>BeP_LR4</title>
</head>
<?php
    if (isset($_REQUEST['NumOfElement']))
    {
        if (valid($_REQUEST['NumOfElement'])){
            echo "<form>";
            for ($i=0; $i<$_REQUEST['NumOfElement']; $i++)
            {
                echo "<input name=\"values[]\" required/>";
            }
            echo "<input type = \"submit\" value=\"Отправить массив\" pattern=\"^[0-9]+([\.][0-9]+)?$\">";
            echo "</form><br><br><br>";
        }
    }

    if (isset($_REQUEST['values'])) {
        $sum = 0;
        $isProgressive = true;
        $countNegative = 0;
        $arr = $_REQUEST['values'];
        $i=0;
        for ($i; $i < count($arr)-1; $i++)
        {
            if ($arr[$i] > $arr[$i+1] && $isProgressive)
            {
                $isProgressive = false;
            } 
        }
        if ($isProgressive)
        {
            echo "Progressive ";
        } else {
            echo "not progressive";
        }
        

        foreach ($arr as $value)
        {   
            if ($value < 0) 
            {
                $countNegative += 1;
                $sum += $value; 
            }
        }
        $argNegative = 1; 
        if ($countNegative != 0) {
            $argNegative = $sum / $countNegative;
        }
        
        echo "<br>Arg negative: $argNegative";        
    }
    
    function valid ($x)
			{
                if (!is_numeric($x) )
					return false;
				if (mb_substr($x,strlen($x)-1,1)=='0'  && (integer)mb_strpos($x, '.') != 0 )
				{
					return false;
				}               
				if( (mb_substr($x,0,1)=='0' && strlen($x)!==1 && mb_substr($x,1,1)!=='.') ||
				((double)$x == 0 && strlen($x)!==1))
                    return false;
            	if(mb_substr($x,strlen($x)-1)=='.')
					return false;
				return true;
			}
?>

    <body>
        <form>
            <input name="NumOfElement" type="text" pattern="^[0-9]+([\.][0-9]+)?$"><br>
            <input type = "submit" value="send"><br>
        </form>
        <br>
    </body>
</html>