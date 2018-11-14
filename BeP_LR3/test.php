<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JS test</title>
</head>
<?php 

?>

<body>
    <h1 align="center">Test JS</h1>
    <form action="test.php" method="POST">
        <div>
            <p>1. Что выведет этот код?</p>
            function User() { }<br>
            User.prototype = { admin: false };<br>
            let user = new User();<br>
            alert(user.admin);<br><br>
            <label><input type="radio" name="q1" value="a" required oninvalid="this.setCustomValidity('Введите ответ на первый вопрос')" oninput="setCustomValidity('')" >false</label><br>
            <label><input type="radio" name="q1" value="b">undefined</label><br>
            <label><input type="radio" name="q1" value="c">true</label>
        </div>
        <div>
            <p>2. Что выведет этот код?</p>
            let obj = {"0": 1, 0: 2};<br>
            alert( obj["0"] + obj[0] );<br><br>
            <label><input type="radio" name="q2" value="a" required oninvalid="this.setCustomValidity('Введите ответ на второй вопрос')" oninput="setCustomValidity('')" >2</label><br>
            <label><input type="radio" name="q2" value="b">3</label><br>
            <label><input type="radio" name="q2" value="c">4</label><br>
            <label><input type="radio" name="q2" value="c">12</label><br>
            <label><input type="radio" name="q2" value="c">В коде ошибка.</label>
        </div>
        <div>
            <p>3. Верно ли сравнение: "ёжик" > "яблоко"?</p>
            <select name="q3" required oninvalid="this.setCustomValidity('Введите ответ на третий вопрос')" oninput="setCustomValidity('')">
                <optgroup label="Выберите правильный ответ" </optgroup> <option value="a">Да.
                    <option value="b">Нет.
                    <option value="c">Зависит от локальных настроек браузера.
            </select>
        </div>
        <div>
            <p>4. Выберите правильные варианты объявления массива, то есть такие, в результате которых мы получаем
                массив из двух чисел 1 и 2.</p>
            <label><input type="checkbox" name="q4[1]" value="a">new Array.prototype.constructor(1, 2)</label><br>
            <label><input type="checkbox" name="q4[2]" value="b">new Array(1, 2)</label><br>
            <label><input type="checkbox" name="q4[3]" value="c">Array(1, 2)</label><br>
            <label><input type="checkbox" name="q4[4]" value="d">[1, 2]</label><br>
            <label><input type="checkbox" name="q4[5]" value="e">1..2</label><br>
            <label><input type="checkbox" name="q4[6]" value="f">Все варианты правильные.</label>
        </div>
        <div>
            <p>5. Чему равен typeof null в режиме use strict?</p>
            <input type="text" name="q5" required oninvalid="this.setCustomValidity('Введите ответ на пятый вопрос')" oninput="setCustomValidity('')">
        </div>
        <div>
            <p>6. Сколько параметров можно передать функции?</p>
            <label><input type="radio" name="q6" value="a" required>Одну</label><br>
            <label><input type="radio" name="q6" value="b">Две</label><br>
            <label><input type="radio" name="q6" value="c">Сколько угодно</label><br>
            <label><input type="radio" name="q6" value="d">Ноль</label><br>
        </div>
        <div>
            <p>7. Какое будет выведено значение?</p>
            <p><i>
                    let x = 5;<br>
                    alert( x++ );<br><br>
                    <select name="q7" required oninvalid="this.setCustomValidity('Введите ответ на седьмой вопрос')" oninput="setCustomValidity('')">
                        <optgroup label="Выберите правильный ответ" </optgroup> <option value="a">0
                            <option value="b">5
                            <option value="c">6
                            <option value="d">Другое
                    </select>
        </div>
        <div>
            <p>8. Что выведет alert?</p>
            alert(str); // ?<br>
            var str = "Hello";<br><br>
            <label><input type="radio" name="q8" value="a" required>Hello</label><br>
            <label><input type="radio" name="q8" value="b">undefined</label><br>
            <label><input type="radio" name="q8" value="c">Будет ошибка.</label><br>
        </div><br>
        <p>9. Что выведет этот код?</p>
        function User() { }<br>
        User.prototype = { admin: false };<br>
        let user = new User();<br>
        User.prototype = { admin: true };<br>
        alert(user.admin);<br><br>
        <input type="text" maxlenght="50" name="q9" required oninvalid="this.setCustomValidity('Введите ответ на девятый вопрос')" oninput="setCustomValidity('')">
        <div>
            <p>10. Какие варианты правильно объявляют функцию f, возвращающую сумму двух аргументов ?</p>
            <div class=checkbox-group required>
            <label><input type="checkbox" name="q10[1]" value="a" >let f = function(a,b) { return a+b }</label><br>
            <label><input type="checkbox" name="q10[2]" value="b">let f = new Function("a,b", "return a+b")ы</label><br>
            <label><input type="checkbox" name="q10[3]" value="c">let f = new Function("a", "b", "return a+b")</label><br>
            <label><input type="checkbox" name="q10[4]" value="c">let f = (a, b) => a + b</label><br>
            <label><input type="checkbox" name="q10[5]" value="d">let f = (a, b) => { a + b }</label><br>
            <label><input type="checkbox" name="q10[6]" value="e">Никакие.</label><br>
            </div>

            
            
        </div>
        <p align="center"><button type="submit" name="submit" value="submit">Результат</button></p>
    </form>
</body>
<?php
    function checkMultiQuestion ($question, $numQuestion)
	{
		$result=true;
		for ($i = 1; $i<=4; $i++)
		{
			if (!isset($_POST[$question][$i]))
			{
				$result = false;
			}
		}
		for ($i = 5; $i<=6; $i++) 
		{
			if (isset($_POST[$question][$i]))
			{
				$result = false;
			}
		}
		if ($result)
		{
			trueQuestion($numQuestion);
		} else {
			falseQuestion($numQuestion);
		}
	}

    function checkForNull ($question, $numQuestion) {
        if ($_POST[$question] == null)
        {
            echo sprintf("<script> alert(Выберите вариант ответа в вопросе $numQuestion) </script>");
        }
    }
	function checkDefaultQuestion ($question, $answer, $numQuestion)
	{
		if ($_POST[$question] == $answer)
		{
			trueQuestion($numQuestion);
		} else {
			falseQuestion($numQuestion);
		}
	}
	function trueQuestion ($numQuestion) {
		global $prav, $countPr;
		$prav .= "$numQuestion; ";
		$countPr++;
	}
	function falseQuestion ($numQuestion) {
		global $neprav, $countNepr;
		$neprav .= "$numQuestion; ";
		$countNepr++;
	}
	if($_POST['submit']){
        $prav = "";
	 $neprav = "";
	 $countPr = 0;
	 $countNepr = 0;
    checkDefaultQuestion("q1", "a", 1);
    checkForNull ("q1", 1);
	checkDefaultQuestion("q2", "c", 2);
	checkDefaultQuestion("q3", "a", 3);
	checkDefaultQuestion("q5", "object", 5);
	checkDefaultQuestion("q6", "c", 6);
	checkDefaultQuestion("q7", "b", 7);
	checkDefaultQuestion("q8", "b", 8);
	checkDefaultQuestion("q9", "false", 9);
	checkMultiQuestion("q4",4 );
	checkMultiQuestion("q10",10);
	
	
	
	echo "<p align=center>Результаты Вашего теста:</p>";
	echo "<p style=color: green>Верных ответов: $countPr</p>";
	echo "<p style=color: red>Неверных ответов: $countNepr</p>";
	echo "<p>Ваша оценка: $countPr</p>";
	echo "<p style=color: blue>Оценка: $countPr</p>";
	echo "<p>Вопросы с неверными ответами: $neprav</p>";
	echo "<p>Вопросы с верными ответами: $prav</p>";
    }
	 
?>
</html>