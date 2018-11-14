<html>
	<head>
		<meta charset="UTF-8">
		<title>Calc</title>
	</head>
	<body>
		<?php
			if($_POST['submit'])
			{
				echo mb_strpos($_POST['num1'], ',');
				echo mb_strpos($_POST['num2'], ',');    
				if (valid ($_POST['num1']) && valid($_POST['num2'])){
					$num1 = (double)$_POST['num1'];
					$num2 = (double)$_POST['num2'];
					$oper = $_POST['operation'];
					$result = "$num1 $oper $num2 = ";
				
					if ($oper=='+')
						$result .= $num1+$num2;
					else if($oper=='*')
						$result .= $num1*$num2;
					else if ($oper=='-')
						$result .= $num1 - $num2;
					else if ($oper=="/")
					{
						if($num2==0)
							$result = "You can't devide by 0";
						else $result .= $num1/$num2;
					}
				} else {
					$result = "ArgumentError";
				}
									
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
		<form action="" method="post">			
			<input type="text" name="num1" pattern="^[0-9]+([\.][0-9]+)?$" required>
			<select name="operation" required>
				<option value="+">+</option>
				<option value="-">-</option>
				<option value="*">*</option>
				<option value="/">/</option>
			</select>
			<input type="text" name="num2" pattern="^[0-9]+([\.][0-9]+)?$" required>
			<input type="submit" name="submit" value="DO IT!">
		</form>
		<?php
			if($result)
				echo "$result";
		?>
		
	</body>
</html>